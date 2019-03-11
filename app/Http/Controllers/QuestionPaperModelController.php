<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionPaperModel\AddModelSectionsRequest;
use App\Http\Requests\QuestionPaperModel\StoreQuestionPaperModelRequest;
use App\Repositories\QuestionPaperModelRepository;
use Illuminate\Http\Request;

class QuestionPaperModelController extends Controller
{

    private $repository;

    public function __construct(
        QuestionPaperModelRepository $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->repository->getAll($request->all())
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreQuestionPaperModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionPaperModelRequest $request)
    {
        return response()->json(
            $this->repository->create($request->all())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
            $this->repository->getWithSections($id)
        );
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
        return response()->json(
            $this->repository->update($id, $request->all())
        );
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

    public function getModelSections(GetQuestionRequest $request, $model_id)
    {
        return response()->json(
            $this->repository->getSections($model_id)
        );
    }

    public function addModelSections(AddModelSectionsRequest $request, $model_id)
    {
        return response()->json(
            $this->repository->addSections($model_id, $request->get('sections'))
        );
    }

    public function updateModelSection(UpdateQuestionAnswerRequest $request, $model_id, $section_id)
    {
        return response()->json(
            $this->repository->updateSection($model_id, $section_id, $request->all())
        );
    }
}
