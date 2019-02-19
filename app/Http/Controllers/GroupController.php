<?php

namespace App\Http\Controllers;

use App\Http\Requests\Groups\AddSubjectsRequest;
use App\Http\Requests\Groups\AddTopicsToSubjectRequest;
use App\Http\Requests\Groups\DeleteSubjectsRequest;
use App\Http\Requests\Groups\GetAllSubjectsRequest;
use App\Http\Requests\Groups\GetGroupSubjectRequest;
use App\Http\Requests\Groups\GroupCheckRequest;
use App\Http\Requests\Groups\NewGroupRequest;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    private $groupRepository;

    public function __construct(
        GroupRepository $groupRepository
    ) {
        $this->groupRepository = $groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($this->groupRepository->getAll($request->all()));
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
    public function store(NewGroupRequest $request)
    {
        return response()->json($this->groupRepository->create($request->all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GroupCheckRequest $request, $id)
    {
        return response()->json($this->groupRepository->getWithSubject($id));

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
    public function update(GroupCheckRequest $request, $id)
    {
        return response()->json($this->groupRepository->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupCheckRequest $request, $id)
    {
        return response()->json($this->groupRepository->delete($id));

    }

    public function getSubjects(GetAllSubjectsRequest $request, $group_id)
    {
        return response()->json(
            $this->groupRepository->getAllSubjects($group_id)
        );
    }

    public function getGroupSubjectDetails(GetGroupSubjectRequest $request, $group_id, $subject_id)
    {
        return response()->json(
            $this->groupRepository->getGroupSubjectDetails($group_id, $subject_id)
        );

    }

    public function addSubject(AddSubjectsRequest $request, $group_id)
    {
        return response()->json(
            $this->groupRepository->addSubjects($group_id, $request->all())
        );

    }

    /**
     *
     */
    public function deleteSubject(DeleteSubjectsRequest $request, $group_id)
    {
        return response()->json(
            $this->groupRepository->deleteSubjects($group_id, $request->all())
        );

    }

    public function updateSubject($group_id, $subject_id)
    {

    }

    public function addTopicsToSubject(AddTopicsToSubjectRequest $request, $subject_id)
    {
        return response()->json(
            $this->groupRepository->addTopicsToSubject($subject_id, $request->all())
        );

    }

}
