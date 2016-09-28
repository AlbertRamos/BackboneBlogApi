<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    abort(404);
});

Route::get('token', function () {
    dd( Session::token() );
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('posts', 'PostsController@index');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/posts_list', 'PostsController@postList');
        Route::get('/posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
        Route::get('/posts/{id}/edit', ['as' => 'posts.edit', 'uses' => 'PostsController@edit']);

        Route::post('/posts/{id}/edit', ['as' => 'posts.update', 'uses' => 'PostsController@update']);
        Route::post('/posts', ['as' => 'posts.store', 'uses' => 'PostsController@store']);
        Route::delete('/posts/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);
    });

    Route::group(['prefix' => 'panel'], function () {
        Route::get('/', 'HomeController@index');
    });

});
