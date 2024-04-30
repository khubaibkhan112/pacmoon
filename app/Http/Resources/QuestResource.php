<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item['id'],
                'content' => $item['content'],
                'tweet_id' => $item['tweet_id'],
                'quest_liked' => $item['quest_likes_count'] ? true : false,
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ];
        });
    }
}
