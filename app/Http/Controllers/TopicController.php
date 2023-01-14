<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    private Topic $topic;

    function __construct(Topic $topic) {
        $this->topic = $topic;
    }

    public function index(Request $request)
    {
        try{
            $listTopics = $this->topic::with('user')->get();

            return response()->json($listTopics,200);

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

        
    }
}
