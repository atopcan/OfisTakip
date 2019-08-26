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
Route::get('/calender/{ay?}', 'HomeController@calender')->name('calender.index');
Route::get('/calenderPersonelAdd', 'HomeController@calenderPersonelAdd')->name('calender.calenderPersonelAdd');
Route::post('/calenderPersonelAddSave', 'CalenderOperation@save')->name('calender.save');
Route::post('/calenderPersonelAddUpdate', 'CalenderOperation@update')->name('calender.update');
Route::post('/calenderPersonelAddDelete/{id?}', 'CalenderOperation@delete')->name('calender.delete');





