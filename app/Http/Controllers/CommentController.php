<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showMobileCommentPage(Post $post) {
        return view('comments-mobile', ['post' => $post]);
    }

    public function createNewComment(Post $post, Request $request) {
        $request->validate([
            'content' => 'required'
        ]);

        $newComment = new Comment();

        $newComment->user_id = auth()->user()->id;
        $newComment->post_id = $post->id;
        $newComment->content = $request->content;

        $newComment->save();

        return redirect()->back();
    }
}
