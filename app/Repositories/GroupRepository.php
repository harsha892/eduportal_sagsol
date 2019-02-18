<?php
namespace App\Repositories;

use App\Models\Group;
use App\Models\GroupSubject;
use Cartalyst\Sentinel\Sentinel;

class GroupRepository
{
    private $group;

    public function __construct(
        Group $group,
        Sentinel $auth
    ) {
        $this->group = $group;
        $this->auth = $auth;
    }

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        return $this->group->where("name", "LIKE", "%$search%")
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
        $group = $this->assign(new Group(), $data);
        $group->save();
        return $group;
    }

    public function update($id, $data = [])
    {
        $group = $this->get($id);
        $data = collect($data)->only(['is_active']);
        $group = $this->assign($group, $data);
        $group->save();
        return $group;
    }

    public function delete($id)
    {
        GroupSubject::where('group_id', $id)->delete();
        $this->group->withTrashed()->find($id)->forceDelete();
        return true;
    }

    /**
     * Assign user details
     *
     * @param UserDetail $userDetail
     * @param array $data
     *
     */
    private function assign(Group $group, $data)
    {
        if (isset($data['slug'])) {
            $group->slug = $data['slug'];
        }

        if (isset($data['name'])) {
            $group->name = $data['name'];
        }

        if (isset($data['description'])) {
            $group->description = $data['description'];
        }

        if (isset($data['duration'])) {
            $group->duration = $data['duration'];
        }

        if (isset($data['semesters'])) {
            $group->semesters = $data['semesters'];
        }

        if (isset($data['is_active'])) {
            $group->is_active = $data['is_active'];
        }

        return $group;

    }

    /**
     * Get the group
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function get($id)
    {
        return $this->group->find($id);
    }

    public function getWithSubject($id)
    {
        return $this->group->with('subjects.subject')->find($id);
    }

    public function getAllSubjects($groupId)
    {
        return collect($this->get($groupId)->subjects)->map(function ($subject) {
            $subject->subject;
            return $subject;
        });
    }

    public function addSubjects($groupId, array $data = [])
    {
        foreach ($data['subjects'] as $subject) {
            $groupSubject = new GroupSubject();
            $groupSubject->group_id = $groupId;
            $groupSubject->subject_id = $subject['id'];
            $groupSubject->year = $subject['year'];
            $groupSubject->semester = $subject['semester'];
            $groupSubject->save();
        }

        return $this->getAllSubjects($groupId);

    }

    public function deleteSubjects($groupId, array $data = [])
    {
        GroupSubject::destroy($data);
        return true;

    }

    // addSubjects
}
