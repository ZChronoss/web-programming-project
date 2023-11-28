<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createComment(Request $request, $postId){

        $post = Post::find($postId);

        $comment = $request->validate([
            'comment' => 'required'
        ]);

        $post->comments()->create($comment);

        return redirect('/explore');
    }

}
