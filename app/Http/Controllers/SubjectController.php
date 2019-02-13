<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subjects\NewSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\GroupSubject;
use App\Models\Subject;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    private $subjectRepository;

    public function __construct(
        SubjectRepository $subjectRepository
    ) {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->subjectRepository->getAll($request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewSubjectRequest $request)
    {
        return response()->json($this->groupRepository->create($request->all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createNewSubject(NewSubjectRequest $request)
    {
        $subject = new Subject();
        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

        $subject->save();
        $groupSubject = new GroupSubject();
        $groupSubject->group_id = $subject->id;
        $groupSubject->subject_id = $subject->id;
        return $subject;
    }
    public function updateSubject(UpdateSubjectRequest $request)
    {
        $subject = Subject::find($request->get("id"));

        $subject->name = $request->get("name");
        $subject->is_active = $request->get("is_active");

        $subject->created_by = $request->get("created_by");
        $subject->updated_by = $request->get("updated_by");

        $subject->save();
        return $subject;

    }
    public function DeleteSubject(Request $request)
    {
        $subject = Subject::find($request->get("id"));
        $subject->delete();
        return "Subject Deleted Successful";
    }
    public function getAllSubjects()
    {
        $subject = Subject::all();
        return $subject;
    }
}
