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
    return redirect()->route('posts.index');
});
Route::resource('posts',PostController::class);
Route::get('post/restore/{id}',[PostController::class,'restore'])->name('post.restore');
Route::delete('post/delete/{id}',[PostController::class,'delete'])->name('post.delete');

