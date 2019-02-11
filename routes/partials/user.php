<?php
/*
 * API routes for authenticated Renters
 * Authenticated TOKEN is required and will be pass as query string
 */

$api->group(['prefix' => 'user', 'namespace' => 'Auth'], function ($api) {
    $api->post('register', 'RegisterController@register');
    $api->post('activate', 'RegisterController@activate');
    $api->post('login', 'LoginController@login');
});
