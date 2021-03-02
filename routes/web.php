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

// Route::get('/', function () {
//     return view('admin.master');
// });
Route::get('/course','CourseController@index')->name('course');
Route::get('/up_lesson','CourseController@lesson')->name('lesson');
Route::get('/list_lesson/{courseId}','CourseController@listLesson')->name('Llesson');
Route::post('/add_course','CourseController@import')->name('add_course');
Route::post('/add_lesson','CourseController@importLesson')->name('add_lesson');
Route::get('/edit-course/{courseId}','CourseController@getEdit')->name('edit_course');
Route::post('/edit-course','CourseController@postEdit')->name('edit_save');
Route::get('quay-so', 'ActivityController@index');
Route::post('add-to-cart','UserController@addCart');
Route::post('spnit', 'ActivityController@spnit');
Route::post('spnit-result','ActivityController@spnitResult');
Route::get('/dang-nhap', 'UserController@login');
Route::post('/dang-nhap','UserController@PostLogin')->name('login');

Route::get('/dang-ky','UserController@signup');
Route::post('/dang-ky','UserController@PostSignup')->name('signup');
Route::get('/dang-xuat','UserController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'userController@index')->name('home');

Route::get('/','userController@index');
Route::get('/detail/{courseId}','userController@courseDetail');