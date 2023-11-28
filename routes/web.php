<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Auth::routes();

Route::get('/explore', function () {

        $FakeNum = [1,2,3,4,5];
        $posts = Post::all();


        return view('explore', compact('posts', 'FakeNum'));

});
Route::get('/explore', [UserController::class, 'explore']);

Route::prefix('post')->group(function(){
    Route::post('/{postId}/comment', [PostController::class, 'createComment']);
});

route::get('/profile', function(){

    $FakeNum = [1,2,3,4,5,6];

    return view('profile', compact('FakeNum'));
});

route::get('/profile', function(){

    $FakeNum = [1,2,3,4,5,6];

    return view('profile', compact('FakeNum'));
});

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/store', [PostController::class, 'store']);
