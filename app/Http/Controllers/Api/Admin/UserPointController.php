<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserPoint;
class UserPointController extends Controller
{
    public function getlikeData(Request $request)
    {
        // try {
            // $user = User::where("id",$request->id)->first();
            $user_id = 1519637376410206208;

            $syncuser= SyncUserLikesData($user_id);
            

           $metioned_ids= getUserTweets($user_id);
           $likedtweets=getMingolikedTweets();
        //    dd($likedtweets);
        $tweet_ids=[];
        // dd($likedtweets,$metioned_ids);
        $points_slug = "mentioned_mingo_in_tweet";
           foreach($likedtweets as $tweet){
                if(in_array($tweet['id'],$metioned_ids)){
                    array_push($tweet_ids, $tweet['id']);
                }
           }
           if (count($tweet_ids)) {
            $user_points = new UserPoint;
            $user_points->addPoints($user_id, $points_slug, $tweet_ids, $is_quest=false);
        }
           
            return response()->json(['message' => 'Points added successfully'], 201);
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }

}
