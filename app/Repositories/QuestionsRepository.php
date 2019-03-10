<?php
namespace App\Repositories;

use App\Models\Question;
use App\Models\QuestionAnswer;
use Cartalyst\Sentinel\Sentinel;

class QuestionsRepository
{
    private $question;

    public function __construct(
        Question $question,
        Sentinel $auth
    ) {
        $this->question = $question;
        $this->auth = $auth;
    }

    /**
     * Get the question
     *
     * @param integer $id
     *
     * @return User
     */
    public function get($id)
    {
        $question = $this->question->findOrFail($id);
        return $question;
    }

    public function getWithAnswer($id)
    {
        $question = $this->get($id);
        $question->answer;
        return $question;
    }

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'name';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        $users = $this->question
        // ->join('group_subjects', 'questions.subject_id', '=', 'group_subjects.id')
        //     ->join('subjects', 'group_subjects.subject_id', '=', 'subjects.id')
        //     ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
        //     ->select(
        //         'questions.id',
        //         'questions.title',
        //         'questions.short_description',
        //         'questions.is_active',
        //         'questions.subject_id',
        //         'subjects.name AS subject_name',
        //         'groups.name AS group_name',
        //         'groups.id AS group_id'
        //         // 'subjects.id AS subject_id'

        //         // 'user_details.first_name',
        //         // 'user_details.last_name',
        //         // 'user_details.phone',
        //         // 'role_users.role_id',
        //         // 'roles.name AS role'
        //     )
        //     ->where(function ($s_query) use ($search) {
        //         if (!empty($search)) {
        //             $s_query->where('questions.name', 'LIKE', "%$search%");
        //         }
        //     })
            // ->orderBy($sortBy, $sortType)
            ->paginate(15)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);

        return $users;

        return $this->question->where("name", "LIKE", "%$search%")
            ->orderBy($sortBy, $sortType)
            ->paginate(100)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);

    }

    public function create($data)
    {
        $question = $this->assign(new Question(), $data);
        $question->save();
        return $question;
    }

    /**
     * Assign question details
     *
     * @param UserDetail $questionDetail
     * @param array $data
     *
     */
    private function assign(Question $question, $data)
    {
        if (isset($data['title'])) {
            $question->title = $data['title'];
        }

        if (isset($data['topic_id'])) {
            $question->topic_id = $data['topic_id'];
        }

        if (isset($data['subject_id'])) {
            $question->subject_id = $data['subject_id'];
        }

        if (isset($data['difficulty_id'])) {
            $question->difficulty_id = $data['difficulty_id'];
        }

        if (isset($data['privacy_id'])) {
            $question->privacy_id = $data['privacy_id'];
        }

        if (isset($data['type'])) {
            $question->type = $data['type'];
        }

        if (isset($data['detail'])) {
            $question->detail = $data['detail'];
        }

        if (isset($data['audio'])) {
            $question->audio = $data['audio'];
        }

        if (isset($data['video'])) {
            $question->video = $data['video'];
        }

        return $question;
    }

    public function getAnswer($question_id)
    {
        $question = $this->getWithAnswer($question_id);
        return $question->answer;

    }

    public function addAnswer($question_id, array $data = [])
    {
        $question = $this->get($question_id);
        $answer = $this->assignQuestionAnswer(new QuestionAnswer(), $data);
        $answer->question_id = $question_id;
        $answer->save();
        return $answer;
    }

    public function updateAnswer($question_id, $answer_id, array $data = [])
    {
        $answer = QuestionAnswer::findOrFail($answer_id);
        $answer = $this->assignQuestionAnswer($answer, $data);
        $answer->save();
        return $answer;
    }

    private function assignQuestionAnswer(QuestionAnswer $answer, $data)
    {
        if (empty($answer)) {
            $answer = new QuestionAnswer();
        }

        if (isset($data['title'])) {
            $answer->title = $data['title'];
        }

        if (isset($data['video'])) {
            $answer->video = $data['video'];
        }

        if (isset($data['audio'])) {
            $answer->audio = $data['audio'];
        }

        if (isset($data['attachment'])) {
            $answer->attachment = $data['attachment'];
        }

        if (isset($data['correct'])) {
            $answer->correct = $data['correct'];
        }

        return $answer;

    }
}
