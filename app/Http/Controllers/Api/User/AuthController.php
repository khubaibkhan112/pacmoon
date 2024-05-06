<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\AuthRequest;
use App\Http\Resources\PointApiResource;
use App\Models\Point;
use App\Models\UserPoint;
use App\Models\User;
class AuthController extends Controller
{
    function register(Request $request){

        $user = User::where('twitter_id',$request->twitter_id)->first();
        $referral_code=isset($request->referral_code) ?  $request->referral_code : null;
        $referral_user=null;
        $is_referred_user=false;
        if(isset($referral_code) && $referral_code != $request->input('name'))  $referral_user = User::select('id','twitter_id')->where('name',$referral_code)->first(); 
        if(isset($user))
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->twitter_id = $request->input('twitter_id');
            // $user->twitter_token = $request->input('twitter_token');
            $is_referred_user=$user->is_referred_user;
           if(isset($referral_user)) $user->is_referred_user = true;

            $user->profile_img = $request->input('profile_img');
            $user->save();
        }else{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->twitter_id = $request->input('twitter_id');
            // $user->twitter_token = $request->input('twitter_token');
            if(isset($referral_user)) $user->is_referred_user = true;
            $user->profile_img = $request->input('profile_img');
            $user->save();
        }
        if(isset($referral_user) &&  !$is_referred_user){
            $points=Point::select('id','slug','points')->whereIn('slug',['points_for_using_referral_code','points_for_referral'])->get();
            
            $data=[];
            foreach($points as $point){
                    if($point->slug=="points_for_referral"){
                            $data[]=[
                                'user_id'=>$referral_user->twitter_id,
                                'point_id'=>$point->id,
                                'user_points'=>$point->points,
                                'referred_id'=>$user->twitter_id,

                            ];
                    }elseif($point->slug=="points_for_using_referral_code"){
                        $data[]=[
                            'user_id'=>$user->twitter_id,
                            'point_id'=>$point->id,
                            'user_points'=>$point->points,
                            'referred_by'=>$referral_user->twitter_id,
                        ];
                    }
                }
                $user_points=UserPoint::insert($data);
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
