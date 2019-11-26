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
// Route::post('/userlogin', 'Auth\APIController@login')->name('userlogin');
Route::get('/details/{unit_code}', 'TimetableController@details')->name('details');
Route::get('/retakes/reports', 'ChartController@index')->name('retakesReports');
Route::get('/repeat/reports', 'ChartController@repeat')->name('repeatsReports');
Route::get('/re', 'HomeController@Ret')->name('Ret');
Route::get('/retake', 'StudentResultsController@Retakes')->name('Retakes');
Route::get('/repeats', 'StudentResultsController@Repeat')->name('Repeat');
Route::get('/special', 'StudentResultsController@Specials')->name('Specials');
Route::get('/reports', 'StudentResultsController@Reports')->name('Reports');
Route::get('/failed', 'StudentResultsController@FailedUnits')->name('FailedUnits');
Route::post('/extract', 'TimetableController@extract')->name('extract');
Route::post('/extractexam', 'ExamController@extract')->name('extractexam');
Route::get('dean', 'ApplicationController@Dean')->name('dean');

Route::get('count/application', 'ApplicationController@countApplication')->name('countApplication');

Route::get('student', 'ApplicationController@studentapplication');
Route::get('files/{file}', 'ApplicationController@download')->name('download');

Route::group(['middleware' => 'App\Http\Middleware\StudentMiddleware'], function()
{
	Route::match(['get', 'post'], '/memberOnlyPage/', 'HomeController@member');

});


Route::get('/', function () {
	return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');





Route::group(['middleware' => 'auth'], function () {

});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/repeat', 'HomeController@repeat')->name('repeat');
	Route::get('/retakes', 'HomeController@retakes')->name('retakes');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('application', 'ApplicationController', ['except' => ['show']]);
	Route::resource('timetable', 'TimetableController', ['except' => ['show']]);
	Route::resource('review', 'ReviewController', ['except' => ['show']]);
	Route::resource('exams', 'ExamController', ['except' => ['show']]);
	// Route::get('application', ['as' => 'application.edit', 'uses' => 'ApplicationController@edit']);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

