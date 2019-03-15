<?php

use App\Http\Requests\MasterPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user', 'UserController@showUser');
Route::post('/createUser', 'userController@createUser');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ["namespace" => "App\Http\Controllers"], function ($api) {

    /**
     * Include User APIs
     */
    require ('partials/user.php');

    $api->group(['middleware' => 'jwt.auth'], function ($api) {

        $api->get('/master', function () {
            $difficultyLevels = DB::table('difficulty')->get();
            $privacy = DB::table('privacy')->get();
            $course_years = DB::table('course_years')->get();
            $course_semester = DB::table('course_semester')->get();
            $question_type = DB::table('question_type')->get();
            $content_types = DB::table('content_types')->get();
            $academic_years = DB::table('academic_years')->get();

            

            return response()->json([
                'difficulty_levels' => $difficultyLevels,
                'privacy' => $privacy,
                'academic_years' => $academic_years,
                'course_years' => $course_years,
                'course_semester' => $course_semester,
                'question_type' => $question_type,
                'content_types' => $content_types,
            ]);
        });

        $api->group(['prefix' => 'master'], function ($api) {

            $api->post("/{table}", function (MasterPostRequest $request, $table) {
                $dbSuccess = DB::table($table)->insert([
                    ['name' => $request->name],
                ]);
                return response()->json($dbSuccess);
            });

            $api->put("/{table}/{id}", function (MasterPostRequest $request, $table, $id) {
                $dbSuccess = DB::table($table)->where(['id' => $id])->update([
                    'name' => $request->name,
                ]);
                return response()->json($dbSuccess);
            });

        });

        $api->resource('role', 'RolesController');

        $api->group(['prefix' => 'user'], function ($api) {
            $api->get('/profile', 'UserController@profile');
        });
        $api->resource('user', 'UserController');

        $api->group(['prefix' => 'group'], function ($api) {
            $api->get('/{group_id}/subjects', 'GroupController@getSubjects');
            $api->post('/{group_id}/subjects', 'GroupController@addSubject');
            $api->post('/{group_id}/subjects/delete', 'GroupController@deleteSubject');
            $api->put('/{group_id}/subjects/{subject_id}', 'GroupController@updateSubject');
            $api->get('/{group_id}/subjects/{subject_id}', 'GroupController@getGroupSubjectDetails');

            $api->post('/subjects/{subject_id}/topics', 'GroupController@addTopicsToSubject');
        });

        $api->resource('group', 'GroupController');
        $api->resource('subject', 'SubjectController');

        $api->group(['prefix' => 'topic'], function ($api) {
            $api->get('/', 'TopicController@getAllTopics');
            $api->get('/{topic_id}', 'TopicController@getTopic');
            $api->get('/{topic_id}/content', 'TopicController@getTopicContent');
            $api->post('/{topic_id}/content', 'TopicController@addTopicContent');
            $api->put('/{topic_id}/content/{content_id}', 'TopicController@updateTopicContent');
        });

        $api->group(['prefix' => 'questions'], function ($api) {
            $api->get('/', 'QuestionController@getAllQuestions');
            $api->post('/', 'QuestionController@storeQuestion');
            $api->get('/{question_id}', 'QuestionController@getQuestion');
            $api->put('/{question_id}', 'QuestionController@updateQuestion');
            $api->get('/{question_id}/answers', 'QuestionController@getQuestionAnswers');
            $api->post('/{question_id}/answers', 'QuestionController@addQuestionAnswer');
            $api->put('/{question_id}/answers/{answer_id}', 'QuestionController@updateAnswer');
        });

        $api->resource('paper-models', 'QuestionPaperModelController');
        $api->group(['prefix' => 'paper-models'], function ($api) {
            $api->get('/{model_id}/sections', 'QuestionPaperModelController@getModelSections');
            $api->post('/{model_id}/sections', 'QuestionPaperModelController@addModelSections');
            $api->put('/{model_id}/sections/{section_id}', 'QuestionPaperModelController@updateModelSection');
        });

    });

//auth
    $api->group(["prefix" => "auth"], function ($api) {
        $api->post('/login', 'UserController@doLogin');
        $api->post('/verifyUser', 'UserController@verifyUser');

    });
    $api->group(['middleware' => 'jwt.auth'], function ($api) {
//roles api
        $api->group(["prefix" => "role"], function ($api) {
            $api->get('/all', 'UserRolesController@getAllRoles');
            $api->post('/new', 'UserRolesController@CreateNewRole');
            $api->put('/update', 'UserRolesController@updateRole');
            $api->post('/update/user', 'UserRolesController@updateUserRole');
            $api->post('/delete', 'UserRolesController@deleteRole');
        });
//users api
        $api->group(["prefix" => "user"], function ($api) {
            $api->post('/new', 'UserController@createNewUser');
            $api->post('/contactinfo', 'ContactController@UserContactInfo');

        });
// groups api
        $api->group(["prefix" => "group"], function ($api) {
            $api->get('/all', 'GroupController@getAllGroups');
            $api->post('/new', 'GroupController@CreateNewGroup');
            $api->put('/update', 'GroupController@updateGroup');
            $api->post('/delete', 'GroupController@deleteGroup');
        });
// subjects api
        $api->group(["prefix" => "subject"], function ($api) {
            $api->get('/all', 'SubjectController@getAllSubjects');
            $api->post('/new', 'SubjectController@createNewSubject');
            $api->put('/update', 'SubjectController@updateSubject');
            $api->post('/delete', 'SubjectController@DeleteSubject');
        });
        // topics api
        $api->group(["prefix" => "topic"], function ($api) {
            $api->get('/all', 'TopicController@getAllTopics');
            $api->post('/new', 'TopicController@createNewTopic');
            $api->put('/update', 'TopicController@updateTopic');
            $api->post('/delete', 'TopicController@DeleteTopic');
        });
        // semester api
        $api->group(["prefix" => "semester"], function ($api) {
            $api->get('/all', 'SemesterController@getAllSemesters');
            $api->post('/new', 'SemesterController@createNewSemester');
            $api->put('/update', 'SemesterController@updateSemester');
            $api->post('/delete', 'SemesterController@DeleteSemester');
        });
    });
});
