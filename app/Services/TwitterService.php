<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class TwitterService
{
    protected $client;
    protected $postclient;
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


        $stack = \GuzzleHttp\HandlerStack::create();

        // Set up the OAuth 1.0a middleware
        $middleware = new Oauth1([
            'consumer_key' => $this->apiKey,
            'consumer_secret' => $this->apiSecret,
            'token' => $this->accessToken,
            'token_secret' => $this->accessTokenSecret
        ]);

        $stack->push($middleware);
        $this->postclient = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.twitter.com',
            'handler' => $stack,
            'auth' => 'oauth'
        ]);
    }



    // public function postTweet($status)
    // {

    //     $response = $this->client->post('/2/tweets', [
    //         'query' => ['status' => $status]
    //     ]);

    //     return json_decode($response->getBody(), true);
    // }

    public function postTweet($tweetText, $filePaths = [])
    {
        $response = $this->postclient->post('/2/tweets', [
            'json' => [
                'text' => $tweetText
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getUserByName($name)
    {
        $response = $this->client->get("/2/users/by/username/" . $name . '?user.fields=id,username,name,profile_image_url');
        return json_decode($response->getBody(), true);
    }

    public function deleteTweet($tweetId)
    {
        // $response = $this->postclient->delete("/2/tweets/{$tweetId}");
        $response = $this->postclient->delete("/2/tweets/" . $tweetId);

        return json_decode($response->getBody(), true);
    }


    public function getuser($id)
    {

        $response = $this->client->get('2/users/1774872213683863552');

        return json_decode($response->getBody(), true);
    }
    public function getTweets($id)
    {
        // $startOfDay = Carbon::now()->startOfDay()->format('Y-m-d\TH:i:s\Z');
        $startOfDay = "2024-04-22T00:00:01Z";
        // https://api.twitter.com/2/users/1519637376410206208/tweets?start_time=2024-04-22T00:00:01Z&expansions=entities.mentions.username
        $response = $this->client->get('/2/users/' . $id . '/tweets?start_time=' . $startOfDay . '&tweet.fields=public_metrics&expansions=entities.mentions.username,attachments.media_keys&media.fields=public_metrics');
        return json_decode($response->getBody(), true);
    }
    public function getUserLikedTweets($id)
    {
        $response = $this->client->get('/2/users/' . $id . '/liked_tweets?max_results=100');
        return json_decode($response->getBody(), true);
    }
    public function getTweetMatrics($ids)
    {
        // https://api.twitter.com/2/tweets?ids=1782354247440310587,1782377629443604921&tweet.fields=public_metrics&expansions=attachments.media_keys&media.fields=public_metrics
        $response = $this->client->get('/2/tweets?ids=' . $ids . '&tweet.fields=public_metrics&expansions=attachments.media_keys&media.fields=public_metrics');
    }

    public function checkFollow($id)
    {
        $response = $this->client->get('/2/users/' . $id . '/followers');
        return json_decode($response->getBody(), true);
    }

    public function getReteweets($id)
    {
        // 2/tweets/:id/retweeted_by
        $response = $this->client->get('/2/tweets/' . $id . '/retweeted_by');
        return json_decode($response->getBody(), true);
    }
    public function getMingoMentions()
    {
        // try {
            $user_id = "715568461662011393";
            $startOfDay = Carbon::now()->startOfDay()->subDay()->format('Y-m-d\TH:i:s\Z');
            $endDay = Carbon::now()->endOfDay()->format('Y-m-d\TH:i:s\Z');
            // $startOfDay = "2024-04-18T00:00:01Z";
            // $endDay = "2024-04-22T00:00:01Z";
            $response = $this->client->get('/2/users/' . $user_id . '/mentions?start_time=' . $startOfDay . '&end_time=' . $endDay . '&tweet.fields=id,text,edit_history_tweet_ids,author_id,public_metrics&max_results=50');
            // $response = $this->postclient->get('/2/users/'.$user_id.'/mentions?max_results=100');
            return json_decode($response->getBody(), true);
        // } catch (\Exception $exception) {
        //     Log::info($exception->getMessage());
        //     return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }
    public function getMingoLikedTweets()
    {

        // try {
            
            $user_id="715568461662011393";
            // $user_id = "1519637376410206208";
            // Start of the day in UTC
            $startOfDay = Carbon::now()->subDay()->startOfDay()->format('Y-m-d\TH:i:s\Z'); // Adjust as needed to be in the past
            $endDay = Carbon::now()->subDay()->endOfDay()->format('Y-m-d\TH:i:s\Z'); // Adjust as needed to be in the past
        
            // Ensure you have valid UTC times within an acceptable range
            $response = $this->client->get('/2/users/'.$user_id.'/liked_tweets');
            
            // $response = $this->postclient->get('/2/users/'.$user_id.'/liked_tweets');
            return json_decode($response->getBody(), true);
        // } catch (\Exception $exception) {
        //     Log::info($exception->getMessage());
        //     return response()->json(['error' => $exception->getMessage()], 500);
        // }
    }

}
