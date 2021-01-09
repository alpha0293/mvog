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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->name('admin')->middleware('verified');

Route::get('dutu','DutuController@index');
Route::get('dutu/create','DutuController@create')->name('create.dutu')->middleware('auth');
Route::get('/dutu/{id}','DutuController@show')->name('show.dutu')->middleware('auth');
Route::get('dutu/delete/{id}','DutuController@destroy')->name('delete.dutu');
Route::post('dutu/edit/{id}','DutuController@update')->name('update.dutu');
Route::post('dutu/info_edit','DutuController@update_ajax')->name('update_ajax.dutu');
Route::post('dutu/store','DutuController@store')->name('save.dutu');
//Route::get('dutu/edit/{id}','DutuController@edit')->name('getupdate.dutu');

//route for attdance
Route::get('attend','AttendanceController@index')->middleware('auth');
Route::get('/attend/create','AttendanceController@create')->name('create.attend')->middleware('auth');
Route::get('/attend/{id}','AttendanceController@show')->name('show.attend')->middleware('auth');
Route::get('attend/delete/{id}','AttendanceController@destroy')->name('delete.attend');
Route::post('attend/edit/{id}','AttendanceController@update')->name('update.attend');
Route::post('attend/store','AttendanceController@store')->name('save.attend');
Route::get('attend/edit/{id}','AttendanceController@edit')->name('getupdate.attend');


//Route for Post
Route::get('post','PostController@index')->middleware('auth');
Route::get('post/create','PostController@create')->name('create.post')->middleware('auth');
Route::get('post/{id}','PostController@show')->name('show.post');
Route::get('post/delete/{id}','PostController@destroy')->name('delete.post')->middleware('auth');
Route::post('post/edit/{id}','PostController@update')->name('update.post')->middleware('auth');
Route::post('post/store','PostController@store')->name('save.post')->middleware('auth');
Route::get('post/edit/{id}','PostController@edit')->name('getupdate.post')->middleware('auth');

//Route for Category
Route::get('category','CategoryController@index');
Route::get('category/create','CategoryController@create')->name('create.category')->middleware('auth');
Route::get('category/{id}','CategoryController@show')->name('show.category');
Route::get('category/delete/{id}','CategoryController@destroy')->name('delete.category')->middleware('auth');
Route::post('category/edit/{id}','CategoryController@update')->name('update.category')->middleware('auth');
Route::post('category/store','CategoryController@store')->name('save.category')->middleware('auth');
Route::get('category/edit/{id}','CategoryController@edit')->name('getupdate.category')->middleware('auth');



//Route for Dong Tu
Route::get('dongtu','DongtuController@index');
Route::get('dongtu/create','DongtuController@create')->name('create.dongtu')->middleware('auth');
Route::get('dongtu/{id}','DongtuController@show')->name('show.dongtu');
Route::get('dongtu/delete/{id}','DongtuController@destroy')->name('delete.dongtu')->middleware('auth');
Route::post('dongtu/edit/{id}','DongtuController@update')->name('update.dongtu')->middleware('auth');
Route::post('dongtu/store','DongtuController@store')->name('save.dongtu')->middleware('auth');
Route::get('dongtu/edit/{id}','DongtuController@edit')->name('getupdate.dongtu')->middleware('auth');


//Route for Paper
Route::get('paper','PaperController@index');
Route::get('paper/create','PaperController@create')->name('create.paper')->middleware('auth');
Route::get('paper/{id}','PaperController@show')->name('show.paper');
Route::get('paper/delete/{id}','PaperController@destroy')->name('delete.paper')->middleware('auth');
Route::post('paper/edit/{id}','PaperController@update')->name('update.paper')->middleware('auth');
Route::post('paper/store','PaperController@store')->name('save.paper')->middleware('auth');
Route::get('paper/edit/{id}','PaperController@edit')->name('getupdate.paper')->middleware('auth');

//Route for DiemThi
Route::get('diemthi','DiemthiController@index');
Route::get('diemthi/create','DiemthiController@create')->name('create.diemthi')->middleware('auth');
Route::get('diemthi/{id}','DiemthiController@show')->name('show.diemthi');
Route::get('diemthi/delete/{id}','DiemthiController@destroy')->name('delete.diemthi')->middleware('auth');
Route::post('diemthi/edit/{id}','DiemthiController@update')->name('update.diemthi')->middleware('auth');
Route::post('diemthi/store','DiemthiController@store')->name('save.diemthi')->middleware('auth');
Route::get('diemthi/edit/{id}','DiemthiController@edit')->name('getupdate.diemthi')->middleware('auth');

//Route for Zone
Route::get('zone','ZoneController@index');
Route::get('zone/create','ZoneController@create')->name('create.zone')->middleware('auth');
Route::get('zone/{id}','ZoneController@show')->name('show.zone');
Route::get('zone/delete/{id}','ZoneController@destroy')->name('delete.zone')->middleware('auth');
Route::post('zone/edit/{id}','ZoneController@update')->name('update.zone')->middleware('auth');
Route::post('zone/store','ZoneController@store')->name('save.zone')->middleware('auth');
Route::get('zone/edit/{id}','ZoneController@edit')->name('getupdate.zone')->middleware('auth');

//Route for Notifications
Route::get('notifi','NotificationsController@index');
Route::get('notifi/create','NotificationsController@create')->name('create.notifi')->middleware('auth');
Route::get('notifi/{id}','NotificationsController@show')->name('show.notifi');
Route::get('notifi/delete/{id}','NotificationsController@destroy')->name('delete.notifi')->middleware('auth');
Route::post('notifi/edit/{id}','NotificationsController@update')->name('update.notifi')->middleware('auth');
Route::post('notifi/store','NotificationsController@store')->name('save.notifi')->middleware('auth');
Route::get('notifi/edit/{id}','NotificationsController@edit')->name('getupdate.notifi')->middleware('auth');

Route::get('lenlop','AdminController@lstlenlop')->middleware('auth');
Route::get('xetduyet','AdminController@lstxetduyet')->middleware('auth');
Route::get('nhomtruong','AdminController@lstnhomtruong')->middleware('auth');
Route::get('export/', 'AdminController@export')->name('export');
Route::get('export/view', 'AdminController@exportview');
Route::get('canhbao','AdminController@canhbao')->name('canhbao')->middleware('auth');
//route CKFINDER
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('gety','AdminController@gety')->name('gety');
Route::post('offpost','PostController@offpost')->name('offpost')->middleware('auth');