<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubjectReuqest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Requests\GroupSubjectsRequest;
use App\Models\User;
use App\Models\Subject;
use App\Models\GroupSubject;

class SubjectController extends Controller
{
    public function createNewSubject(SubjectReuqest $request){
        $subject = new Subject();
        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

        $subject->save();
        $groupSubject =new GroupSubject();
        $groupSubject->group_id = $subject->id;
        $groupSubject->subject_id = $subject->id;
        return $subject;
    }
    public function updateSubject(UpdateSubjectRequest $request){
        $subject = Subject::find($request->get("id"));

        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

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
