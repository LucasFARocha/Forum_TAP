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
        else
        {
            $request->validate([
                'title' => 'required|string|max:100'
            ]);

            $tag = Tag::create([
                'title' => $request->title
            ]);

            return redirect()->route('routeListAllTags');
        }
    }

    public function editTag(Request $request, $id){
        $tag = Tag::where('id', $id)->first();

        if($request->method() === 'GET'){
            return view('tag.editTag', ['tag' => $tag]);
        }
        else
        {
            if($request->title != ''){
                $request->validate(['title' => 'string|max:100']);
                $tag->title = $request->title;
            }
            $tag->save();

            return redirect()
                ->route('routeListTagByID', [$tag->id])
                ->with('message', 'Atualizado com sucesso!');
        }
    }

    public function deleteTag(Request $request, $id){
        Tag::where('id', $id)->delete();

        return redirect()
            ->route('routeListAllTags')
            ->with('message', 'Excluído com sucesso!');
    }
}
