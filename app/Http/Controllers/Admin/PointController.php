<?php

namespace App\Http\Controllers\Admin;

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points =  Point::get()->toArray();
        $points = json_encode($points);

        // dd($points);

        return view('points.index', [
            'points_data' => $points
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all(), 'here');
        try {
            DB::beginTransaction();

            $points = new Point();

            $points->points = $request->points;
            $points->slug = \Str::slug($request->note, '_');
            $points->note = $request->note;

            $points->save();
            DB::commit();
            return response()->json(['message' => 'Points added successfully'], 201);
        } catch (\Exception $exception) {
            DB::rollback();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
