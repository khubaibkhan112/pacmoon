<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'point_id',
        'user_id',
        'quest_id',
        'tweet_id',
    ];
    public function addPoints($user_id,$points_slug,$quest_id=Null,$tweet_id=Null){    
        $point=Point::select('id')->where('slug',$points_slug)->first();
        $user_points=self::where('user_id',$user_id)->where('point_id',$point->id)->where(function($q) use ($quest_id,$tweet_id) {
           $q->where('tweet_id',$tweet_id)->orWhere('quest_id',$quest_id); 
        })->delete();
        $user_points_row=self::create([
            'user_id'=>$user_id,
            'point_id'=>$point->id,
            'tweet_id'=>$tweet_id,
            'quest_id'=>$quest_id,
        ]);
    }

}
