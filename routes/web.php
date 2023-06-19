<?php

use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::middleware(['auth'])->group(function () {

    Route::post('/', [PostController::class, 'store']);
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
    Route::delete('/{post}/likes', [PostLikeController::class, 'destroy']);
    
    Route::post('/{post}/comments',[PostCommentController::class, 'store'])->name('posts.comments');
    Route::delete('/post/{comment}', [PostCommentController::class, 'destroy'])->name('posts.comments.destroy');
});
