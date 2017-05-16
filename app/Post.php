<?php

namespace App;
use Carbon\Carbon;


class Post extends Model
{
    //

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user() // $post->user->name    or $comment->post->user
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {

        $this->comments()->create(compact('body'));
    }

    // Archives
    public function scopeFilter($query, $filter)
    {

        if($month =$filter['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filter['year']){
            $query->whereYear('created_at', $year);
        }

    }
}
