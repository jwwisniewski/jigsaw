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
        Route::get('index', array('as' => 'subpage.index', 'uses' => 'SubpageController@index'));
        Route::get('create', array('as' => 'subpage.create', 'uses' => 'SubpageController@create'));
        Route::post('store', array('as' => 'subpage.store', 'uses' => 'SubpageController@store'));
        Route::get('edit/{subpage}', array('as' => 'subpage.edit', 'uses' => 'SubpageController@edit'));
        Route::post('update/{subpage}', array('as' => 'subpage.update', 'uses' => 'SubpageController@update'));
        Route::get('destroy/{subpage}', array('as' => 'subpage.destroy', 'uses' => 'SubpageController@destroy'));
    });

    Route::prefix('instance')->group(function (){
        Route::get('index', array('as' => 'instance.index', 'uses' => 'InstanceController@index'));
        Route::get('create', array('as' => 'instance.create', 'uses' => 'InstanceController@create'));
        Route::post('store', array('as' => 'instance.store', 'uses' => 'InstanceController@store'));
        Route::get('edit/{instance}', array('as' => 'instance.edit', 'uses' => 'InstanceController@edit'));
        Route::post('update/{instance}', array('as' => 'instance.update', 'uses' => 'InstanceController@update'));
        Route::get('destroy/{instance}', array('as' => 'instance.destroy', 'uses' => 'InstanceController@destroy'));
    });

    Route::prefix('news')->group(function (){
        Route::get('index', array('as' => 'news.index', 'uses' => 'NewsController@index'));
        Route::get('create', array('as' => 'news.create', 'uses' => 'NewsController@create'));
        Route::post('store', array('as' => 'news.store', 'uses' => 'NewsController@store'));
        Route::get('edit/{news}', array('as' => 'news.edit', 'uses' => 'NewsController@edit'));
        Route::post('update/{news}', array('as' => 'news.update', 'uses' => 'NewsController@update'));
        Route::get('destroy/{news}', array('as' => 'news.destroy', 'uses' => 'NewsController@destroy'));
    });

});
