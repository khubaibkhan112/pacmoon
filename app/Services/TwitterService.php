<?php

namespace App\Services;

use GuzzleHttp\Client;

class TwitterService
{
    protected $client;
    protected $apiKey;
    protected $apiSecret;
    protected $accessToken;
    protected $accessTokenSecret;

    public function __construct()
    {
    $this->apiKey = env('TWITTER_CONSUMER_KEY');
        $this->apiSecret = env('TWITTER_CONSUMER_SECRET');
        $this->accessToken = env('TWITTER_ACCESS_TOKEN');
        $this->accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');

        $this->client = new Client([
            'base_uri' => 'https://api.twitter.com',
            'auth' => [$this->apiKey, $this->apiSecret, 'oauth']
        ]);
    }

    public function postTweet($status)
    {
        
        $response = $this->client->post('statuses/update.json', [
            'query' => ['status' => $status]
        ]);

        return json_decode($response->getBody(), true);
    }
    public function getTweets($id)
    {
        $response = $this->client->get('/2/tweets/'.$id);
        return json_decode($response->getBody(), true);
    }
}
