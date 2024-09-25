<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    //
    public function listAllTopics(){
        $topics = Topic::all();
        
        return view('index', ['topics' => $topics]);
    }

    public function listTopicByID($topic_id){
        $topic = Topic::where('id', $topic_id)->first();

        return view('topic.listTopicByID', ['topic' => $topic]);
    }

    // public function createTopic(Request $request){
    //     if($request->method() === 'GET'){
    //         return view('topic.createTopic');
    //     }
    //     else
    //     {
            
    //     }
    // }
}
