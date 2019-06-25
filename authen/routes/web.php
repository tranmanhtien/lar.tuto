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
    Route::get('/','AdminController@index')->name('admin.dashboard');

    //    URL::authen.com/doashboard/admin/
    //route đăng nhập thành công
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

    //    URL::authen.com/resiter/admin/
    //route trả về view khi đăng nhập thành công
    Route::get('register','AdminController@create')->name('admin.register');

    //    URL::authen.com/resiter/admin/
    //route đăng kí 1 ad min khi post

    Route::post('register','AdminController@store')->name('admin.register.store');

    //route trả về view đăng nhập admin
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    //route xử lý đăng nhập admin
    //method::post
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    //Roue dùng để đăng xuất
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});

/*
 * route cho các nhà seller*/
Route::prefix('seller')->group(function () {
    //    các nhóm route cho phàn seller
    //    URL::authen.com/seller/
    //route maặc định
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    //    URL::authen.com/doashboard/seller/
    //route đăng nhập thành công
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

    //    URL::authen.com/resiter/seller/
    //route trả về view khi đăng nhập thành công
    Route::get('register','SellerController@create')->name('seller.register');

    //    URL::authen.com/resiter/seller/
    //route đăng kí 1 ad min khi post

    Route::post('register','SellerController@store')->name('seller.register.store');

    //route trả về view đăng nhập admin
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    //route xử lý đăng nhập admin
    //method::post
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    //Roue dùng để đăng xuất
    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');

});

/*
 * route cho các nhà shipper*/
Route::prefix('shipper')->group(function () {
    //    các nhóm route cho phàn shipper
    //    URL::authen.com/shipper/
    //route maặc định
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    //    URL::authen.com/doashboard/seller/
    //route đăng nhập thành công
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    //    URL::authen.com/resiter/seller/
    //route trả về view khi đăng nhập thành công
    Route::get('register','ShipperController@create')->name('shipper.register');

    //    URL::authen.com/resiter/shipper/
    //route đăng kí 1 ad min khi post

    Route::post('register','ShipperController@store')->name('shipper.register.store');

    //route trả về view đăng nhập Shipper
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    //route xử lý đăng nhập Shipper
    //method::post
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');

    //Roue dùng để đăng xuất
    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');

});