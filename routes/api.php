<?php


Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline.index');

Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store'])->name('tweets.store');

Route::post('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'store'])->name('likes.store');
Route::delete('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'destroy'])->name('likes.destroy');
