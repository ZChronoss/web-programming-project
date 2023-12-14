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
        //$userList = User::where('id', '!=', auth()->user()->id)->get();

        $loggedInUserId = auth()->user()->id;
        // $followerIds = auth()->user()->profile->followers->pluck('profile_id');

        //logic buat nyari semua user yang blm difollow oleh logged in user
        $followingIds = auth()->user()->following()->pluck('profile_id');

        $userList = User::whereNotIn('id', $followingIds)->where('id', '!=', $loggedInUserId)->get();

        $posts = Post::all();

        return view('explore', compact('userList', 'posts'));
    }

    public function follow($profileId){
        $user = auth()->user();
        $following = User::find($profileId);

        $user->following()->attach($following);

        return Response::make('', 200)->header('Refresh', '0;url=' . url()->previous());
    }

    public function unfollow($profileId){
        $user = auth()->user();
        $following = User::find($profileId);

        $user->following()->detach($following);

        return Response::make('', 200)->header('Refresh', '0;url=' . url()->previous());
    }
}
