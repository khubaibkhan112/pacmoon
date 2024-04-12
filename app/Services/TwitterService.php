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
    protected $bearerToken;

    public function __construct()
    {
    $this->apiKey = env('TWITTER_CONSUMER_KEY');
        $this->apiSecret = env('TWITTER_CONSUMER_SECRET');
        $this->accessToken = env('TWITTER_ACCESS_TOKEN');
        $this->accessTokenSecret = env('TWITTER_ACCESS_TOKEN_SECRET');
        $this->bearerToken = env('TWITTER_BEARER_TOKEN');

        $this->client = new Client([
            'base_uri' => 'https://api.twitter.com',
            'auth' => [$this->apiKey, $this->apiSecret, 'oauth'],
            'headers' => [
                'Authorization' => 'Bearer ' . $this->bearerToken,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function postTweet($status)
    {
        
        $response = $this->client->post('statuses/update.json', [
            'query' => ['status' => $status]
        ]);

        return json_decode($response->getBody(), true);
    }
    public function getuser()
    {
        
        $response = $this->client->get('2/users/1774872213683863552');

        return json_decode($response->getBody(), true);
    }
    public function getTweets($id)
    {
        $response = $this->client->get('/2/tweets/'.$id);
        return json_decode($response->getBody(), true);
    }
}
