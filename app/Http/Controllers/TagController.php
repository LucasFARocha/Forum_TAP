<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function listAllTags(){
        $tags = Tag::all();
        
        return view('tag.listAllTags', ['tags' => $tags]);
    }

    public function listTagByID($id){
        $tag = Tag::where('id', $id)->first();

        return view('tag.listTagByID', ['tag' => $tag]);
    }

    public function createTag(Request $request){
        if($request->method() === 'GET'){
            return view('tag.createTag');
        }
    }
}
