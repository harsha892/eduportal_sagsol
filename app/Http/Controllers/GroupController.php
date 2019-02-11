<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\GroupSubject;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function CreateNewGroup(GroupRequest $request)
    {
        $group = new Group();

        $group->name = $request->get("name");
        $group->is_active = $request->get("is_active");

        $group->created_by = $request->get("created_by");
        $group->updated_by = $request->get("updated_by");

        $group->short_description = $request->get("short_description");
        //$group->save();
        if ( !empty( $request->get("subject_ids") ) ) {
            $collection = collect($request->get("subject_ids"));
            $groupSubjectsMaping = $collection->map(function ($item)  use ($group) {
                $groupSubject = new GroupSubject();
                $groupSubject->group_id = $group->id;
                $groupSubject->subject_id = $item;
                // $groupSubject-->save();
                return $groupSubject;
            });
        }
        return Group::with(['subjects'])->find( $subject->id );

    }
    public function updateGroup(UpdateGroupRequest $request)
    {
        $group = Group::find($request->get("id"));

        $group->name = $request->get("name");
        $group->is_active = $request->get("is_active");

        $group->created_by = $request->get("created_by");
        $group->updated_by = $request->get("updated_by");

        $group->short_description = $request->get("short_description");

        $group->save();
        return $group;
    }
    public function getAllGroups()
    {
        $group = Group::all();
        return $group;
    }
    public function deleteGroup(Request $request)
    {
        $group = Group::find($request->get("id"));
        $group->delete();
        return "Group Deleted Successful";
    }
}
