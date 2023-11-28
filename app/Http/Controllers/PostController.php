<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function explore(){
        $FakeNum = [1,2,3,4,5];
        $posts = Post::all();

        dump($posts);

        return view('explore', compact('posts', 'FakeNum'));
    }

}
