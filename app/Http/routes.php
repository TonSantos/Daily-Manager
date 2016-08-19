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



Route::group(['prefix' => '/', 'middleware' => 'auth'], function ()
{

	Route::get('/','IndexController@index');

	Route::resource('teams','TeamController');
	Route::resource('projects','ProjectController');
	Route::resource('users','UserController');
	Route::resource('lists', 'ListDailyController');

	Route::get('users/{id}/teams', 'UserController@teams');
	Route::get('users/{id}/projects','UserController@projects');


	Route::get('team-members/{id}','TeamController@members');/*load members one team*/
	Route::get('team-projects/{id}','TeamController@projects');/*load project one team*/
	Route::get('project/{id}/teams','TeamController@all');/*list all teams from add project*/
	Route::get('team/{id}/projects','ProjectController@all');/*list all projects from add team*/
	Route::get('team/{id}/users','UserController@all');/*list all users from add team*/
	Route::get('team-project/{idProject}/{idTeam}','TeamController@addRemoveProject');/*insert or delete relationship team-project*/
	Route::get('team-member/{idUser}/{idTeam}','TeamController@addRemoveMember');/*insert or delete relationship team-member*/
	Route::get('member-teams/{idUser}','UserController@teamsJson');/*list all teams of member*/
	Route::get('project-teams/{idProject}','ProjectController@teamsJson');/*list all teams of project*/


});