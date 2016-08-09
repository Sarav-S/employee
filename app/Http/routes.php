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

Route::get('employees', ['as' => 'employees-listing', 'uses' => 'EmployeeController@index']);
Route::get('employees/create', ['as' => 'employees-create', 'uses' => 'EmployeeController@create']);
Route::post('employees', ['as' => 'employees-post', 'uses' => 'EmployeeController@store']);
Route::get('employees/{id}/edit', ['as' => 'employees-edit', 'uses' => 'EmployeeController@edit']);
Route::put('employees/{id}', ['as' => 'employees-update', 'uses' => 'EmployeeController@update']);
Route::delete('employees/{id}', ['as' => 'employees-delete', 'uses' => 'EmployeeController@destroy']);

Route::resource('employers', 'EmployerController');

Route::auth();

Route::get('/home', 'HomeController@index');
