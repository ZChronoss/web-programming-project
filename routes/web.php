<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/explore', function () {

        $FakeNum = [1,2,3,4,5];
        $posts = Post::all();


        return view('explore', compact('posts', 'FakeNum'));

});

Route::get('/home', function () {
    return view('home');
});

route::get('/profile', function(){
    return view('profile');
});

