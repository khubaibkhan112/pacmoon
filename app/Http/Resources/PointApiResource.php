<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PointApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $request->twitter_id,
            'name' => $request->user->name,
            'phone' => $request->user->phone,
            'point_slug' => $request->point->slug,
            'points' => $request->total_point,
        ];
    }

}
