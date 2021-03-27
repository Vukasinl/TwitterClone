<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notifications', [App\Http\Controllers\Notifications\NotificationController::class, 'index'])->name('notifications.index');

Route::get('/tweets/{tweet}', [App\Http\Controllers\Tweets\TweetController::class, 'show'])->name('tweets.show');

// Route::get('/api/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline.index');

// Route::get('/api/notifications', [App\Http\Controllers\Api\Notifications\NotificationController::class, 'index']);
