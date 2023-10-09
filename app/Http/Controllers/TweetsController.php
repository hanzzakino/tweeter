<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweets;
use App\Models\TweetLikes;
use App\Models\UserFollows;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        return view('feed.index', [
            'tweets' => Tweets::latest()->get(),
            'tweet_likes' => TweetLikes::get(),
            'user_follows' => UserFollows::get(),
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

        $duplidates = TweetLikes::where('tweet_id', $tweet->id)->where('liker_id', auth()->user()->id)->get();

        if ($duplidates->count() == 0) {
            TweetLikes::create($formData);
            return redirect('/feed');
        } else {
            foreach ($duplidates as $duplidate) {
                TweetLikes::where('id', '=', $duplidate->id)->delete();
            }
            return redirect('/feed');
        }
    }

    public function follow(Tweets $tweet)
    {
        $formData = [
            'user_id' => $tweet->creator_id,
            'follower_id' => auth()->user()->id
        ];

        $duplicates = UserFollows::where('user_id', $tweet->creator_id)->where('follower_id', auth()->user()->id)->get();
        // dd($tweet->creator_id);
        if ($duplicates->count() == 0) {
            UserFollows::create($formData);
            return redirect('/feed');
        } else {
            foreach ($duplicates as $duplidate) {
                UserFollows::where('id', '=', $duplidate->id)->delete();
            }
            return redirect('/feed');
        }
    }
}
