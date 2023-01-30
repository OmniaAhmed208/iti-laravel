<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

//  insert into user ['title','desc.....]
    protected $fillable = [
        'title', //column name
        'description',
        'user_id'
    ];

    // join to user table to get user name
    public function user(){
        // we say that post model(posts) belong to user calss
        return $this->belongsTo(User::class);
    }

    // if we used another name for function user()
    public function test(){
        return $this->belongsTo(User::class, foreignKey:'user_id');
    }

    public function comments(){
        // post may have many comments
        return $this->morphMany(Comment::class, 'commentable');
    }
}

