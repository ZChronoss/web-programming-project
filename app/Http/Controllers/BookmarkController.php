<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BookmarkController extends Controller
{
    public function bookmark($post){
        $user = auth()->user();
        $targetPost = Post::findOrFail($post);

        if ($user->bookmarkedPosts()->where('post_id', $targetPost->id)->exists()) {
            // If the user already bookmarked the post, remove the bookmark
            $user->bookmarkedPosts()->detach($targetPost->id);
        } else {
            // If the user hasn't bookmarked the post, add the bookmark
            $user->bookmarkedPosts()->attach($targetPost->id);
        }

        return redirect('/explore');
    }
}
