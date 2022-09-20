<?php

use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\PostVoteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/r/{community}', [FrontendCommunityController::class, 'show'])->name('frontend.communities.show');

Route::get('/r/{community}/posts/{post}', [PostController::class, 'show'])->name('frontend.communities.posts.show');

Route::post('/r/{community}/posts/{post}/comments', [PostCommentController::class, 'store'])->name('frontend.posts.comments');


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::resource('communities', CommunityController::class);
    Route::resource('communities.posts', CommunityPostController::class);

    Route::post('/posts/{post}/upvote', [PostVoteController::class, 'upvote'])->name('post.upvote');
    Route::post('/posts/{post}/downvote', [PostVoteController::class, 'downvote'])->name('post.downvote');
});

require __DIR__ . '/auth.php';
