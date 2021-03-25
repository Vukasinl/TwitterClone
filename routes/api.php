<?php


// Route::get('/timeline', [App\Http\Controllers\Api\Timeline\TimelineController::class, 'index'])->name('timeline.index');

Route::get('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'index'])->name('tweets.index');
Route::post('/tweets', [App\Http\Controllers\Api\Tweets\TweetController::class, 'store'])->name('tweets.store');

Route::post('/tweets/{tweet}/replies', [App\Http\Controllers\Api\Tweets\TweetReplyController::class, 'store'])->name('replies.store');

Route::post('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'store'])->name('likes.store');
Route::delete('/tweets/{tweet}/likes', [App\Http\Controllers\Api\Tweets\TweetLikeController::class, 'destroy'])->name('likes.destroy');

Route::post('/tweets/{tweet}/retweets', [App\Http\Controllers\Api\Tweets\TweetRetweetController::class, 'store'])->name('retweets.store');
Route::delete('/tweets/{tweet}/retweets', [App\Http\Controllers\Api\Tweets\TweetRetweetController::class, 'destroy'])->name('retweets.destroy');

Route::post('/tweets/{tweet}/quotes', [App\Http\Controllers\Api\Tweets\TweetQuoteController::class, 'store'])->name('quotes.store');

Route::post('/media', [App\Http\Controllers\Api\Media\MediaController::class, 'store'])->name('media.store');
Route::get('/media/types', [App\Http\Controllers\Api\Media\MediaTypesController::class, 'index'])->name('media.types.index');

Route::get('/notifications', [App\Http\Controllers\Api\Notifications\NotificationController::class, 'index']);
