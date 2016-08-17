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
	return redirect('app/');
});


Route::group(['prefix' => 'app', 'middleware' => 'auth'], function ()
{

	Route::get('/','IndexController@index');
	Route::resource('teams','TeamController');
	Route::resource('projects','ProjectController');
	Route::resource('users','UserController');
	Route::resource('lists', 'ListDailyController');

	Route::get('team-members/{id}','TeamController@members');
	Route::get('team-projects/{id}','TeamController@projects');
	Route::get('team/{id}/projects','ProjectController@all');
	Route::get('team/{id}/users','UserController@all');
	Route::get('team-project/{idProject}/{idTeam}','TeamController@addProject');
	Route::get('team-member/{idUser}/{idTeam}','TeamController@addMember');
	Route::get('member-teams/{idUser}','UserController@teams');
	Route::get('project-teams/{idProject}','ProjectController@teams');


});