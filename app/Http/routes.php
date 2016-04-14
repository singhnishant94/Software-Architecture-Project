<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/post-job',array('as'=>'job.add','uses'=>'JobController@jobAddView'));
Route::post('/post-job',array('as'=>'job.add','uses'=>'JobController@jobAdd'));
Route::get('/job/{id}',array('as'=>'job','uses'=>'JobController@jobView'));
Route::post('/job/{id}/apply',array('as'=>'job','uses'=>'JobController@jobApply'));


