<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function comment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->user_id = $request->user()->id;
        $comment->movie_id = $id;
        $comment->content = $request->input('content');

        $comment->save();

        return redirect()->route('movies.index');
        
    }

        public function deleteComment($id, $id2)
    {
        $comment = Comment::findOrFail($id2);
        $comment->delete();

        return redirect()->route('movies.index');
    }
}
