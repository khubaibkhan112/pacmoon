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
            if($item['type']=='tweet'){
                return [
                    'id' => $item['id'],
                    'content' => $item['content'],
                    'type' => $item['type'],
                    'tweet_id' => $item['tweet_id'],
                    'quest_liked' => $item['quest_likes_count'] ? true : false,
                    'quest_retweeted' => $item['quest_retweets_count'] ? true : false,
                    'created_at' => $item['created_at'],
                    'updated_at' => $item['updated_at'],
                ];
            }else{
                return [
                    'id' => $item['id'],
                    'account' => $item['account'],
                    'account_url' => $item['account_url'],
                    'type' => $item['type'],
                    'account_followed' => $item['account_follows_count'] ? true : false,
                    'created_at' => $item['created_at'],
                    'profile_img' => $item['profile_url'] ?? '',
                    'updated_at' => $item['updated_at'],
                ];
            }
            
        });
    }
}
