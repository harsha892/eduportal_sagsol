<?php
namespace App\Repositories;

use App\Models\Topic;
use App\Models\TopicContent;
use Cartalyst\Sentinel\Sentinel;

class TopicsRepository
{
    private $topic;

    public function __construct(
        Topic $topic,
        Sentinel $auth
    ) {
        $this->topic = $topic;
        $this->auth = $auth;
    }

    /**
     * Get the topic
     *
     * @param integer $id
     *
     * @return User
     */
    public function get($id)
    {
        $topic = $this->topic->findOrFail($id);
        return $topic;
    }

    public function getWithContent($id)
    {
        $topic = $this->get($id);
        $topic->content;
        return $topic;
    }

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        $users = $this->topic->join('group_subjects', 'topics.subject_id', '=', 'group_subjects.id')
            ->join('subjects', 'group_subjects.subject_id', '=', 'subjects.id')
            ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            ->select(
                'topics.id',
                'topics.name',
                'topics.short_description',
                'topics.is_active',
                'topics.subject_id',
                'subjects.name AS subject_name',
                'groups.name AS group_name',
                'groups.id AS group_id'
                // 'subjects.id AS subject_id'

                // 'user_details.first_name',
                // 'user_details.last_name',
                // 'user_details.phone',
                // 'role_users.role_id',
                // 'roles.name AS role'
            )
            ->where(function ($s_query) use ($search) {
                if (!empty($search)) {
                    $s_query->where('topics.name', 'LIKE', "%$search%");
                }
            })
            ->orderBy($sortBy, $sortType)
            ->paginate(15)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);

        return $users;

        return $this->topic->where("name", "LIKE", "%$search%")
            ->orderBy($sortBy, $sortType)
            ->paginate(100)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);

    }

    public function create($data)
    {
        $topic = $this->assign(new Topic(), $data);
        $topic->save();
        return $topic;
    }

    /**
     * Assign topic details
     *
     * @param UserDetail $topicDetail
     * @param array $data
     *
     */
    private function assign(Topic $topic, $data)
    {
        if (isset($data['slug'])) {
            $topic->slug = $data['slug'];
        }

        if (isset($data['name'])) {
            $topic->name = $data['name'];
        }

        if (isset($data['short_description'])) {
            $topic->short_description = $data['short_description'];
        }

        if (isset($data['long_description'])) {
            $topic->long_description = $data['long_description'];
        }

        if (isset($data['subject_id'])) {
            $topic->subject_id = $data['subject_id'];
        }
        return $topic;
    }

    public function getContent($topic_id)
    {
        $topic = $this->getWithContent($topic_id);
        return $topic->content;

    }

    public function addContent($topic_id, array $data = [])
    {
        $topic = $this->get($topic_id);
        $content = $this->assignTopicContent(new TopicContent(), $data);
        $content->topic_id = $topic_id;
        $content->save();
        return $content;
    }

    public function updateContent($topic_id, $content_id, array $data = [])
    {
        $content = TopicContent::findOrFail($content_id);
        $content = $this->assignTopicContent($content, $data);
        $content->save();
        return $content;
    }

    private function assignTopicContent(TopicContent $content, $data)
    {
        if (empty($content)) {
            $content = new TopicContent();
        }

        if (isset($data['notes'])) {
            $content->notes = $data['notes'];
        }

        if (isset($data['video'])) {
            $content->video = $data['video'];
        }

        if (isset($data['ppt'])) {
            $content->ppt = $data['ppt'];
        }

        if (isset($data['audio'])) {
            $content->audio = $data['audio'];
        }

        return $content;

    }
}
