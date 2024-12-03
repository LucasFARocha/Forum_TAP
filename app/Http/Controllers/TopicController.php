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
        $user = User::where('id', $topic->post->user_id)->first();
        $category = Category::where('id', $topic->category_id)->first();

        return view('topic.listTopicByID', [
            'topic' => $topic, 
            'user' => $user, 
            'category' => $category
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
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
                'status' => 'required|int',
                'image' => 'required|string',
                'category' => 'required'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image
            ]);

            // $post = new Post([
            //     'image' => $request->image
            // ]);

            // $topic->post()->save($post);

            return redirect()->route('routeHome');
        }
    }

    public function deleteTopic(Request $request, $id)
    {
        Topic::where('id', $id)->delete();

        return redirect()
            ->route('routeHome')
            ->with('message', 'Excluído com sucesso!');
    }
}
