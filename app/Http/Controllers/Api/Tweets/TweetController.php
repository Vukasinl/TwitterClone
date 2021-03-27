<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Models\Tweet;
use App\Tweets\TweetType;
use App\Models\TweetMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Tweets\TweetWasCreated;
use App\Http\Resources\TweetCollection;
use App\Notifications\Tweets\TweetMentionedIn;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Http\Resources\TweetResource;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['store']);
    }

    public function index(Request $request)
    {
        $tweets = Tweet::query()
            ->with([
                'user',
                'likes',
                'retweets',
                'replies',
                'media.baseMedia',
                'originalTweet.user',
                'originalTweet.likes',
                'originalTweet.retweets',
                'originalTweet.media.baseMedia'
            ])
            ->find(explode(',', $request->ids));

        return new TweetCollection($tweets);
    }

    public function show(Tweet $tweet)
    {

        return new TweetCollection(collect([$tweet])->merge($tweet->parents()));
    }

    public function store(TweetStoreRequest $request)
    {
        $tweet = $request->user()->tweets()->create(array_merge($request->only('body'), [
            'type' => TweetType::TWEET
        ]));

        foreach ($request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        }

        $tweet->mentions->users()->each(function ($user) use($request, $tweet) {
            if ($request->user()->id !== $user->id) {
                $user->notify(new TweetMentionedIn($request->user(), $tweet));
            }
        });

        broadcast(new TweetWasCreated($tweet));
    }
}
