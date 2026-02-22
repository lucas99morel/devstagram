<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user-id',
        'post_id'
    ];
}
