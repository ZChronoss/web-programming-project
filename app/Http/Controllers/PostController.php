<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
