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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * route cho admin
 * */

Route::prefix('admin')->group(function (){
//    các nhóm route cho phàn admin
//    URL::authen.com/admin/
    //route maặc định
    Route::get('/','AdminController@index')->name('admin.doashboard');

    //    URL::authen.com/doashboard/admin/
    //route đăng nhập thành công
    Route::get('/doashboard','AdminController@index')->name('admin.doashboard');

    //    URL::authen.com/resiter/admin/
    //route trả về view khi đăng nhập thành công
    Route::get('resiter','AdminController@create')->name('admin.resiter');

    //    URL::authen.com/resiter/admin/
    //route đăng kí 1 ad min khi post

    Route::post('resiter','AdminController@store')->name('admin.store');


});