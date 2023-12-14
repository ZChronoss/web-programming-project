<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($userId) {
        $user = User::findOrFail($userId);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        $posts = $user->posts;

        return view('profile.profile', compact('user', 'postCount', 'followersCount', 'followingCount', 'posts', 'follows'));
    }

    public function edit(){
        return view('profile.edit');
    }

    public function update(){
        $user = auth()->user();
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'description' => '',
            'image' => 'image'
        ]);

        if(request('image') != null){
            $imagePath = request('image')->store('post', 'public');
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['image' => $imagePath ];
        }

        $user->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("{$user->id}/profile");
    }
}
