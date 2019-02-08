<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectReuqest;
use App\Http\Requests\UpdateSubjectRequest;
use App\models\User;
use App\models\Subject;

class SubjectController extends Controller
{
    public function createNewSubject(SubjectReuqest $request){
        $subject = new Subject();
        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

        $subject->short_description = $request->get("short_description");
        $subject->related_group_ids = $request->get("related_group_ids");

        $subject->save();
        return $subject;
    }
    public function updateSubject(UpdateSubjectRequest $request){
        $subject = Subject::find($request->get("id"));

        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

        $subject->short_description = $request->get("short_description");
        $subject->related_group_ids = $request->get("related_group_ids");

        $subject->save();
        return $subject;
        
    }
    public function DeleteSubject(Request $request){
        $subject = Subject::find($request->get("id"));
        $subject->delete();
        return "Subject Deleted Successful";
    }
    public function getAllSubjects(){
        $subject = Subject::all();
        return $subject;
    }
}
