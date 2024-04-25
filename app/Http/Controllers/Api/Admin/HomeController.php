<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function syncUserInformation($request,string $user_id = null)
    {
        $user_id = isset($user_id) ? $user_id : $request->twitter_id;
        getUserTweets($user_id);
        SyncUserShareData($user_id);
        SyncUserLikesData($user_id);
        SyncUserQuestData($user_id);
    }
}
