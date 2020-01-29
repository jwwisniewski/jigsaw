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

Route::prefix('_admin')->group(function (){
    Route::prefix('subpage')->group(function (){
        Route::get('index', array('as' => 'subpage.index', 'uses' => 'Subpages@index'));
        Route::get('create', array('as' => 'subpage.create', 'uses' => 'Subpages@create'));
        Route::post('store', array('as' => 'subpage.store', 'uses' => 'Subpages@store'));
        Route::get('edit/{subpage}', array('as' => 'subpage.edit', 'uses' => 'Subpages@edit'));
        Route::post('update/{subpage}', array('as' => 'subpage.update', 'uses' => 'Subpages@update'));
        Route::get('destroy/{subpage}', array('as' => 'subpage.destroy', 'uses' => 'Subpages@destroy'));
    });
});
