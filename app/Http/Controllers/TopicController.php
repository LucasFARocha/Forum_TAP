<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;

class TopicController extends Controller
{
    //
    // public function index(){
    //     $topics  = Topic::all();
    //     return $topics;
    // }

    public function listAllTopics(){
        $topics = Topic::all();
        
        return view('index', ['topics' => $topics]);
    }

    public function listTopicByID($topic_id){
        $topic = Topic::where('id', $topic_id)->first();

        return view('topic.listTopicByID', ['topic' => $topic]);
    }

    public function createTopic(Request $request){
        if($request->method() === 'GET'){
            $categories = Category::all();

            return view('topic.createTopic', ['categories' => $categories]);
        }
        else
        {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|255',
                'status' => 'required|int',
                'image' => 'required|string'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status
            ]);

            $post = new Post([
                'image' => $request->image
            ]);

            $topic->post()->save($post);
        }
    }
}
