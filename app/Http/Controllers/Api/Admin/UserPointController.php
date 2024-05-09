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
                ])->get();

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
    function addFollowPoints(Request $request)
    {
        $user_id = auth()->user()->twitter_id;
        $quest_id = $request->quest_id;
        $points_slug = "points_for_following";
        $point = Point::select('id', 'points')->where('slug', $points_slug)->first();
        $lastpoint = UserPoint::where(['user_id' => $user_id,'point_id' => $point->id,'quest_id' => $id])->delete();
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

    }
    public function addRetweetPoints($id)
    {
        $user_id = auth()->user()->twitter_id;
        $pointsService = new TwitterService();
        $retweeted_by = $pointsService->getReteweets($id);
        $is_tweeted=false;
        if (isset($retweeted_by['data'])) {
            // Use array_filter to filter the array based on id

            $filtered_retweets = array_filter($retweeted_by['data'], function ($retweet) use ($user_id) {
                // dd($retweet['id'],$user_id);
                return $retweet['id'] == $user_id;
            });

            // dd($filtered_retweets);
            // Check if there are any elements in the filtered array
            if (!empty($filtered_retweets)) {
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
        }

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
        // $isQuestLiked = new TwitterService();
        $retweeted_by = isQuestLiked($user_id, $id);
        if ($retweeted_by) {
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
        } else {
            return response()->json([
                "quest_id" => $id,
                'message' => 'Quest is not liked'
            ], 400);
        }
    }
}
