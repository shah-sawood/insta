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

Route::group(['prefix' => 'posts'], function() {
    Route::get('', [PostsController::class, 'index'])->name('post.index');
    Route::get('create', [PostsController::class, 'create'])->name('post.create');
    Route::post('', [PostsController::class, 'store'])->name('post.store');
    Route::get('{post}', [PostsController::class, 'show'])->name("post.show");
    Route::get('{post}/edit', [PostsController::class, 'edit'])->name('post.edit');
    Route::patch('{post}', [PostsController::class, 'update'])->name('post.update');
    Route::delete('{post}', [PostsController::class, 'destroy'])->name('post.destroy');
});

Route::group(['prefix' => 'profile'], function() {
    Route::get('', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
