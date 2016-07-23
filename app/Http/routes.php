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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [
	'uses' => 'DoctorController@getHome',
	'as' => 'home'
]);

Route::post('/signup', [
	'uses' => 'UserController@signUp',
	'as' => 'signup'
]);

Route::post('/signin', [
	'uses' => 'UserController@signIn',
	'as' => 'signin'
]);

Route::get('/dashboard', [
	'uses' => 'UserController@getDashboard',
	'as' => 'dashboard',
	'middleware' => 'auth'
]);

Route::get('/logout', [
	'uses' => 'UserController@logOut',
	'as' => 'logout'
]);

Route::get('/doctors', [
	'uses' => 'UserController@getDoctors',
	'as' => 'doctors'
]);

Route::get('/search', [
	'uses' => 'DoctorController@searchDoctors',
	'as' => 'doctor.search'
]);

Route::get('/account', [
	'uses' => 'UserController@myAccount',
	'as' => 'account'
]);

Route::get('/doctor/{id?}', [
	'uses' => 'DoctorController@manageDoctor',
	'as' => 'doctor.manage',
	'middleware' => 'auth'
]);

Route::get('/doc/{id}', [
	'uses' => 'DoctorController@getDoctor',
	'as' => 'doctor.view'
]);

Route::get('/{filename}', [
	'uses' => 'DoctorController@getDoctorImage',
	'as' => 'doctor.image'
]);

Route::post('/savedoctor', [
	'uses' => 'DoctorController@saveDoctor',
	'as' => 'doctor.save'
]);
Route::post('/accountupdate', [
	'uses' => 'UserController@updateAccount',
	'as' => 'account.update'
]);