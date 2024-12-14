<?php

use Illuminate\Support\Facades\Route;
use Modules\Posts\Http\Controllers\PostsController;
use Modules\Posts\Http\Controllers\CreatePostsController;
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
Route::middleware(['auth'])->prefix('posts')->name('posts.')->group(function () {
    Route::resource('/', PostsController::class)->parameters(['' => 'post'])->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ]);
    Route::get('/create', [CreatePostsController::class, 'create'])->name('create');
    Route::post('/store', [CreatePostsController::class, 'store'])->name('store');
    Route::get('/{id}', [CreatePostsController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [CreatePostsController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CreatePostsController::class, 'update'])->name('update');
    Route::delete('/{id}', [CreatePostsController::class, 'destroy'])->name('destroy');
});
