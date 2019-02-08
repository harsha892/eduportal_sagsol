<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Group;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    public function CreateNewGroup(GroupRequest $request){
        $group = new Group();

        $group->name = $request->get("name");
        $group->is_active = $request->get("is_active");

        $group->created_by = $request->get("created_by");
        $group->updated_by = $request->get("updated_by");

        $group->short_description = $request->get("short_description");
        $group->related_subject_ids = $request->get("related_subject_ids");

        $group->save();
        return $group;
    }
    public function updateGroup(UpdateGroupRequest $request){
        $group = Group::find($request->get("id"));

        $group->name = $request->get("name");
        $group->is_active = $request->get("is_active");

        $group->created_by = $request->get("created_by");
        $group->updated_by = $request->get("updated_by");

        $group->short_description = $request->get("short_description");
        $group->related_subject_ids = $request->get("related_subject_ids");

        $group->save();
        return $group;
    }
    public function getAllGroups(){
        $group = Group::all();
        return $group;
    }
    public function deleteGroup(Request $request){
        $group = Group::find($request->get("id"));
        $group->delete();
        return "Group Deleted Successful";
    }
}
