<?php
namespace App\Repositories;

use App\Models\Topic;
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

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

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

    public function addContent($topic_id, array $data = [])
    {

    }
}
