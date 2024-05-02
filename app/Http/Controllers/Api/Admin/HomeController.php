<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function syncUserInformation($request,string $user_id = null)
    {
        $user_id = isset($user_id) ? $user_id : $request->twitter_id;
        switch ($slug)
        {
            case 'liked_a_quest':
                SyncUserLikesData($user_id);
            break;
            case 'mentioned_mingo_in_tweet':
                getUserTweets($user_id);
            break;
            default :
                SyncUserQuestData($user_id);
                getUserTweets($user_id);
            break;
        }
    }
}
