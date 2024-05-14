<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\TwitterService;

class UpdateUserPoints implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $twitterService;
    /**
     * Create a new job instance.
     */
    public function __construct(TwitterService $twitterService)
    {
        $this->twitterService = $twitterService;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       $mention_data =  $this->twitterService->getMingoMentions();
       $liked_data = $this->twitterService->getMingoLikedTweets();
       $mention_ids = array_map(function($mention) {
            return $mention['id'];
        }, $mention_data);
        $liked_ids = array_map(function($liked) {
            return $liked['id'];
        }, $liked_data);

        $common_ids = [];
        foreach ($liked_ids as $liked_id) {
            if (in_array($liked_id, $mention_ids)) {
                $common_ids[] = $liked_id;
            }
        }
    }
}
