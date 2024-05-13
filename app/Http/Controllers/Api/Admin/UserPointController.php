<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestResource;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserPoint;
use App\Models\User;
use App\Models\Quest;
use App\Services\TwitterService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
class UserPointController extends Controller
{
    public function getlikeData(Request $request)
    {
        try {
            // $user = User::where("id",$request->id)->first();
            $user_id = auth()->user()->twitter_id;


            $syncuser = SyncUserLikesData($user_id);




            return response()->json(['message' => 'Points added successfully'], 201);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
    public function getMingoMentionsData()
    {
        // $user = User::where("id",$request->id)->first();
        $user_id = auth()->user()->twitter_id;
        $points_slug = "mentioned_mingo_in_tweet";
        $metioned_ids = getUserTweets($user_id);
        $likedtweets = getMingolikedTweets();
        //    dd($likedtweets);
        $tweet_ids = [];
        // dd($likedtweets,$metioned_ids);


        // dd($points);
        $points_metrics = [];
        foreach ($likedtweets as $tweet) {
            if (isset($metioned_ids[$tweet['id']])) {
                array_push($tweet_ids, $tweet['id']);
                $points_metrics['points_for_views'][] = [
                    'user_id' => $user_id,
                    'tweet_id' => $tweet['id'],
                    'total_count' => $metioned_ids[$tweet['id']]['points_for_views'],
                    'point_id' => 0,
                    'user_points' => 0
                ];
                $points_metrics['points_for_retweets'][] = [
                    'user_id' => $user_id,
                    'tweet_id' => $tweet['id'],
                    'total_count' => $metioned_ids[$tweet['id']]['points_for_retweets'],
                    'point_id' => 0,
                    'user_points' => 0
                ];
                $points_metrics['points_for_like'][] = [
                    'user_id' => $user_id,
                    'tweet_id' => $tweet['id'],
                    'total_count' => $metioned_ids[$tweet['id']]['points_for_like'],
                    'point_id' => 0,
                    'user_points' => 0
                ];

            }
        }

        if (count($tweet_ids)) {
            $user_points = new UserPoint;
            $user_points->addPoints($user_id, $points_slug, $tweet_ids, $is_quest = false);
            $metrics_points = new UserPoint;
            $metrics_points->addMetricPoints($points_metrics, $tweet_ids, $user_id);
        }
        // try {
        // $user = User::where("id",$request->id)->first();
        //     $user_id = auth()->user()->twitter_id;
        //     $points_slug = "mentioned_mingo_in_tweet";

        //     // $syncuser= SyncUserLikesData($user_id);

        //    $metioned_ids= getUserTweets($user_id);
        //    $likedtweets=getMingolikedTweets();
        // //    dd($likedtweets);
        // $tweet_ids=[];
        // dd($likedtweets,$metioned_ids);


        // dd($points);
        // $points_metrics=[];
        //    foreach($likedtweets as $tweet){
        //         if(isset($metioned_ids[$tweet['id']])){
        //             array_push($tweet_ids, $tweet['id']);
        //             $points_metrics['points_for_views'][]=[
        //                 'user_id'=>$user_id,
        //                 'tweet_id'=>$tweet['id'],
        //                 'total_count'=>$metioned_ids[$tweet['id']]['points_for_views'],
        //                 'point_id'=>0,
        //             ];
        //             $points_metrics['points_for_retweets'][]=[
        //                 'user_id'=>$user_id,
        //                 'tweet_id'=>$tweet['id'],
        //                 'total_count'=>$metioned_ids[$tweet['id']]['points_for_retweets'],
        //                 'point_id'=>0,
        //             ];
        //             $points_metrics['points_for_like'][]=[
        //                 'user_id'=>$user_id,
        //                 'tweet_id'=>$tweet['id'],
        //                 'total_count'=>$metioned_ids[$tweet['id']]['points_for_like'],
        //                 'point_id'=>0,
        //             ];

        //         }
        //    }

        //    if (count($tweet_ids)) {
        //     $user_points = new UserPoint;
        //     $user_points->addPoints($user_id, $points_slug, $tweet_ids, $is_quest=false);
        //     $metrics_points = new UserPoint;
        //     $metrics_points->addMetricPoints($points_metrics,$tweet_ids,$user_id);
        //     }


        return response()->json(['message' => 'Points added successfully'], 201);
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }

    // public function follow($twitter_id)
    // {
    //     $mingo_twitter_id = '1519637376410206208';
    //     $followers = checkFollow($mingo_twitter_id);
    //     $follow=false;
    //        foreach($followers as $follow){
    //             if(isset($twitter_id) && $twitter_id==$follow['id']){
    //                 $follow = true;
    //             }
    //        }
    //     if($follow)
    //     {
    //         app('App\Http\Controllers\Api\Admin\HomeController')->syncUserInformation('' , $twitter_id);
    //         return response()->json(['message' => 'User Data Successfully Updated'], 200);
    //     }else{
    //         return response()->json(['message' => 'User Not Following'], 400);
    //     }

    // }
    public function getQuests(Request $request)
    {
        $twitter_id = auth()->user()->twitter_id;
        // $twitter_id=1519637376410206208;
        // $syncuser= SyncUserLikesData($twitter_id);
        $quests = Quest::withCount([
            'questLikes' => function ($q) use ($twitter_id) {
                $q->where('user_id', $twitter_id);
            }
        ])->withCount([
                    'questRetweets' => function ($q) use ($twitter_id) {
                        $q->where('user_id', $twitter_id);
                    }
                ])->withCount([
                    'accountFollows' => function ($q) use ($twitter_id) {
                        $q->where('user_id', $twitter_id);
                    }
                ])->orderBy('id','DESC')->get();

        $groupedData = $quests->groupBy('type');

        // Rename keys according to 'type' column
        $renamedData = $groupedData->mapWithKeys(function ($item, $key) {
            return [$key => $item->toArray()];
        });

        // You can then access 'tweet' and 'follow' groups separately
        $tweets = $renamedData->get('tweet');
        $follows = $renamedData->get('follow');
        //  dd($quests->get());
        $tweets = new QuestResource($tweets);
        $follows = new QuestResource($follows);
        return response()->json([
            'status' => 'success',
            'quests' => [
                'tweets' => $tweets,
                'follows' => $follows,
            ],
        ], 200);
    }
    public function addRetweetPoints($id)
    {
        $user_id = auth()->user()->twitter_id;
        $reweet_users=$this->getRetweetsUser($id);
        // return $reweet_users;
         $continuation_token = $reweet_users['continuation_token'];
         $reweet_users=$reweet_users['retweets'];
         //882699945207377921
        $is_tweeted=false;
         foreach($reweet_users as $user){
             if($user['user_id']==$user_id){
                 $is_tweeted=true;
                 break;
             }
         }
            if( !$is_tweeted && isset($continous_token) && $reweet_users){
                usleep(400000);
                $is_tweeted = $this->getRetweetsUserContinous($id,$continous_token,$user_id);
            }
            if ($is_tweeted) {
                // dd($is_tweeted,'hr');
                $points_slug = "points_for_quest_retweet";
                $point = Point::select('id', 'points')->where('slug', $points_slug)->first();
                $lastpoint = UserPoint::where(['user_id' => $user_id,'point_id' => $point->id,'quest_id' => $id])->delete();
                $user_points = UserPoint::create([
                    'user_id' => $user_id,
                    'point_id' => $point->id,
                    'quest_id' => $id,
                    'user_points' => $point->points
                ]);
                return response()->json([
                    'message' => 'Points added successfully',
                    "quest_id" => $id,
                    "points" => $point->points,
                ], 200);
            }
        // }

        // If $user_id not found in the retweeted_by data, do something else
        // For example, return false
        return response()->json([
            'message' => 'Tweet not reposted',
            "quest_id" => $id
        ], 400);
    }
    public function addQuestLikedpoints($id)
    {
        $user_id = auth()->user()->twitter_id;
        $points_slug = "liked_a_quest";
        $point = Point::select('id', 'points')->where('slug', $points_slug)->first();
            $lastpoint = UserPoint::where(['user_id' => $user_id,'point_id' => $point->id,'quest_id' => $id])->delete();
            $user_points = UserPoint::create([
                'user_id' => $user_id,
                'point_id' => $point->id,
                'quest_id' => $id,
                'user_points' => $point->points
            ]);
            return response()->json([
                "points" => $point->points,
                "quest_id" => $id,
                'message' => 'Points added successfully'
            ], 200);
    }
    function addFollowPoints(Request $request)
    {
        $user_id = auth()->user()->twitter_id;
        //  $user_id = "1774872213683863552";
        $followers=  ($this->getFollowers($user_id));
        $user_name = $request->user_name;
        $is_followed=false;
        $results=$followers['results'];
        $continous_token=$followers['continuation_token'];
        $parts = explode('|', $continous_token);
        foreach($results as $follow){
    //   if($follow['username'] == 'mingoapps')  dd($follow['username']);
                if($follow['username']== $user_name){
                    $is_followed=true;
                    break;
                } 
        }
        
            
            if($parts[0] != 0 && !$is_followed && isset($continous_token) && $results){
                usleep(400000);
                $is_followed = $this->getFollowerscontinous($user_id,$user_name,$continous_token);
            }

        if($is_followed){
            $quest_id = $request->quest_id;
            $points_slug = "points_for_following";
            $point = Point::select('id', 'points')->where('slug', $points_slug)->first();
            $lastpoint = UserPoint::where(['user_id' => $user_id,'point_id' => $point->id,'quest_id' => $quest_id])->delete();
            $user_points = UserPoint::create([
                'user_id' => $user_id,
                'point_id' => $point->id,
                'quest_id' => $quest_id,
                'user_points' => $point->points
            ]);
            return response()->json([
                "points" => $point->points,
                'message' => 'Points added successfully'
            ], 201);
        }else{
            return response()->json([
                "points" => 0,
                'message' => 'Account Not Followed'
            ], 400);
        }

    }
    public function getFollowers($user_id,$token=null){
        if($token){
            
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => '4bade4371fmsh5c418e469add4f2p1bdb09jsn509941cc0fc5',
                'X-RapidAPI-Host' => 'twitter154.p.rapidapi.com',
            ])->get('https://twitter154.p.rapidapi.com/user/following/continuation', [
                'user_id' => $user_id,
                'continuation_token'=>$token,
                "limit"=>100
            ]);
        }else{
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => '4bade4371fmsh5c418e469add4f2p1bdb09jsn509941cc0fc5',
                'X-RapidAPI-Host' => 'twitter154.p.rapidapi.com',
            ])->get('https://twitter154.p.rapidapi.com/user/following', [
                'user_id' => $user_id,
                "limit"=>100
            ]);
            
        }
         if ($response->successful()) {
            // Get the response body
            $data = $response->json();

            // Return the fetched tweets
            return $data;
        } else {
            // Handle the error
            dd($response);
        }
    }
    public function getRetweetsUser($tweet_id,$token=null){
        if($token){
            
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => '4bade4371fmsh5c418e469add4f2p1bdb09jsn509941cc0fc5',
                'X-RapidAPI-Host' => 'twitter154.p.rapidapi.com',
            ])->get('https://twitter154.p.rapidapi.com/tweet/retweets/continuation', [
                'tweet_id' => $tweet_id,
                'continuation_token'=>$token,
                "limit"=>40
            ]);
        }else{
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => '4bade4371fmsh5c418e469add4f2p1bdb09jsn509941cc0fc5',
                'X-RapidAPI-Host' => 'twitter154.p.rapidapi.com',
            ])->get('https://twitter154.p.rapidapi.com/tweet/retweets', [
                'tweet_id' => $tweet_id,
                "limit"=>40
            ]);
            
        }
         if ($response->successful()) {
            // Get the response body
            $data = $response->json();

            // Return the fetched tweets
            return $data;
        } else {
            // Handle the error
            dd($response);
        }
    }
    public function getFollowerscontinous($user_id, $token = null, $user_name)
    {
        // Fetch followers with continuation token
        $backoffTime = Cache::get('twitter_api_backoff_time', 0);

    // If backoff time is in the future, sleep until then
        if ($backoffTime > time()) {
            sleep($backoffTime - time());
        }
        $followers = $this->getFollowers($user_id, $token);
        // Check if the followers array is present
        if (!isset($followers['results'])) {
            // Return false if no followers found
            return false;
        }

        // Extract results and continuation token from the response
        $results = $followers['results'];
        $continuation_token = $followers['continuation_token'];

        // Check if the user is followed in the current batch of followers
        foreach ($results as $follow) {
            if ($follow['username'] == $user_name) {
                // Return true if user is followed
                return true;
            }
        }
        $parts = explode('|',  $continuation_token);
        // If continuation token is present and user is not found yet, recursively call the function
        if (isset($continuation_token) && $parts[0] != 0 && isset($results) ) {
            usleep(400000);
            return $this->getFollowerscontinous($user_id, $continuation_token, $user_name);
        }

        // Return false if no more followers to fetch and user is not found
        return false;
    }
    public function getRetweetsUserContinous($user_id, $token = null, $tweet_id)
    {
     $reweet_users=$this->getRetweetsUser($tweet_id,$token);
        // return $reweet_users;
         $continuation_token = $reweet_users['continuation_token'];
         $reweet_users=$reweet_users['retweets'];
         //882699945207377921
         foreach($reweet_users as $user){
             if($user['user_id']==$user_id){
                return true;
             }
         }
        
        // If continuation token is present and user is not found yet, recursively call the function
        if(isset($continous_token) && $reweet_users){
                usleep(400000);
                $is_tweeted = $this->getRetweetsUserContinous($id,$continous_token,$user_id);
        }

        // Return false if no more followers to fetch and user is not found
        return false;
    }

}
