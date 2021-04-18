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
// Route::get('/admin','AdminController@index')->name('admin')->middleware('verified');

Route::get('dutu','DutuController@index');
Route::get('dutu/create','DutuController@create')->name('create.dutu')->middleware('auth');
Route::get('/dutu/{id}','DutuController@show')->name('show.dutu')->middleware('auth');
Route::get('dutu/delete/{id}','DutuController@destroy')->name('delete.dutu');
Route::post('dutu/edit/{id}','DutuController@update')->name('update.dutu');
Route::post('dutu/info_edit','DutuController@update_ajax')->name('update_ajax.dutu');
Route::post('dutu/store','DutuController@store')->name('save.dutu');
//Route::get('dutu/edit/{id}','DutuController@edit')->name('getupdate.dutu');

//route for attdance
Route::get('attend','AttendanceController@index')->name('diemdanh')->middleware('auth');
Route::get('/attend/create','AttendanceController@create')->name('create.attend')->middleware('auth');
Route::get('/attend/{month}/{year}','AttendanceController@show')->name('show.attend')->middleware('auth');
Route::get('attend/delete/{id}','AttendanceController@destroy')->name('delete.attend');
Route::post('attend/edit/{id}','AttendanceController@update')->name('update.attend');
Route::post('attend/store','AttendanceController@store')->name('save.attend');
Route::get('attend/edit/{id}','AttendanceController@edit')->name('getupdate.attend');


//Route for Post
Route::get('post','PostController@index')->name('post')->middleware('auth');
Route::get('post/create','PostController@create')->name('create.post')->middleware('auth');
Route::get('post/{id}','PostController@show')->name('show.post');
Route::get('post/delete/{id}','PostController@destroy')->name('delete.post')->middleware('auth');
Route::post('post/edit/{id}','PostController@update')->name('update.post')->middleware('auth');
Route::post('post/store','PostController@store')->name('save.post')->middleware('auth');
Route::get('post/edit/{id}','PostController@edit')->name('getupdate.post')->middleware('auth');

//Route for Category
Route::get('category','CategoryController@index')->name('category');
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
Route::get('diemthi','DiemthiController@index')->name('diemthi')->middleware('auth');
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
Route::get('xetduyet','AdminController@lstxetduyet')->name('xetduyet')->middleware('auth');
Route::get('nhomtruong','AdminController@lstnhomtruong')->name('nhomtruong')->middleware('auth');
Route::get('export/', 'AdminController@export')->name('export');
Route::get('export/view', 'AdminController@exportview');
Route::get('canhbao','AdminController@canhbao')->name('canhbao')->middleware('auth');
Route::get('import','AdminController@import')->name('import')->middleware('auth');
Route::post('import/user', 'AdminController@submitimport');
//route CKFINDER
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('gety','AdminController@gety')->name('gety');
Route::post('offpost','PostController@offpost')->name('offpost')->middleware('auth');
Route::post('offcat','CategoryController@offcat')->name('offcat')->middleware('auth');
Route::post('ontruongnhom','AdminController@nhomtruong')->name('ontruongnhom')->middleware('auth');
Route::post('onxetduyet','AdminController@xetduyet')->name('onxetduyet')->middleware('auth');
Route::post('lenlop','AdminController@lenlop')->name('lenlop')->middleware('auth');
Route::post('lenlopall','AdminController@lenlopall')->name('lenlopall')->middleware('auth');

Route::post('/password/change', 'AdminController@changePassword')->name('change.password')->middleware('auth');
Route::get('/password/change', 'AdminController@getChangePassword')->name('getchange.password')->middleware('auth');

Route::resource('configs', 'ConfigController');
// Route::resource('chungsinhs', 'ChungsinhController');

//route for admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', ['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@index']);
    Route::get('lenlop',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@lstlenlop','as'=>'lenlop.get']);
    Route::get('xetduyet',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@lstxetduyet','as'=>'xetduyet']);
    Route::get('nhomtruong',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@lstnhomtruong','as'=>'nhomtruong']);
    Route::get('export/', ['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@export','as'=>'export']);
    Route::get('export/view', ['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@exportview']);
    Route::get('canhbao',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@canhbao','as'=>'canhbao']);
    Route::get('import',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@import','as'=>'import']);
    Route::post('import/user', ['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@submitimport']);
    Route::get('gety',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@gety','as'=>'gety']);
    Route::post('offpost',['middleware' => ['permission:admins-manage'], 'uses' => 'PostController@offpost','as'=>'offpost']);
    Route::post('offcat',['middleware' => ['permission:admins-manage'], 'uses' => 'CategoryController@offcat','as'=>'offcat']);
    Route::post('ontruongnhom',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@nhomtruong','as'=>'ontruongnhom']);
    Route::post('onxetduyet',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@xetduyet','as'=>'onxetduyet']);
    Route::post('lenlop',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@lenlop','as'=>'lenlop']);
    Route::post('lenlopall',['middleware' => ['permission:admins-manage'], 'uses' => 'AdminController@lenlopall','as'=>'lenlopall']);
    Route::get('tuchoi',['middleware' => ['permission:admins-manage'],'uses' => 'AdminController@lsttuchoi','as' => 'tuchoi']);
});

//Route Roles
Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:roles-read'], 'uses'=>'RoleController@index','as'=>'role.index']);
    Route::get('/create', ['middleware' => ['permission:roles-create'], 'uses'=>'RoleController@create','as'=>'role.create']);
    Route::post('/store', ['middleware' => ['permission:roles-create'], 'uses'=>'RoleController@store','as'=>'role.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:roles-update'], 'uses'=>'RoleController@show','as'=>'role.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:roles-update'], 'uses'=>'RoleController@edit','as'=>'role.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:roles-delete'], 'uses'=>'RoleController@update','as'=>'role.update']);
});

//Route Dutu
Route::prefix('dutus')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:admins-manage'], 'uses'=>'DutuController@index','as'=>'dutu.index']);
    Route::get('/create', ['middleware' => ['permission:dutus-create'], 'uses'=>'DutuController@create','as'=>'dutu.create']);
    Route::post('/store', ['middleware' => ['permission:dutus-create'], 'uses'=>'DutuController@store','as'=>'dutu.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:dutus-update'], 'uses'=>'DutuController@show','as'=>'dutu.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:dutus-update'], 'uses'=>'DutuController@edit','as'=>'dutu.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:dutus-delete'], 'uses'=>'DutuController@update','as'=>'dutu.update']);
});

//Route Điểm Danh
Route::prefix('attdances')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:attendances-read'], 'uses'=>'AttendanceController@index','as'=>'attdance.index']);
    Route::get('/create', ['middleware' => ['permission:attendances-create'], 'uses'=>'AttendanceController@create','as'=>'attdance.create']);
    Route::post('/store', ['middleware' => ['permission:attendances-create'], 'uses'=>'AttendanceController@store','as'=>'attdance.store']);
    Route::get('/{month}/{year}', ['middleware' => ['permission:attendances-update'], 'uses'=>'AttendanceController@show','as'=>'attdance.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:attendances-update'], 'uses'=>'AttendanceController@edit','as'=>'attdance.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:attendances-delete'], 'uses'=>'AttendanceController@update','as'=>'attdance.update']);
});

//Route Bài viết
Route::prefix('posts')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:posts-read'], 'uses'=>'PostController@index','as'=>'posts.index']);
    Route::get('/create', ['middleware' => ['permission:posts-create'], 'uses'=>'PostController@create','as'=>'post.create']);
    Route::post('/store', ['middleware' => ['permission:posts-create'], 'uses'=>'PostController@store','as'=>'post.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:posts-update'], 'uses'=>'PostController@show','as'=>'post.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:posts-update'], 'uses'=>'PostController@edit','as'=>'post.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:posts-delete'], 'uses'=>'PostController@update','as'=>'post.update']);
});

//Route Category
Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:categoriescategories-read'], 'uses'=>'CategoryController@index','as'=>'categorie.index']);
    Route::get('/create', ['middleware' => ['permission:categories-create'], 'uses'=>'CategoryController@create','as'=>'categorie.create']);
    Route::post('/store', ['middleware' => ['permission:categories-create'], 'uses'=>'CategoryController@store','as'=>'categorie.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:categories-update'], 'uses'=>'CategoryController@show','as'=>'categorie.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:categories-update'], 'uses'=>'CategoryController@edit','as'=>'categorie.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:categories-delete'], 'uses'=>'CategoryController@update','as'=>'categorie.update']);
});

//Route Dòng tu
Route::prefix('dongtus')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:dongtus-read'], 'uses'=>'DongtuController@index','as'=>'dongtu.index']);
    Route::get('/create', ['middleware' => ['permission:dongtus-create'], 'uses'=>'DongtuController@create','as'=>'dongtu.create']);
    Route::post('/store', ['middleware' => ['permission:dongtus-create'], 'uses'=>'DongtuController@store','as'=>'dongtu.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:dongtus-update'], 'uses'=>'DongtuController@show','as'=>'dongtu.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:dongtus-update'], 'uses'=>'DongtuController@edit','as'=>'dongtu.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:dongtus-delete'], 'uses'=>'DongtuController@update','as'=>'dongtu.update']);
});

//Route Giấy tờ
Route::prefix('papers')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:paper-read'], 'uses'=>'PaperController@index','as'=>'paper.index']);
    Route::get('/create', ['middleware' => ['permission:paper-create'], 'uses'=>'PaperController@create','as'=>'paper.create']);
    Route::post('/store', ['middleware' => ['permission:paper-create'], 'uses'=>'PaperController@store','as'=>'paper.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:paper-update'], 'uses'=>'PaperController@show','as'=>'paper.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:paper-update'], 'uses'=>'PaperController@edit','as'=>'paper.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:paper-delete'], 'uses'=>'PaperController@update','as'=>'paper.update']);
    // paper for dutu
     Route::post('/storepaper_dutu', ['middleware' => ['permission:paper-delete'], 'uses'=>'Paper_DutuController@store','as'=>'update.paper_dutu']);
});

//Route Điểm thi
Route::prefix('diemthis')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:diemthis-read'], 'uses'=>'DiemthiController@index','as'=>'diemthi.index']);
    Route::get('/create', ['middleware' => ['permission:diemthis-create'], 'uses'=>'DiemthiController@create','as'=>'diemthi.create']);
    Route::post('/store', ['middleware' => ['permission:diemthis-create'], 'uses'=>'DiemthiController@store','as'=>'diemthi.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:diemthis-update'], 'uses'=>'DiemthiController@show','as'=>'diemthi.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:diemthis-update'], 'uses'=>'DiemthiController@edit','as'=>'diemthi.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:diemthis-delete'], 'uses'=>'DiemthiController@update','as'=>'diemthi.update']);
});

//Route Khu vực sinh hoạt
Route::prefix('zones')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:zones-read'], 'uses'=>'ZoneController@index','as'=>'zone.index']);
    Route::get('/create', ['middleware' => ['permission:zones-create'], 'uses'=>'ZoneController@create','as'=>'zone.create']);
    Route::post('/store', ['middleware' => ['permission:zones-create'], 'uses'=>'ZoneController@store','as'=>'zone.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:zones-update'], 'uses'=>'ZoneController@show','as'=>'zone.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:zones-update'], 'uses'=>'ZoneController@edit','as'=>'zone.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:zones-delete'], 'uses'=>'ZoneController@update','as'=>'zone.update']);
});

//Route Thông báo
Route::prefix('notifies')->middleware('auth')->group(function () {
    Route::get('/', ['middleware' => ['permission:notifications-read'], 'uses'=>'NotificationsController@index','as'=>'notify.index']);
    Route::get('/create', ['middleware' => ['permission:notifications-create'], 'uses'=>'NotificationsController@create','as'=>'notify.create']);
    Route::post('/store', ['middleware' => ['permission:notifications-create'], 'uses'=>'NotificationsController@store','as'=>'notify.store']);
    Route::get('/show/{id}', ['middleware' => ['permission:notifications-update'], 'uses'=>'NotificationsController@show','as'=>'notify.show']);
    Route::get('/edit/{id}', ['middleware' => ['permission:notifications-update'], 'uses'=>'NotificationsController@edit','as'=>'notify.edit']);
    Route::post('/edit/{id}', ['middleware' => ['permission:notifications-delete'], 'uses'=>'NotificationsController@update','as'=>'notify.update']);
});

// User Routes...
Route::prefix('users')->middleware(['auth'])->group(function () {
    Route::get('/', ['middleware' => ['permission:users-read'], 'uses'=>'UserController@index','as'=>'user.index']);
    Route::get('/add', ['middleware' => ['permission:users-create'], 'uses'=>'UserController@create','as'=>'user.add.get']);
    Route::post('/add', ['middleware' => ['permission:users-create'], 'uses'=>'UserController@store','as'=>'user.add.post']);
    Route::get('/edit/{id}', ['middleware' => ['permission:users-update'], 'uses' =>'UserController@edit','as'=>'user.edit.get']);
    Route::post('/edit', ['middleware' => ['permission:users-update'], 'uses'=>'UserController@update','as'=>'user.edit.post']);
    Route::get('/delete/{id}', ['middleware' => ['permission:users-delete'], 'uses'=>'UserController@destroy','as'=>'user.delete.get']);
});

//Document Routes...
Route::prefix('documents')->middleware(['auth'])->group(function () {
    Route::get('/', ['middleware' => ['permission:documents-read'], 'uses'=>'DocumentController@index','as'=>'index.document']);
    Route::get('/create', ['middleware' => ['permission:documents-create'], 'uses'=>'DocumentController@create','as'=>'create.document']);
    Route::post('/create', ['middleware' => ['permission:documents-create'], 'uses'=>'DocumentController@store','as'=>'save.document']);
    Route::get('/show/{id}', ['middleware' => ['permission:documents-update'], 'uses' =>'DocumentController@edit','as'=>'edit.document']);
    Route::post('/edit', ['middleware' => ['permission:documents-update'], 'uses'=>'DocumentController@update','as'=>'update.document']);
    Route::get('/delete/{id}', ['middleware' => ['permission:documents-delete'], 'uses'=>'DocumentController@destroy','as'=>'delete.document']);
});

//Link Routes
//Document Routes...
Route::prefix('links')->middleware(['auth'])->group(function () {
    Route::get('/', ['middleware' => ['permission:links-read'], 'uses'=>'LinkController@index','as'=>'index.link']);
    Route::get('/create', ['middleware' => ['permission:links-create'], 'uses'=>'LinkController@create','as'=>'create.link']);
    Route::post('/create', ['middleware' => ['permission:links-create'], 'uses'=>'LinkController@store','as'=>'save.link']);
    Route::get('/show/{id}', ['middleware' => ['permission:links-update'], 'uses' =>'LinkController@edit','as'=>'edit.link']);
    Route::post('/edit', ['middleware' => ['permission:links-update'], 'uses'=>'LinkController@update','as'=>'update.link']);
    Route::get('/delete/{id}', ['middleware' => ['permission:links-delete'], 'uses'=>'LinkController@destroy','as'=>'delete.link']);
});


//Route Chungsinh
Route::get('chungsinhs','ChungsinhController@index')->name('chungsinh.index');
Route::prefix('chungsinhs')->middleware(['auth'])->group(function(){
    Route::get('/create', ['middleware' => ['permission:chungsinhs-create'], 'uses'=>'ChungsinhController@create','as'=>'create.chungsinh']);
    Route::post('/create', ['middleware' => ['permission:chungsinhs-create'], 'uses'=>'ChungsinhController@store','as'=>'save.chungsinh']);
    Route::get('/show/{id}', ['middleware' => ['permission:chungsinhs-update'], 'uses' =>'ChungsinhController@edit','as'=>'edit.chungsinh']);
    Route::post('/edit', ['middleware' => ['permission:chungsinhs-update'], 'uses'=>'ChungsinhController@update','as'=>'update.chungsinh']);
    Route::get('/delete/{id}', ['middleware' => ['permission:chungsinhs-delete'], 'uses'=>'ChungsinhController@destroy','as'=>'delete.chungsinh']);
});