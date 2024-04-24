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
    public function addPoints($user_id,$points_slug,$quest_id=Null,$is_quest=true){
        $point=Point::select('id')->where('slug',$points_slug)->first();

        $quest_or_tweet=$quest_id;

        $where=$is_quest ?  'quest_id' : 'tweet_id';

        $user_points=self::where('user_id',$user_id)->where('point_id',$point->id);
        $user_points->whereIn($where,$quest_or_tweet);
        $user_points->delete();
        $data=[];
        foreach($quest_or_tweet as  $tweet){
               array_push($data,
                [
                    'user_id'=>$user_id,
                    'point_id'=>$point->id,
                     $where=>$tweet,
                ]
               );
        }
        // dd($data);
        if(count($data)) $user_points_row=self::insert($data);
        // dd($data);
    }

    public function point()
    {
        $this->belongsTo(Point::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
