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

Route::get('/home', 'HomeController@index');

Route::get('/home/usagi', 'HomeController@usagi');
Route::get('/home/kuma', 'HomeController@kuma');
Route::get('/home/risu', 'HomeController@risu');

// Route::post('/createitem', 'HomeController@createitem');

Route::patch('/createitem/{createditem}', 'HomeController@createitem');

Route::get('/completeGame', 'HomeController@completeGame');

Route::post('/completeUsagiGame', 'HomeController@completeUsagiGame');

Route::get('/completeGame1', 'HomeController@completeGame1');

Route::post('/completeKumaGame', 'HomeController@completeKumaGame');

Route::get('/createKumaItem1', 'HomeController@createKumaItem1');

Route::get('/createKumaItem2', 'HomeController@createKumaItem2');

Route::get('/createrisuitem1', 'HomeController@createrisuitem1');

Route::get('/createrisuitem2', 'HomeController@createrisuitem2');

Route::get('/createrisuitem3', 'HomeController@createrisuitem3');
