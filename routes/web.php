<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/explore', [UserController::class, 'explore']);

Route::prefix('post')->group(function(){
    Route::post('/{postId}/comment', [PostController::Class, 'createComment']);
});

Route::prefix('user')->group(function(){
    Route::match(['get', 'post'], 'follow/{profileId}', [UserController::class, 'follow']);
});


