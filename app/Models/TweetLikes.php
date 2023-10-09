<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetLikes extends Model
{
    use HasFactory;
    protected $fillable = [
        'tweet_id',
        'liker_id',
    ];
}
