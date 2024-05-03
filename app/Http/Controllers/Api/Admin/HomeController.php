<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::select('id', 'twitter_id', 'name')
        ->withSum('points', 'user_points')
        ->whereNotNull('twitter_id')
        ->orderByDesc('points_sum_user_points')
        ->get();
    
       if($users) return response()->json([
            'data'=>$users,
        ],200);

        return response()->json([
            'message'=>'no users to list yet',
        ]);

    }
}
