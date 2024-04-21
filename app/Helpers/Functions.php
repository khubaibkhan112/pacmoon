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
    function SyncUserLikesData($id)
    {
        $pointsService = new TwitterService();
        $data=$pointsService->getUserLikedTweets($id);
        $questids=Quest::select('tweet_id')->pluck('tweet_id')->toArray();

        foreach($data['data'] as $tweet){
            //  dd($questids,$tweet['id']);
            if(in_array($tweet['id'],$questids)){
                $user_points= new UserPoint;
                $points_slug="liked_a_quest";
                $quest_id=$tweet['id'];
                $user_points->addPoints($id,$points_slug,$quest_id);
                
            }
        }
        // Call API for Getting User Latest Data Saved in Db.

        //Logic for Assigning User Points Based on Response. And Status of User form

        //Update Database

    }
    function SyncUserShareData()
    {
        $pointsService = new TwitterService();
        // Call API for Getting User Latest Data Saved in Db.

        //Logic for Assigning User Points Based on Response. And Status of User form

        //Update Database

    }

