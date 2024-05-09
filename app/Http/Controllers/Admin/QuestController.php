<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use Illuminate\Http\Request;
use App\Services\TwitterService;

class QuestController extends Controller
{
    protected $twitterService;

    public function __construct(TwitterService $twitterService)
    {
        $this->twitterService = $twitterService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quests =  Quest::get()->toArray();
        $quests = json_encode($quests);

        return view('quests.index', [
            'quests_data' => $quests
        ]);
    }

    public function getData()
    {
        $quests =  Quest::get()->toArray();
        return response()->json($quests, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $content = $request->input('content');
        $quest = new Quest();
        $message = 'Error posting tweet';
        if($request->type=='tweet')
        {
        
            $files=[];
            if($request->hasFile('media')){

                // Iterate over each uploaded file
                foreach ($request->file('media') as $file) {
                    // Read the file contents and convert it to base64
                    $base64 = base64_encode(file_get_contents($file->path()));
                    
                    // Append the base64 string to the files array
                    $files[] = $base64;
                }
            }

            $response = $this->twitterService->postTweet($content,$files);
            if($response['data'])
            {
                $quest->content = $request->content;
                $quest->tweet_id = $response['data']['id'];
                $quest->save();
                $message = 'Quest Added successfully';
            }else{
                $message = 'Cant post a tweet';
            }
        }else{
            $response = $this->twitterService->getUserByName($request->user_name);
            if(isset($response['data']))
            {
                $quest->account = $request->user_name;
                $quest->account_url = $request->account_url;
                $quest->type = $request->type;
                $quest->profile_url = $response['data']['profile_image_url'];
                $quest->save();
                $message = 'Quest Added successfully';
            }else{
                $message = 'User Account Not Available';
            }
        }
        if (isset($response['data'])) {
            return response()->json(['success' => true, 'message' => $message]);
        } else {
            return response()->json(['success' => false, 'message' => $message]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quest =  Quest::find($id);
        if($quest){
           
            if($quest->type=='tweet'){
                $response = $this->twitterService->deleteTweet($id);
                if (!isset($response['data']) || $response['data']['deleted'] !== true) {                    
                    return response()->json(['success' => false, 'message' => 'Error deleting tweet']);
                }
            }    
            $quest->delete();
            return response()->json(['success' => true, 'message' => 'Quest deleted successfully']);
        } 
        else{
            return response()->json(['success' => false, 'message' => 'Error deleting Quest']);
        }  

    }
}
