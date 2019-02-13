<?php
namespace App\Repositories;

use App\Models\Subject;
use Cartalyst\Sentinel\Sentinel;

class SubjectRepository
{
    private $subject;

    public function __construct(
        Subject $subject,
        Sentinel $auth
    ) {
        $this->subject = $subject;
        $this->auth = $auth;
    }

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        return $this->subject->where("name", "LIKE", "%$search%")
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
        $subject = $this->assign(new Subject(), $data);
        $subject->save();
        return $subject;
    }

    /**
     * Assign user details
     *
     * @param UserDetail $userDetail
     * @param array $data
     *
     */
    private function assign(Subject $subject, $data)
    {
        if (isset($data['slug'])) {
            $subject->slug = $data['slug'];
        }

        if (isset($data['name'])) {
            $subject->name = $data['name'];
        }

        if (isset($data['description'])) {
            $subject->description = $data['description'];
        }

        if (isset($data['is_active'])) {
            $subject->is_active = $data['is_active'];
        }

        return $subject;

    }
}
