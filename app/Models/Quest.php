<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;
    public function questLikes(){
        return $this->hasMany(UserPoint::class,'quest_id','tweet_id');
    }
}
