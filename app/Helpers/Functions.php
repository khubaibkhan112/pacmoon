<?php
use App\Models\UserPoint;
use App\Services\TwitterService;
use App\Models\Quest;

function SyncUserQuestData()
{
    $pointsService = new TwitterService();

    // Call API for Getting User Latest Data Saved in Db.

    //Logic for Assigning User Points Based on Response. And Status of User form

    //Update Database

}
function SyncUserLikesData($id, $is_quest = true,)
{
    $questids = Quest::select('tweet_id')->pluck('tweet_id')->toArray();
    $questids = [];
    if(isset($questids)){
        $pointsService = new TwitterService();
        $data = $pointsService->getUserLikedTweets($id);
        $points_slug = "liked_a_quest";
        foreach ($data['data'] as $tweet) {
            //  dd($questids,$tweet['id']);
            if (in_array($tweet['id'], $questids)) {
                array_push($questids, $tweet['id']);
            }
        }
        // dd($questids);
        if (count($questids)) {
            $user_points = new UserPoint;
            $user_points->addPoints($id, $points_slug, $questids, $is_quest);
        }
    }
    // Call API for Getting User Latest Data Saved in Db.

    //Logic for Assigning User Points Based on Response. And Status of User form

    //Update Database

}
function isQuestLiked($id, $quest_id): bool
{
    // $questids = Quest::select('tweet_id')->pluck('tweet_id')->toArray();
    // $questids = [];
    if(isset($questids)){
        $pointsService = new TwitterService();
        $data = $pointsService->getUserLikedTweets($id);
        
        {
            foreach ($data['data'] as $tweet) {
                if ($tweet['id']== $quest_id){
                    return true;
                } 
            }
        }
        return false;
    }

}
function SyncUserShareData()
{
    $pointsService = new TwitterService();
    // Call API for Getting User Latest Data Saved in Db.

    //Logic for Assigning User Points Based on Response. And Status of User form

    //Update Database

}
function getUserTweets($user_id)
{
    $user_tweets_data = new TwitterService();
    $user_tweets_data = $user_tweets_data->getTweets($user_id);
    $filteredTweets = [];
    // dd($user_tweets_data);
    foreach ($user_tweets_data['data'] as $tweet) {
        $mentions =isset($tweet['entities']) && isset($tweet['entities']['mentions']) ? $tweet['entities']['mentions'] : [];
        $tags = $tweet['text'];

        $mentionedMingoApps = false;
        foreach ($mentions as $mention) {
            if (isset($mention['username']) && $mention['username'] === 'mingoapps') {
                $mentionedMingoApps = true;
                break;
            }
        }

        $hasMingoTags = preg_match('/#MingooDay|#mingoApps|#mingo/', $tags);

        if ($mentionedMingoApps || $hasMingoTags) {
            $filteredTweets[$tweet['id']] = [
               "id" => $tweet['id'],
            //    "slug"=>$points_slug,
               "points_for_retweets" => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['retweet_count'] : [],
               "points_for_like" => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['like_count'] : [],
               "points_for_views" => isset($tweet['public_metrics'])  ? $tweet['public_metrics']['impression_count'] : [],
            ];


        }
    }
    return $filteredTweets;

}
 function getMingolikedTweets(){
    $pointsService = new TwitterService();
    $id="1770029816428802048";
    $data = $pointsService->getUserLikedTweets($id);
    return $data['data'];
}

function checkFollow()
{
    $pointsService = new TwitterService();
    $id="1770029816428802048";
    $data = $pointsService->checkFollow($id);
    return $data['data'];
}



