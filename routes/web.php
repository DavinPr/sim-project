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


//Login
Route::post('/', 'authentication\LoginController@login')->name('login');
Route::get('/', 'authentication\LoginController@index')->name('login');

//Route if user is admin
Route::group([
    'middleware' => ['auth', 'isAdmin']
], function () {
    //Route to admin homepage
    Route::get('admin/homepage', 'PagesController@admin_home')->name('admin.homepage');

    //Route to admin list for admin
    Route::get('admin/admin/show', 'AdminController@index')->name('admin.show.admin.page');

    //Route to santri list for admin
    Route::get('admin/santri/show', 'StudentController@index')->name('admin.show.santri.page');

    //Route to add data santri page for admin
    Route::get('admin/santri/add', 'PagesController@admin_add_santri')->name('admin.add.santri.page');

    //Route to santri detail for admin
    Route::get('admin/santri/{student}', 'StudentController@show')->name('admin.detail.santri');

    //Route to change santri role to admin
    Route::put('santri/as_admin/{student}', 'AdminController@studentToAdmin')->name('admin.santri.as.admin');

    //Route to add data admin page for admin
    Route::get('admin/admin/add', 'PagesController@admin_add_admin')->name('admin.add.admin.page');

    //Route to add data admin
    Route::post('admin/create', 'AdminController@store')->name('admin.create.admin');

    //Route to add data santri
    Route::post('/santri/create', 'StudentController@store')->name('admin.create.santri');

    //Route to detail admin page
    Route::get('admin/admin/detail/{id}', 'AdminController@show')->name('admin.detail.admin');

    //Delete data santri
    Route::delete('/santri/{student}', 'StudentController@destroy');

    //Delete data admin
    Route::delete('admin/{user}', 'AdminController@destroy');

    //Route to update santri page
    Route::get('admin/santri/update/{student}', 'StudentController@edit')->name('admin.edit.santri');

    //Route to update admin page
    Route::get('admin/admin/update/{student}', 'AdminController@edit')->name('admin.edit.admin');

    //Update data santri
    Route::put('student/update/person/{person}', 'StudentController@updatePerson')->name('admin.update.santri.person');
    Route::put('student/update/student/{student}', 'StudentController@update')->name('admin.update.santri.student');
    Route::put('student/update/user/{user}', 'StudentController@updateUser')->name('admin.update.santri.user');

    //Update data admin
    Route::put('admin/update/person/{id}', 'AdminController@updatePerson')->name('admin.update.admin.person');
    Route::put('admin/update/student/{id}', 'AdminController@update')->name('admin.update.admin.user');


    //Route to data transaksi
    Route::get('admin/transaksi/show', 'TransactionController@indexAdmin')->name('admin.show.transaksi');

    //Route to detail transaksi
    Route::get('admin/transaksi/detail', 'AdminController@detailTransaksi')->name('admin.detail.transaksi');

    //Route to verifikasi
    Route::get('admin/transaksi/verifikasi', 'AdminController@verifikasi')->name('admin.verifikasi');

    //Route to logout
    Route::get('logout', 'authentication\LoginController@logout')->name('logout');
});


//Route if user is not admin
Route::group(['middleware' => 'auth'], function () {

    //Route to santri dashboard
    Route::get('/homepage', 'PagesController@santri_home')->name('santri.homepage');

    //Route to santri list
    Route::get('/santri/show', 'StudentController@index')->name('santri.show_all');

    //Route to profile
    Route::get('/santri/profile/{student}', 'StudentController@show')->name('santri.profile');

    //Route to transaction history
    Route::get('santri/transaksi', 'TransactionController@index')->name('santri.transaksi');

    //Route to transaction detail
    Route::get('/stantri/transaksi/detail/{transaction}', 'TransactionController@show')->name('santri.transaksi.detail');

    //Route for santri that upload a payment confirmation page
    Route::get('santri/pembayaran', 'TransactionController@create')->name('santri.pembayaran');

    //Route for santri that upload a payment confirmation
    Route::post('santri/pembayaran', 'TransactionController@store')->name('santri.pembayaran');

    //Route to logout
    Route::get('logout', 'authentication\LoginController@logout')->name('logout');
});
