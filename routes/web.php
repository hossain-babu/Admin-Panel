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

Route::get('/', function () {
    return view('welcome');
});
// department part here=============
Route::get('add/dept','deptController@index')->name('add.dept');
Route::post('add/dept','deptController@store')->name('store.dept');
Route::get('dept/list','deptController@all')->name('all.dept');
Route::get('edit/department/{id}','deptController@edit');
Route::post('update/department/{id}','deptController@update');
Route::get('delete/department/{id}','deptController@delete');


// book part here===========
Route::get('add/book','bookController@add')->name('add.book');
Route::post('add/book','bookController@store')->name('store.book');
Route::get('all/books','bookController@all')->name('all.books');
Route::get('edit/books/{id}','bookController@edit');
Route::post('update/books/{id}','bookController@update');
Route::get('delete/books/{id}','bookController@delete');

// Student part here=============
Route::get('add/student','studentController@add')->name('student.add');
Route::post('add/student','studentController@store')->name('insert.student');
Route::get('all/student','studentController@all')->name('all.students');
Route::get('view/student/{id}','studentController@view');
Route::get('edit/student/{id}','studentController@edit');
Route::post('update/student/{id}','studentController@update');
Route::get('delete/student/{id}','studentController@delete');

// teacher part is here
Route::get('add/teacher','teacherController@add')->name('add.teacher');
Route::post('add/teacher','teacherController@store')->name('insert.teacher');
Route::get('all/teacher','teacherController@all')->name('all.teacher');
Route::get('view/teacher/{id}','teacherController@view');
Route::get('edit/teacher/{id}','teacherController@edit');
Route::get('delete/teacher/{id}','teacherController@delete');

// Course Part Is hereeee========

Route::get('add/course','courseController@add')->name('add.course');
Route::post('add/course','courseController@store')->name('store.course');
Route::get('course/list','courseController@all')->name('all.course');
Route::get('edit/course/{id}','courseController@edit');
Route::post('update/course/{id}','courseController@update');
Route::get('delete/course/{id}','courseController@delete');

