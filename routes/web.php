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

Auth::routes(['register' => false, 'reset' => false, 'request' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'uses' => 'DashboardController@index',
        'as' => 'home'
    ]);

    Route::get('/edit-profile', [
        'uses' => 'DashboardController@edit',
        'as' => 'profile.edit'
    ]);

    route::put('/edit-profile', [
        'uses' => 'DashboardController@update',
        'as' => 'profile.update'
    ]);

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/',[
            'uses' => 'AdminController@index',
            'as' => 'admin.index'
        ]);

        Route::get('/json',[
            'uses' => 'AdminController@data',
            'as' => 'admin.index.json'
        ]);

        Route::post('/',[
            'uses' => 'AdminController@store',
            'as' => 'admin.store'
        ]);
        
        Route::get('/{id}/edit',[
            'uses' => 'AdminController@edit',
            'as' => 'admin.edit'
        ]);

        Route::put('/{id}/edit',[
            'uses' => 'AdminController@update',
            'as' => 'admin.update'
        ]);

        Route::delete('/{id}',[
            'uses' => 'AdminController@destroy',
            'as' => 'admin.destroy'
        ]);
    });

    Route::group(['prefix' => 'fact'], function () {
        Route::get('/',[
            'uses' => 'FactController@index',
            'as' => 'admin.fact.index'
        ]);

        Route::get('/json',[
            'uses' => 'FactController@data',
            'as' => 'admin.fact.index.json'
        ]);

        Route::post('/',[
            'uses' => 'FactController@store',
            'as' => 'admin.fact.store'
        ]);
        
        Route::get('/{id}/edit',[
            'uses' => 'FactController@edit',
            'as' => 'admin.fact.edit'
        ]);

        Route::put('/{id}/edit',[
            'uses' => 'FactController@update',
            'as' => 'admin.fact.update'
        ]);

        Route::delete('/{id}',[
            'uses' => 'FactController@destroy',
            'as' => 'admin.fact.destroy'
        ]);
    });
});
