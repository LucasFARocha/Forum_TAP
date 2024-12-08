<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;


class TopicController extends Controller
{
    //
    // public function index(){
    //     $topics  = Topic::all();
    //     return $topics;
    // }

    public function listAllTopics(){
        $topics = Topic::all();
        $categories = Category::all();
        
        return view('index', ['topics' => $topics, 'categories' => $categories]);
    }

    public function listTopicByID($topic_id){
        $topic = Topic::where('id', $topic_id)->first();
        $tags = $topic->tags;
        $category = Category::where('id', $topic->category_id)->first();
        $user = User::where('id', $topic->post->user_id)->first();
        $users = User::all();

        $comments = $topic->comments;

        return view('topic.listTopicByID', [
            'topic' => $topic, 
            'tags' => $tags,
            'category' => $category,
            'user' => $user,
            'users' => $users,
            'comments' => $comments
        ]);
    }

    public function createTopic(Request $request){
        if($request->method() === 'GET'){
            $categories = Category::all();
            $tags = Tag::all();

            return view('topic.createTopic', ['categories' => $categories, 'tags' => $tags]);
        }
        else
        {
            $imagePath = '';
            
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
                'category' => 'required',
                'tags' => 'required|array'
            ]);

            if($request->image != null)
            {
                $request->validate(['image' => 'image|mimes:jpeg,jpg,png,gif|max:2048']);

                $imagePath = $request->file('image')->store('images', 'public');
            }

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category
            ]);

            $topic->tags()->sync($request->tags);
            
            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $imagePath
            ]);


            // $post = new Post([
            //     'image' => $request->image
            // ]);

            // $topic->post()->save($post);

            return redirect()->route('routeHome');
        }
    }

    public function editTopic(Request $request, $id)
    {
        $topic = Topic::where('id', $id)->first();
        $categories = Category::all();
        $tags = Tag::all();

        if($request->method() === 'GET')
        {
            return view('topic.editTopic', [
                'topic' => $topic,
                'categories' => $categories, 
                'tags' => $tags
            ]);
        }
        else
        {
            if($request->title != '')
            {
                $request->validate(['title' => 'string|max:50']);
                $topic->title = $request->title;
            }
            if($request->description != '')
            {
                $request->validate(['description' => 'string|max:255']);
                $topic->description = $request->description;
            }

            // Não há validação para categoria ao editar
            $topic->category_id = $request->category;

            if($request->tags != '')
            {
                $request->validate(['tags' => 'array']);
                $topic->tags()->sync($request->tags);
            }
            if($request->image != null)
            {
                $request->validate(['image' => 'image|mimes:jpeg,jpg,png,gif|max:2048']);

                $imagePath = $request->file('image')->store('images', 'public');
                $topic->post()->update([
                    'image' => $imagePath
                ]);
            }

            $topic->save();

            return redirect()
                ->route('routeListTopicByID', [$topic->id])
                ->with('message', 'Atualizado com sucesso!');

        }
    }

    public function deleteTopic(Request $request, $id)
    {
        // Topic::where('id', $id)->delete();
        $topic = Topic::where('id', $id)->first();
        $topic->tags()->detach();
        $topic->post()->delete();

        foreach ($topic->comments as $comment) 
        {
            $comment->post()->delete();
            $comment->delete();
        }

        $topic->delete();

        return redirect()
            ->route('routeHome')
            ->with('message', 'Excluído com sucesso!');
    }
}
