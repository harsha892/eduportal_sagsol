<?php

namespace App\Http\Controllers;

use App\Http\Requests\Questions\AddQuestionAnswerRequest;
use App\Http\Requests\Questions\GetQuestionRequest;
use App\Http\Requests\Questions\StoreQuestionRequest;
use App\Http\Requests\Questions\UpdateQuestionAnswerRequest;
use App\Repositories\QuestionsRepository;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $questionsRepository;

    public function __construct(
        QuestionsRepository $questionsRepository
    ) {
        $this->questionsRepository = $questionsRepository;
    }

    public function getAllQuestions(Request $request)
    {
        return response()->json(
            $this->questionsRepository->getAll($request->all())
        );
    }

    public function storeQuestion(StoreQuestionRequest $request)
    {
        return response()->json(
            $this->questionsRepository->create($request->all())
        );
    }

    public function getQuestion(GetQuestionRequest $request, $topic_id)
    {
        return response()->json(
            $this->questionsRepository->get($topic_id)
        );
    }

    public function updateQuestion(GetQuestionRequest $request, $question_id)
    {
        return response()->json(
            $this->questionsRepository->updateQuestion($question_id, $request->all())
        );
    }


    public function getQuestionAnswers(GetQuestionRequest $request, $topic_id)
    {
        return response()->json(
            $this->questionsRepository->getAnswer($topic_id)
        );
    }

    public function addQuestionAnswer(AddQuestionAnswerRequest $request, $topic_id)
    {
        return response()->json(
            $this->questionsRepository->addAnswer($topic_id, $request->get('answer'))
        );
    }

    public function updateQuestionAnswer(UpdateQuestionAnswerRequest $request, $topic_id, $answer_id)
    {
        return response()->json(
            $this->questionsRepository->updateAnswer($topic_id, $answer_id, $request->all())
        );
    }

}
