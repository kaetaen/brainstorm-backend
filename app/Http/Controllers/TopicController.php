<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Comments;

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

    public function show(Request $request, $id)
    {
        try {
            $topicData = Topic::find($id);
            $topicComments = Comments::with('user:id,name,email')->where('topic_id', $id)->get();

            return response()
                        ->json([
                            "data" => [
                                "topic" => $topicData,
                                "comments" => $topicComments
                            ]
                        ]);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
