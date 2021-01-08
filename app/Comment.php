<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'is_active'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function comment_replies()
    {
        return $this->hasMany('App\CommentReplies');
    }
}
