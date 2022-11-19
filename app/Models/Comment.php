<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //reply or comment's user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //a root comment's replies
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id'); //for example - post has many comments (post_id is a parent_id column)
    }

    //a reply's root comment
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }


    public function commentable()
    {
        return $this->morphTo();
    }
}
