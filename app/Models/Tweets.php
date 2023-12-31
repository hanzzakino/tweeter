<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'creator_name',
        'creator_id'
    ];
}
