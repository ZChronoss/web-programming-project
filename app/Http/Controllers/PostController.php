<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        $followerIds = auth()->user()->profile->followers()->pluck('profile_id');

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

        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $post['caption'],
            'image' => $imagePath,
        ]);

        return redirect('explore');
    }

    public function like($postId){
        $user = auth()->user();
        $post = Post::findOrFail($postId);

        if ($user->likes()->where('post_id', $post->id)->exists()) {
            // If the user already liked the post, remove the like
            $user->likes()->detach($post->id);
            $message = 'Post unliked.';
        } else {
            // If the user hasn't liked the post, add the like
            $user->likes()->attach($post->id);
            $message = 'Post liked.';
        }

        return redirect('explore#post-' . $post->id);
    }

    public function show(Post $post){
        return view('post.show', compact('post'));
    }

}
