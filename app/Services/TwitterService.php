<?php

namespace App\Services;

use GuzzleHttp\Client;
use Carbon\Carbon;

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

    // public function postTweet($status)
    // {

    //     $response = $this->client->post('/2/tweets', [
    //         'query' => ['status' => $status]
    //     ]);

    //     return json_decode($response->getBody(), true);
    // }

    public function postTweet($tweetText)
    {
        $response = $this->client->post('/2/tweets', [
            'json' => [
                'text' => $tweetText
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function deleteTweet($tweetId)
    {
        $response = $this->client->delete("/2/tweets/{$tweetId}");

        return json_decode($response->getBody(), true);
    }


    public function getuser($id)
    {

        $response = $this->client->get('2/users/1774872213683863552');

        return json_decode($response->getBody(), true);
    }
    public function getTweets($id)
    {
        $startOfDay = Carbon::now()->startOfDay()->format('Y-m-d\TH:i:s\Z');
        // $startOfDay = "2024-04-22T00:00:01Z";
        // https://api.twitter.com/2/users/1519637376410206208/tweets?start_time=2024-04-22T00:00:01Z&expansions=entities.mentions.username
        $response = $this->client->get('/2/users/' . $id .'/tweets?start_time='. $startOfDay .'&expansions=entities.mentions.username');
        return json_decode($response->getBody(), true);
    }
    public function getUserLikedTweets($id)
    {
        $response = $this->client->get('/2/users/'.$id.'/liked_tweets');
        return json_decode($response->getBody(), true);
    }
    

}
