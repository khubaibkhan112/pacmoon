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

        $user = User::where('twitter_id',$request->twitter_id)->first();
        if(isset($user))
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->twitter_id = $request->input('twitter_id');
            // $user->twitter_token = $request->input('twitter_token');
            $user->profile_img = $request->input('profile_img');
            $user->save();
        }else{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->twitter_id = $request->input('twitter_id');
            // $user->twitter_token = $request->input('twitter_token');
            $user->profile_img = $request->input('profile_img');
            $user->save();
        }
        // app('App\Http\Controllers\Api\Admin\HomeController')->syncUserInformation($request , $user->twitter_id);
        $pointData = UserPoint::with('point')->where('user_id',$user->twitter_id)->get();
        // dd($pointData);
        $user_points = isset($pointData) ?  new PointApiResource($pointData) :  [];
    // dd($pointData);
        return response()->json([
            "user"=>$user,
            'points'=>$user_points,
            'token' => $user->createToken(\Str::random(20))->plainTextToken

        ],200);
    }
}
