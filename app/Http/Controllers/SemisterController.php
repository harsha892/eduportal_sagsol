<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

use App\Models\Semester;

class SemesterController extends Controller
{
    public function createNewSemester(SemesterRequest $request)
    {
        $semester = new Semester();
        $semester->name = $request->get("name");
        $semester->is_active = $request->get("is_active");

        $semester->created_by = $request->get("created_by");
        $semester->updated_by = $request->get("updated_by");

        $semester->start_date = $request->get("start_date");
        $semester->end_date = $request->get("end_date");

        $semester->save();

        return $semester;
    }
    public function updateSemester(UpdateSemesterRequest $request)
    {
        $semester = semester::find($request->get("id"));

        $semester->name = $request->get("name");
        $semester->is_active = $request->get("is_active");

        $semester->created_by = $request->get("created_by");
        $semester->updated_by = $request->get("updated_by");

        $semester->start_date = $request->get("start_date");
        $semester->end_date = $request->get("end_date");
        
        $semester->save();
        return $semester;

    }
    public function DeleteSemester(Request $request)
    {
        $semester = semester::find($request->get("id"));
        $semester->delete();
        return "semester Deleted Successful";
    }
    public function getAllSemesters()
    {
        $semester = semester::all();
        return $semester;
    }
}
