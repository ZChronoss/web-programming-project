<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BookmarkController extends Controller
{
    public function bookmark($post){
        $user = auth()->user();
        $targetPost = Post::findOrFail($post);

        if ($user->bookmarks()->where('post_id', $targetPost->id)->exists()) {
            // If the user already bookmarked the post, remove the bookmark
            $user->bookmarks()->detach($targetPost->id);
        } else {
            // If the user hasn't bookmarked the post, add the bookmark
            $user->bookmarks()->attach($targetPost->id);
        }

        return redirect('/explore');
    }
}
