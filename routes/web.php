<?php
use App\Http\Middleware\TwoFactorAuthenticated;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Modules\Posts\Http\Controllers\CreatePostsController;
use App\Http\Controllers\FollowController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/posts', [CreatePostsController::class, 'index'])->name('posts');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified', TwoFactorAuthenticated::class])->name('home');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified', TwoFactorAuthenticated::class])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
     Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::post('/accept-follow/{notificationId}', [FollowController::class, 'acceptFollow'])->name('accept-follow');
    Route::post('/reject-follow/{notificationId}', [FollowController::class, 'rejectFollow'])->name('reject-follow');
    Route::post('/follow-back/{user}', [FollowController::class, 'followBack'])->name('follow-back');

});

require __DIR__.'/auth.php';
