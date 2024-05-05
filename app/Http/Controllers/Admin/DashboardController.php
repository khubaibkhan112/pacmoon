<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $users_count = User::where('id', '!=', auth()->user()->id)->count() ?? 0;
        $quests = Quest::count() ?? 0;
        $tweetts_like_count = UserPoint::where('point_id', 1)->count() ?? 0;
        $mentions_count = UserPoint::where('point_id', 2)->count() ?? 0;
        $user_leader_board = User::select('id', 'twitter_id', 'name','profile_img')
        ->withSum('points', 'user_points')
        ->whereNotNull('twitter_id')
        ->where('twitter_id','<>',0)
        ->orderByDesc('points_sum_user_points')
        ->get();
        // dd('here');
        return view('dashboard', compact('users_count', 'quests', 'tweetts_like_count', 'mentions_count','user_leader_board'));
    }
}
