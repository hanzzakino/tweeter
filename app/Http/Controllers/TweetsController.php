<?php

namespace App\Http\Controllers;

use App\Models\TweetLikes;
use App\Models\Tweets;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        return view('feed.index', [
            'tweets' => Tweets::get(),
            'tweet_likes' => TweetLikes::get(),
        ]);
    }

    public function store(Request $request)
    {

        $formData = $request->validate([
            'content' => 'required',
        ]);

        $formData['creator_name'] = auth()->user()->name;
        $formData['creator_id'] = auth()->user()->id;

        Tweets::create($formData);



        return redirect('/feed');
    }

    public function destroy(Tweets $tweet)
    {
        $tweet->delete();
        return back()->with('success', 'Tweet Deleted');
    }

    public function like(Tweets $tweet)
    {
        $formData = [
            'tweet_id' => $tweet->id,
            'liker_id' => auth()->user()->id
        ];
        TweetLikes::create($formData);
        return redirect('/feed');
    }
}
