<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@home')->name('homepage');
Route::get('/home', 'HomeController@redirect')->name('auth')->middleware('auth');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	Route::prefix('student')->group(function () {
		Route::get('setup/stage/{page?}', 'Student\SetupController@setupSteps')->name('student-setup')->middleware('student');
		Route::get('home', 'ProfileController@home')->name('home');
		Route::get('lectures/{course}', 'Student\LectureController@index')->name('lectures');
		//USER PROFILE
		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
		//ACADEMIC PROFILE 
		
		Route::post('faculty', ['as' => 'faculty.fetch', 'uses' => 'AjaxController@fetchFaculty']);
		Route::post('program', ['as' => 'program.fetch', 'uses' => 'AjaxController@fetchProgram']);
		Route::put('courses', ['as' => 'academic-profile.courses', 'uses' => 'ProfileController@courses']);
		Route::post('course/delete', ['as' => 'delete-student.course', 'uses' => 'ProfileController@deleteCourse']);
		Route::post('courses/{semester}', ['as' => 'courses.fetch', 'uses' => 'AjaxController@fetchCourses']);
		Route::post('institution', ['as' => 'institution.fetch', 'uses' => 'InstitutionController@fetch']);
		Route::get('academic-profile', ['as' => 'academic-profile.edit', 'uses' => 'ProfileController@editAcademic']);
		Route::put('academic-profile', ['as' => 'academic-profile.update', 'uses' => 'ProfileController@updateAcademic']);
		//SECURITY
	});

	Route::prefix('admin')->group(function(){
		Route::get('',['uses'=>'Admin\HomeController@index','as'=>'admin']);
	});
	
	Route::resource('user', 'UserController', ['except' => ['show']]);
	
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
	Route::get('student/index', ['as' => 'student', 'uses' => 'StudentController@index']);
});

