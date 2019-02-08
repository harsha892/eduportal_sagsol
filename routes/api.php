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
        $api->post('/login', 'UserController@doLogin');
        $api->post('/verifyUser', 'UserController@verifyUser');
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
});
