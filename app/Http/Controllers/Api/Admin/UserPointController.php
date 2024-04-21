<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserPointController extends Controller
{
    public function getlikeData(Request $request)
    {
        // try {
            // $user = User::where("id",$request->id)->first();
            $user_id = 1519637376410206208;
           $data= SyncUserLikesData($user_id);
           
            return response()->json(['message' => 'Points added successfully'], 201);
        // } catch (\Exception $exception) {
        //     DB::rollback();
        //     return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }
}
