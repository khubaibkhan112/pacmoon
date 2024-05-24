<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\TwitterService;
// use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function syncUserInformation(Request $request,string $slug,string $user_id = null)
    {
        $user_id = isset($user_id) ? $user_id : $request->twitter_id;
        switch ($slug)
        {
            case 'liked_a_quest':
                SyncUserLikesData($user_id);
            break;
            case 'mentioned_mingo_in_tweet':
                // getUserTweets($user_id);
                app('App\Http\Controllers\Api\Admin\UserPointController')->getMingoMentionsData();
            break;
            default :
                // SyncUserQuestData($user_id);
                // getUserTweets($user_id);
                app('App\Http\Controllers\Api\Admin\UserPointController')->getMingoMentionsData();
            break;
        }
    }
    public function getLeaderBoardData()  {
       $users = User::select('id', 'twitter_id', 'name', 'profile_img')
    ->withSum('points', 'user_points')
    ->whereNotNull('twitter_id')
    ->where('twitter_id', '<>', 0)
    ->orderByDesc('points_sum_user_points')
    ->limit(5)
    ->get();

// return $userWithPosition;

    
       if($users) return response()->json([
            'data'=>$users,
        ],200);

        return response()->json([
            'message'=>'no users to list yet',
        ]);

    }
    public function testjob(TwitterService $twitterService){
        Log::info('Points Sncing Started ');
        // try{
            $this->twitterService = $twitterService;
            $mention_data =  $this->twitterService->getMingoMentions();
            $liked_data = $this->twitterService->getMingoLikedTweets();
            $mention_ids = array_map(function($mention) {
                 return $mention['id'];
             }, $mention_data['data']);
             $liked_ids = array_map(function($liked) {
                 return $liked['id'];
             }, $liked_data['data']);
     
             $common_ids = [];
             $liked_ids = array_map('trim', $liked_ids);
             $mention_ids = array_map('trim', $mention_ids);

            // Find common elements
             $common_ids = array_intersect($liked_ids, $mention_ids);
             $filteredTweets = [];
             $tweet_ids=[];
             $user_ids=[];
             $users=User::whereNotNull('twitter_id')->where('twitter_id','<>',0)->get()->pluck('twitter_id')->toArray();
             $points_metrics = [];
             foreach($mention_data['data'] as $tweet){
                 if(in_array($tweet['id'],$common_ids) && in_array($tweet['author_id'],$users)){
                     array_push($tweet_ids, $tweet['id']);
                     array_push($user_ids, $tweet['author_id']);
                     $points_metrics['points_for_views'][] = [
                         'user_id' => $tweet['author_id'],
                         'tweet_id' => $tweet['id'],
                         'total_count' => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['impression_count'] : 0,
                         'point_id' => 0,
                         'user_points' => 0
                     ];
                     $points_metrics['points_for_retweets'][] = [
                         'user_id' => $tweet['author_id'],
                         'tweet_id' => $tweet['id'],
                         'total_count' => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['retweet_count'] : 0,
                         'point_id' => 0,
                         'user_points' => 0
                     ];
                     $points_metrics['points_for_like'][] = [
                         'user_id' => $tweet['author_id'],
                         'tweet_id' => $tweet['id'],
                         'total_count' => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['like_count'] : 0,
                         'point_id' => 0,
                         'user_points' => 0
                     ];   
                 }
             }
             $points_slug = "mentioned_mingo_in_tweet";
             if (count($tweet_ids)) {
                 $user_ids = array_values(array_unique($user_ids));
                 foreach($user_ids as $user_id){
                     $user_points = new UserPoint;
                     $user_points->addPoints($user_id, $points_slug, $tweet_ids, $is_quest = false); 
                 }
                 $metrics_points = new UserPoint;
                 $metrics_points->addMetricPoints($points_metrics, $tweet_ids,$user_ids);
             }
             Log::info('Points Sncing Ended ');
        // }catch (\Exception $exception) {
        //     Log::info($exception->getMessage());
        //     //return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }
}
