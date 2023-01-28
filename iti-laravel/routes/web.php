<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [PostController::class, 'test']);

Route::get('/posts', [PostController::class, 'index'])->name(name:'posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name(name:'posts.create');

Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show'])->name(name:'posts.show');

Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name(name:'posts.edit');

Route::put('/posts/update/{post}', [PostController::class, 'update'])->name(name:'posts.update');

