<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::group(['prefix' => 'post'], function() {
    Route::get('create', [PostsController::class, 'create'])->name('post.create');
    Route::post('/', [PostsController::class, 'store'])->name('post.store');
    Route::get('{post_id}', [PostsController::class, 'show'])->name("post.show");
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('{user_id}', [ProfileController::class, 'index'])->name('profile.show');
    Route::get('{user_id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});
