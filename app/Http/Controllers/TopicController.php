<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    //
    public function listAllTopics(Request $request){
        $topics = Topic::all();

        
        return view('index', ['topics' => $topics]);
    }
    // listTopicByID($topic_id){

    // }
}
