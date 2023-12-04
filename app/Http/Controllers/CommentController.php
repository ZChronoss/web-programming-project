<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment($postId){
        $post = Post::find($postId);

        $comment = request()->validate([
            'comment' => 'required'
        ]);

        $user_id = auth()->user()->id;
        // dd($comment['comment']);

        $post->comments()->create([
            'post_id' => $postId,
            'comment' => $comment['comment'],
            "user_id" => $user_id,
        ]);

        // $post->comments()->create($comment);

        return redirect('/explore');
    }
}
