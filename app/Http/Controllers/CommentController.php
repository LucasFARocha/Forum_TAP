<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    //

    public function listCommentByID(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();
        $user = User::where('id', $comment->post->user_id)->first();

        return view('comment.listCommentByID', ['comment' => $comment, 'user' => $user]);
    }

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

        // dd(Auth::id());
        $comment->post()->create([
            'user_id' => Auth::id(),
            'image' => $imagePath
        ]);

        // dd($comment->post);

        return redirect()->route('routeListTopicByID', $topic_id);
    }

    public function editComment(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();

        if($request->method() === 'GET')
        {
            return view('comment.editComment', ['comment' => $comment]);
        }
        else
        {
            if($request->content != '')
            {
                $request->validate(['content' => 'string|max:255']);
                $comment->content = $request->content;
            }
            if($request->image != null)
            {
                $request->validate(['image' => 'image|mimes:jpeg,jpg,png,gif|max:2048']);

                $imagePath = $request->file('image')->store('images', 'public');
                $comment->post()->update([
                    'image' => $imagePath
                ]);
            }

            $comment->save();

            return redirect()
                ->route('routeListCommentByID', $comment->id)
                ->with('message', 'Atualizado com sucesso!');
        }
    }

    public function deleteComment(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();
        $comment->post()->delete();
        $comment->delete();

        return redirect()->route('routeHome');
    }
}
