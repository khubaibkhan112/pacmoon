<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PointApiResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'user_id' => $item['user_id'],
                'point_slug' => $item['point']['slug'] ?? '',
                'total_points' => $item['point']['points'] ? $item['total_count'] * $item['point']['points'] : 0,
                'tweet_id' => $item['tweet_id'] ?? '',
                'quest_id' => $item['quest_id'] ?? '',
                'for_count' => $item['total_count'] ?? 1,
            ];
        });
    }

}
