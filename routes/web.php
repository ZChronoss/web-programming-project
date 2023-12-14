<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ProfileController;
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
    return redirect('explore');
});

Auth::routes();

Route::get('/explore', [UserController::class, 'explore']);
Route::post('/comment/{post}', [CommentController::class, 'createComment']);

Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/{postId}/like', [PostController::class, 'like']);
Route::get('/post/{post}', [PostController::class, 'show']);

Route::get('/{profileId}/follow', [UserController::class, 'follow']);
Route::get('/{profileId}/unfollow', [UserController::class, 'unfollow']);

Route::get('/{post}/bookmark', [BookmarkController::class, 'bookmark']);

Route::get('/{postId}/like', [PostController::class, 'like']);

Route::get('/{userId}/profile', [ProfileController::class, 'profile']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);
Route::post('/profile/update', [ProfileController::class, 'update']);
