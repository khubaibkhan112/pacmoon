<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\TwitterService;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Support\Facades\Log;
class UpdateUserPoints implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $twitterService;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // 
    }

    /**
     * Execute the job.
     */
    public function handle(TwitterService $twitterService): void
    {
        Log::info('Points Sncing Started ');
        try{
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
        }catch (\Exception $exception) {
            Log::info($exception->getMessage());
            //return response()->json(['error' => $exception->getMessage()], 500);
        }

       

    }
    
}
