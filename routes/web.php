<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

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

Route::middleware(['auth'])->group(function () {

    Route::post('/', [PostController::class, 'store']);
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
    Route::delete('/{post}/likes', [PostLikeController::class, 'destroy']);
});
