<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicReuqest;
use Illuminate\Http\Request;

use App\Http\Requests\TopicRequest;
use App\Http\Requests\UpdateTopicRequest;

use App\models\Topic;

class TopicController extends Controller
{
    public function createNewTopic(TopicRequest $request)
    {
        $topic = new topic();
        $topic->name = $request->get("name");
        $topic->is_active = $request->get("is_active");

        $topic->created_by = $request->get("created_by");
        $topic->updated_by = $request->get("updated_by");

        $topic->short_description = $request->get("short_description");
        $topic->long_description = $request->get("long_description");
        $topic->related_group_ids = $request->get("related_group_ids");
        $topic->related_subject_ids = $request->get("related_subject_ids");
        $topic->semister_ids = $request->get("semister_ids");
        $topic->type_of_content = $request->get("type_of_content");

        $topic->save();

        return $topic;
    }
    public function updateTopic(UpdatetopicRequest $request)
    {
        $topic = topic::find($request->get("id"));

        $topic->name = $request->get("name");
        $topic->is_active = $request->get("is_active");

        $topic->created_by = $request->get("created_by");
        $topic->updated_by = $request->get("updated_by");

        $topic->short_description = $request->get("short_description");
        $topic->long_description = $request->get("long_description");
        $topic->type_of_content = $request->get("type_of_content");


        $topic->save();
        return $topic;

    }
    public function DeleteTopic(Request $request)
    {
        $topic = topic::find($request->get("id"));
        $topic->delete();
        return "topic Deleted Successful";
    }
    public function getAllTopics()
    {
        $topic = topic::all();
        return $topic;
    }
}
