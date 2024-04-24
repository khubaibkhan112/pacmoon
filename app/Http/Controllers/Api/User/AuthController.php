<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\AuthRequest;
use App\Http\Resources\PointApiResource;
use App\Models\UserPoint;
use App\Models\User;
class AuthController extends Controller
{
    function register(Request $request){

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->twitter_id = $request->input('twitter_id');
        $user->twitter_token = $request->input('twitter_token');
        $user->profile_img = $request->input('profile_img');

        $user->save();
        app('App\Http\Controllers\Api\Admin\HomeController')->syncUserInformation($user->id);
        $pointData = UserPoint::with('points')->where('user_id',$user->id);


        return new PointApiResource($pointData);

    }
}
