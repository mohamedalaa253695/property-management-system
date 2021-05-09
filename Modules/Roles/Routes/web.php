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

Route::prefix('roles')->group(function() {
    // Route::get('/', 'RolesController@index');
    // Route::get('/create', 'RolesController@create');
    // Route::get('/show/{role}','RolesController@show');
    // Route::post('/store','RolesController@store');
    // Route::put('/update/{role}','RolesController@update');
    // Route::delete('/delete/{role}','RolesController@delete');
    // Route::delete('/delete/{ids}','RolesController@bulkDelete');



});


Route::resource('roles', RolesController::class)->shallow();
