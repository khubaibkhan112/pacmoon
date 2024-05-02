<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;
    public function questLikes(){
        return $this->hasMany(UserPoint::class,'quest_id','tweet_id')->where('point_id',1);
    }
    public function questRetweets(){
        return $this->hasMany(UserPoint::class,'quest_id','tweet_id')->where('point_id',7);
    }
    public function accountFollows(){
        return $this->hasMany(UserPoint::class,'quest_id','id')->where('point_id',6);
    }
}
