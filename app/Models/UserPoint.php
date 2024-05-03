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
        'user_points',
        'for_account',
        'total_count',
    ];
    public function addPoints($user_id,$points_slug,$quest_id=Null,$is_quest=true){
        $point=Point::select('id','points')->where('slug',$points_slug)->first();

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
                     'user_points'=>$point->points
                ]
               );
        }
        if(count($data)) $user_points_row=self::insert($data);

    }
    public function addMetricPoints($data,$tweet_ids,$user_id)  {
        $points=Point::whereIn('slug',['points_for_like','points_for_retweets','points_for_views'])->get()->toArray();
        $pointsIds = [];
        foreach ($points as $point) {
            $pointsIds[] = $point['id'];
        }
        $deletePoints=self::where('user_id',$user_id)->whereIn('point_id',$pointsIds)->whereIn('tweet_id',$tweet_ids)->delete();
        $points_data=[];
        // dd($points,$data);
        foreach($points as $point){
            $slug=$point['slug'];
            $slug_data= $data[$slug];
             $metric_points=$this->updatePointId($slug_data,$point['id'],$point['points']);
             $points_data = array_merge($points_data, $metric_points);
        }
        if(count($points_data)) $user_points_row=self::insert($points_data);
    }
    function updatePointId($data,$pointId,$points) {
        
        $updatedArray = array_map(function($item) use ($pointId,$points) {
            if ($item['total_count'] != 0) {
                $item['point_id'] = $pointId; // Change 'point_id' to the passed point value
                $item['user_points'] = (int)$points * (int)$item['total_count']; // Change 'point_id' to the passed point value
                return $item;
            } else {
                return null; // Return null for items with total_count equal to zero
            }
        }, $data);
        
        // Remove null values from the updated array
        $updatedArray = array_filter($updatedArray);
        return $updatedArray;
    }
    public function point(){
        return $this->belongsTo(Point::class)->select('id','slug','points','user_points');
    }
    public function points(){
        return $this->belongsTo(Point::class)->select('id','slug','points','user_points');
    }
// Use array_map to apply the function to each element of the array
}
