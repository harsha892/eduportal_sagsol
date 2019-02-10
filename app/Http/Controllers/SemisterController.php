<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SemisterRequest;
use App\Http\Requests\UpdateSemisterRequest;

use App\models\Semister;

class SemisterController extends Controller
{
    public function createNewSemister(SemisterRequest $request)
    {
        $semister = new Semister();
        $semister->name = $request->get("name");
        $semister->is_active = $request->get("is_active");

        $semister->created_by = $request->get("created_by");
        $semister->updated_by = $request->get("updated_by");

        $semister->start_date = $request->get("start_date");
        $semister->end_date = $request->get("end_date");

        $semister->save();

        return $semister;
    }
    public function updateSemister(UpdateSemisterRequest $request)
    {
        $semister = semister::find($request->get("id"));

        $semister->name = $request->get("name");
        $semister->is_active = $request->get("is_active");

        $semister->created_by = $request->get("created_by");
        $semister->updated_by = $request->get("updated_by");

        $semister->start_date = $request->get("start_date");
        $semister->end_date = $request->get("end_date");
        
        $semister->save();
        return $semister;

    }
    public function DeleteSemister(Request $request)
    {
        $semister = semister::find($request->get("id"));
        $semister->delete();
        return "semister Deleted Successful";
    }
    public function getAllSemisters()
    {
        $semister = semister::all();
        return $semister;
    }
}
