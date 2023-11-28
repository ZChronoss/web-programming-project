<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function explore(){
        //$userList = User::where('id', '!=', auth()->user()->id)->get();


        //logic buat nyari semua user yang blm difollow oleh logged in user
        $loggedInUserId = auth()->user()->id;
        $followerIds = auth()->user()->profile->followers->pluck('profile_id');

        $userList = User::whereNotIn('id', $followerIds)->where('id', '!=', $loggedInUserId)->get();

        $posts = Post::all();

        return view('explore', compact('userList', 'posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $post = request()->validate([
            'caption' => '',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('post', 'public');

        auth()->user()->posts()->create([
            'caption' => $post['caption'],
            'image' => $imagePath,
        ]);

        return redirect('explore');
    }

    public function createComment(Request $request, $postId){

        $post = Post::find($postId);

        $comment = $request->validate([
            'comment' => 'required'
        ]);

        $post->comments()->create($comment);

        return redirect('/explore');
    }

}
