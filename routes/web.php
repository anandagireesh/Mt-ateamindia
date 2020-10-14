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

Route::get('/', function () {
    return view('login');
});
// Route::get('/editprofile', function () {
//     return view('userprofile/editprofile');
// });

Route::get('/registration','UserController@registration');
Route::post('/registerprocess','UserController@registrationProcess');
Route::get('/userhome','UserController@userhome');
Route::post('/loginprocess','UserController@loginprocess');
Route::get('/sendrequest/{id}','UserController@sendrequest');
Route::get('/acceptRequest/{sid}/{rid}','UserController@acceptRequest');
Route::get('/changeimage','UserController@changeimage');
Route::post('/updateimage','UserController@updateimage');
Route::get('/editprofile','UserController@editprofile');
