<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/**
 * --------------------------------------
 * Admin Routes 
 * --------------------------------------
 */

 Route::prefix('/portal')->group(function () {

    Route::get('/', function() {
        return view('benchteq.index');
    });
    Route::get('/{vue_capture?}', function () {
        return view('benchteq.index');
        })->where('vue_capture', '[\/\w\.-]*');
 });

