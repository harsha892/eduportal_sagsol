<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Http\Requests\Topics\AddTopicContentRequest;
use App\Http\Requests\Topics\GetTopicRequest;
use App\Http\Requests\Topics\UpdateTopicContentRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use App\Repositories\TopicsRepository;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    private $topicsRepository;

    public function __construct(
        TopicsRepository $topicsRepository
    ) {
        $this->topicsRepository = $topicsRepository;
    }

    public function getAllTopics(Request $request)
    {
        return response()->json(
            $this->topicsRepository->getAll($request->all())
        );
    }

    public function getTopic(GetTopicRequest $request, $topic_id)
    {
        return response()->json(
            $this->topicsRepository->get($topic_id)
        );
    }

    public function getTopicContent(GetTopicRequest $request, $topic_id)
    {
        return response()->json(
            $this->topicsRepository->getContent($topic_id)
        );
    }

    public function addTopicContent(AddTopicContentRequest $request, $topic_id)
    {
        return response()->json(
            $this->topicsRepository->addContent($topic_id, $request->get('content'))
        );
    }

    public function updateTopicContent(UpdateTopicContentRequest $request, $topic_id, $content_id)
    {
        return response()->json(
            $this->topicsRepository->updateContent($topic_id, $content_id, $request->all())
        );
    }

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
        $topic->semester_ids = $request->get("semester_ids");
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
}
