<?php
namespace App\Repositories;

use App\Models\QuestionPaperModel;
use App\Models\QuestionPaperSection;
use Cartalyst\Sentinel\Sentinel;

class QuestionPaperModelRepository
{
    private $questionPaperModel;

    public function __construct(
        QuestionPaperModel $questionPaperModel,
        Sentinel $auth
    ) {
        $this->questionPaperModel = $questionPaperModel;
        $this->auth = $auth;
    }

    /**
     * Get the questionPaperModel
     *
     * @param integer $id
     *
     * @return User
     */
    public function get($id)
    {
        $questionPaperModel = $this->questionPaperModel
        // ->join('group_subjects', 'questionPaperModels.subject_id', '=', 'group_subjects.id')
        // ->join('subjects', 'group_subjects.subject_id', '=', 'subjects.id')
        // ->join('topics', 'topics.id', '=', 'questionPaperModels.topic_id')
        // ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
        // ->select(
        //     'questionPaperModels.*',
        //     'group_subjects.year',
        //     'group_subjects.semester',
        //     'groups.name as group_name',
        //     'topics.name as topic_name',
        //     'subjects.name as subject_name'
        // )
        ->findOrFail($id);
        return $questionPaperModel;
    }

    public function getWithSections($id)
    {
        $questionPaperModel = $this->get($id);
        $questionPaperModel->sections;
        return $questionPaperModel;
    }

    public function getAll(array $data)
    {
        $search = isset($data['search']) ? $data['search'] : '';

        $sortBy = isset($data['sort_by']) ? $data['sort_by'] : 'title';
        $sortType = isset($data['sort_type']) ? $data['sort_type'] : 'ASC';

        $users = $this->questionPaperModel
            // ->join('group_subjects', 'questionPaperModels.subject_id', '=', 'group_subjects.id')
            // ->join('subjects', 'group_subjects.subject_id', '=', 'subjects.id')
            // ->join('topics', 'topics.id', '=', 'questionPaperModels.topic_id')
            // ->join('groups', 'groups.id', '=', 'group_subjects.group_id')
            // ->select(
            //     'questionPaperModels.*',
            //     'group_subjects.year',
            //     'group_subjects.semester',
            //     'groups.name as group_name',
            //     'topics.name as topic_name',
            //     'subjects.name as subject_name'
            // )
            // ->where(function ($s_query) use ($search) {
            //     if (!empty($search)) {
            //         $s_query->where('questionPaperModels.title', 'LIKE', "%$search%");
            //     }
            // })
            // ->orderBy($sortBy, $sortType)
            ->paginate(15)
            ->appends([
                'search' => $search,
                'sort_by' => $sortBy,
                'sort_type' => $sortType,
            ]);

        return $users;

        return $this->questionPaperModel->where("name", "LIKE", "%$search%")
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
        $questionPaperModel = $this->assign(new QuestionPaperModel(), $data);
        $questionPaperModel->save();
        return $questionPaperModel;
    }

    public function update($questionPaperModel_id, array $data = [])
    {
        $questionPaperModel = QuestionPaperModel::findOrFail($questionPaperModel_id);
        $questionPaperModel = $this->assign($questionPaperModel, $data);
        $questionPaperModel->save();
        return $this->get( $questionPaperModel_id );
    }

    /**
     * Assign questionPaperModel details
     *
     * @param UserDetail $questionPaperModelDetail
     * @param array $data
     *
     */
    private function assign(QuestionPaperModel $questionPaperModel, $data)
    {
        if (isset($data['name'])) {
            $questionPaperModel->name = $data['name'];
        }

        if (isset($data['group_id'])) {
            $questionPaperModel->group_id = $data['group_id'];
        }

        if (isset($data['subject_id'])) {
            $questionPaperModel->subject_id = $data['subject_id'];
        }

        if (isset($data['marks'])) {
            $questionPaperModel->marks = $data['marks'];
        }

        if (isset($data['time'])) {
            $questionPaperModel->time = $data['time'];
        }

        if (isset($data['no_of_sections'])) {
            $questionPaperModel->no_of_sections = $data['no_of_sections'];
        }

        if (isset($data['name_type'])) {
            $questionPaperModel->name_type = $data['name_type'];
        }

        if (isset($data['section_type'])) {
            $questionPaperModel->section_type = $data['section_type'];
        }

        return $questionPaperModel;
    }

    public function getSections($questionPaperModel_id)
    {
        $questionPaperModel = $this->getWithSections($questionPaperModel_id);
        return $questionPaperModel->sections;

    }

    public function addSections($questionPaperModel_id, array $data = [])
    {
        $questionPaperModel = $this->get($questionPaperModel_id);
        $sections = [];
        foreach( $data as $section ) {
            $newSection = $this->assignSection(new QuestionPaperSection(), $section);
            $newSection->model_id = $questionPaperModel_id;
            $newSection->save();
            $sections[] = $newSection;
        }
        
        return $sections;
    }

    public function updateSection($model_id, $section_id, array $data = [])
    {
        $section = QuestionPaperSection::findOrFail($section_id);
        $section = $this->assignSection($section, $data);
        $section->save();
        return $answer;
    }

    private function assignSection(QuestionPaperSection $section, $data)
    {
        if (empty($section)) {
            $section = new QuestionAnswer();
        }

        if (isset($data['questions'])) {
            $section->questions = $data['questions'];
        }

        if (isset($data['options'])) {
            $section->options = $data['options'];
        }

        if (isset($data['marks'])) {
            $section->marks = $data['marks'];
        }

        if (isset($data['question_type'])) {
            $section->question_type = $data['question_type'];
        }

        return $section;

    }
}
