<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/subscription', function () {
    return view('subscription');
})->middleware(['auth', 'verified'])->name('subscription');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts',[PostController::class, 'getPosts'] )->name('posts');
    Route::delete('/posts/{id}',[PostController::class, 'deletePost'] )->name('post.delete');
    Route::post('/new-post/',[PostController::class, 'newPost'] )->name('post.new');
    Route::get('/posts/{slug}',[PostController::class, 'show'] )->name('post.show');
    Route::get('/posts/{slug}/edit',[PostController::class, 'editPost'] )->name('posts.edit');
    Route::put('/posts/{slug}/',[PostController::class, 'updatePost'] )->name('posts.update');
});


Route::get('/new-post', function () {
    return view('newPost');
})->middleware(['auth', 'verified'])->name('new-post');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
