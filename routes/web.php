<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {


    $api->group(['prefix' => 'users', 'namespace' => 'Modules\Blog\Controllers', 'prefix' => 'v1'], function() use ($api) {
        $api->get('/users', ['uses' => 'UsersController@getUsers',]);
        $api->get('/users/{id}/posts', ['uses' => 'UsersController@getUserPosts',]);
        $api->get('/users/{id}/posts/{postId}', ['uses' => 'UsersController@getUserPost',]);
        $api->get('/users/{id}/comments', ['uses' => 'UsersController@getUserComments',]);
        $api->get('/users/{id}/comments/{commentId}', ['uses' => 'UsersController@getUserComment',]);
        $api->get('/users/{id}', ['uses' => 'UsersController@getUser',]);
        $api->post('/users/', ['uses' => 'UsersController@createUser',]);
        $api->delete('/users/{id}', ['uses' => 'UsersController@deleteUser',]);
        $api->put('/users/{id}', ['uses' => 'UsersController@updateUser',]);
    });
    $api->group(['prefix' => 'posts', 'namespace' => 'Modules\Blog\Controllers'], function() use ($api) {
        $api->get('/', ['uses' => 'PostsController@getPosts',]);
        $api->get('{id}', ['uses' => 'PostsController@getPost',]);
        $api->post('/', ['uses' => 'PostsController@createPost',]);
        $api->delete('{id}', ['uses' => 'PostsController@deletePost',]);
        $api->put('{id}', ['uses' => 'PostsController@updatePost',]);
    });
    $api->group(['prefix' => 'comments', 'namespace' => 'Modules\Blog\Controllers'], function() use ($api) {
        $api->get('/', ['uses' => 'CommentsController@getComments',]);
        $api->get('{id}', ['uses' => 'CommentsController@getComment',]);
        $api->post('/', ['uses' => 'CommentsController@createComment',]);
        $api->delete('{id}', ['uses' => 'CommentsController@deleteComment',]);
        $api->put('{id}', ['uses' => 'CommentsController@updateComment',]);
    });
});




