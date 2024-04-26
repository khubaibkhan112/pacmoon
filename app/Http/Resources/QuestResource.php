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
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'content' => $this->content,
            'tweet_id' => $this->tweet_id,
            'tweet_id' => $this->tweet_id,
            'quest_liked' => $this->quest_likes_count ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
