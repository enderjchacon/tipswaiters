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

Route::get('/', 'WaitersController@index');

Route::get('/status', 'StatusController@index')->name('status.index');

Route::get('/status/crear/', 'StatusController@create')->name('status.create');

Route::get('/status/editar/{Status}', 'StatusController@update')->name('status.update');

Route::post('/status/created', 'StatusController@insertStore')->name('status.insertStore');

Route::put('/status/editar/{Status}', 'StatusController@updateStore')->name('status.updateStore');

Route::delete('/status/delete/{Status}', 'StatusController@deleteStore')->name('status.destroy');

//ROUTES COHORTES

Route::get('/cortes', 'CohortsController@index')->name('cohorts.index');

Route::get('/cortes/crear', 'CohortsController@create')->name('cohorts.create');

Route::post('/cortes/created', 'CohortsController@insertStore')->name('cohorts.insertStore');

Route::get('/cortes/editar/{Cohorts}', 'CohortsController@update')->name('cohorts.update');

Route::put('/cortes/editar/{Cohorts}', 'CohortsController@updateStore')->name('cohorts.updateStore');

Route::delete('/cortes/delete/{Cohorts}', 'CohortsController@deleteStore')->name('cohorts.deleteStore');

//ROUTES WAITERS

Route::get('/meseros', 'WaitersController@index')->name('Waiters.index');

Route::get('/meseros/crear', 'WaitersController@create')->name('Waiters.create');

Route::post('/meseros/created', 'WaitersController@insertStore')->name('Waiters.insertStore');

Route::get('/meseros/editar/{Waiters}', 'WaitersController@update')->name('Waiters.update');

Route::put('/meseros/editar/{Waiters}', 'WaitersController@updateStore')->name('Waiters.updateStore');

Route::delete('/meseros/delete/{Waiters}', 'WaitersController@deleteStore')->name('Waiters.deleteStore');

//ROUTES TIPS

Route::get('/propinas', 'TipsController@index')->name('Tips.index');

Route::get('/propinas/crear', 'TipsController@create')->name('Tips.create');

Route::post('/propinas/created', 'TipsController@insertStore')->name('Tips.insertStore');

Route::get('/propinas/editar/{Tips}', 'TipsController@update')->name('Tips.update');

Route::put('/propinas/editar/{Tips}', 'TipsController@updateStore')->name('Tips.updateStore');

Route::delete('/propinas/delete/{Tips}', 'TipsController@deleteStore')->name('Tips.deleteStore');

//ROUTER TIPS WAITER

Route::get('/propinas/show/{Waiters}', 'TipsWaitersController@index')->name('tips.show');