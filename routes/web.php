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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/admission', 'admissionController');
Route::get('/admission/{id}/delete', 'admissionController@destroy');
Route::resource('/teacher', 'TeacherController');
Route::resource('/management', 'ManagementController');

Route::post('/confirmation/sendMail/{id}','sendMailController@send');
Route::post('/confirmation/sendMail/','sendMailController@send');
Route::get('/storeDataToStudentTable','sendMailController@store');

Route::resource('/student','studentController');
Route::resource('/resultGenerate','GenerateResultController');


Route::get('/myform', array('as' => 'myform', 'uses' => 'GenerateResultController@testView'));
Route::get('/myform/ajex/{id}', array('as' => 'myform.ajex', 'uses' => 'GenerateResultController@ajexController'));
