<?php


Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline.index');
Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store'])->name('tweets.store');
