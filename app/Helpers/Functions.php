<?php
use App\Services\TwitterService;

    function SyncUserQuestData()
    {
        $pointsService = new TwitterService();

        // Call API for Getting User Latest Data Saved in Db.

        //Logic for Assigning User Points Based on Response. And Status of User form

        //Update Database

    }
    function SyncUserLikesData()
    {
        $pointsService = new TwitterService();
        $pointsService->getTweets($id);
        dd($pointsService);
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

