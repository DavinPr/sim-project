<?php

use App\Student;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/santri/add', function () {
    return view('add_data_santri_example');
});

Route::get('/santri/show', 'StudentController@index');
Route::get('/santri/{student}', 'StudentController@show');
Route::get('/santri/update/{student}', 'StudentController@edit');

//Add data santri
Route::post('/santri/create', 'StudentController@store');
//Delete data santri
Route::delete('/santri/{student}', 'StudentController@destroy');
//Update data santri
Route::put('/santri/update/person/{person}', 'StudentController@updatePerson');
Route::put('/student/update/student/{student}', 'StudentController@update');
Route::put('/student/update/user/{user}', 'StudentController@updateUser');
