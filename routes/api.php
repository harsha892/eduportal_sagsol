<?php

use Illuminate\Http\Request;

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
Route::post('/user', 'UserController@doLogin');
Route::post('/createUser', 'userController@createUser');
// Route::post('/role/new','RoleController@CreateNewRole');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ["namespace" => "App\Http\Controllers"], function ($api) {
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
        // semister api
        $api->group(["prefix" => "semister"], function ($api) {
            $api->get('/all', 'SemisterController@getAllSemisters');
            $api->post('/new', 'SemisterController@createNewSemister');
            $api->put('/update', 'SemisterController@updateSemister');
            $api->post('/delete', 'SemisterController@DeleteSemister');
        });
    });
});
