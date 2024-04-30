<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()  {
        $users_count=User::except(auth()->user->id)->count();
        $quests=Quest::count();
        $tweetts_like_count=UserPoint::where('point_id',1)->count();
        $mentions_count=UserPoint::where('point_id',2)->count();
        return view('dashboard',compact('users_count','quests','tweetts_like_count','mentions_count'));
    }
}
