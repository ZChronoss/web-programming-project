<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view('user.index');
    }

    public function explore(){
        //$userList = User::where('id', '!=', auth()->user()->id)->get();


        //logic buat nyari semua user yang blm difollow oleh logged in user
        $loggedInUserId = auth()->user()->id;
        $followerIds = auth()->user()->profile->followers->pluck('profile_id');

        $userList = User::whereNotIn('id', $followerIds)->where('id', '!=', $loggedInUserId)->get();

        $posts = Post::all();
        $FakeNum = [1,2,3,4,5];

        return view('explore', compact('userList', 'posts', 'FakeNum'));
    }
}
