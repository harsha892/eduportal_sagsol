<?php
/*
 * API routes for authenticated Renters
 * Authenticated TOKEN is required and will be pass as query string
 */

$api->group(['prefix' => 'user', 'namespace' => 'Auth'], function ($api) {
    $api->post('signup', 'RegisterController@register');
});
