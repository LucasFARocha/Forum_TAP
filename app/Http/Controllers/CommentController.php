<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function createComment(Request $request, $topic_id)
    {
        $imagePath = '';
        $request->validate(['content' => 'required|string|max:255']);

        $comment = Comment::create([
            'content' => $request->content,
            'topic_id' => $topic_id
        ]);

        if($request->image != null)
        {
            $request->validate(['image' => 'image|mimes:jpeg,jpg,png,gif|max:2048']);

            $imagePath = $request->file('image')->store('images', 'public');
        }

        $comment->post()->create([
            'user_id' => Auth::id(),
            'image' => $imagePath
        ]);

        return redirect()->route('routeListTopicByID', $topic_id);
    }
}
