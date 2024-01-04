<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
        $loggedInUserId = auth()->user()->id;

        //logic buat nyari semua user yang blm difollow oleh logged in user
        $followingIds = auth()->user()->following()->pluck('profile_id');

        $userList = User::whereNotIn('id', $followingIds)->where('id', '!=', $loggedInUserId)->get();

        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('explore', compact('userList', 'posts'));
    }

    public function follow($profileId){
        $user = auth()->user();
        $following = User::find($profileId);

        $user->following()->attach($following);

        return redirect()->back();
    }

    public function unfollow($profileId){
        $user = auth()->user();
        $following = User::find($profileId);

        $user->following()->detach($following);

        return redirect()->back();
    }
}
