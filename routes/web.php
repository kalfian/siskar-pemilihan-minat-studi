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

Route::get('/', [
    'uses' => 'LandingPageController@index',
    'as' => 'home'
]);

Route::post('/consult', [
    'uses' => 'LandingPageController@consult',
    'as' => 'consult'
]);

Route::post('/consult/store', [
    'uses' => 'LandingPageController@store',
    'as' => 'consult.store'
]);

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

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
        
        Route::get('/{fact}/edit',[
            'uses' => 'FactController@edit',
            'as' => 'admin.fact.edit'
        ]);

        Route::put('/{fact}/edit',[
            'uses' => 'FactController@update',
            'as' => 'admin.fact.update'
        ]);

        Route::delete('/{fact}',[
            'uses' => 'FactController@destroy',
            'as' => 'admin.fact.destroy'
        ]);
    });

    Route::group(['prefix' => 'study'], function () {
        Route::get('/',[
            'uses' => 'StudyController@index',
            'as' => 'admin.study.index'
        ]);

        Route::get('/json',[
            'uses' => 'StudyController@data',
            'as' => 'admin.study.index.json'
        ]);

        Route::post('/',[
            'uses' => 'StudyController@store',
            'as' => 'admin.study.store'
        ]);
        
        Route::get('/{study}/edit',[
            'uses' => 'StudyController@edit',
            'as' => 'admin.study.edit'
        ]);

        Route::put('/{study}/edit',[
            'uses' => 'StudyController@update',
            'as' => 'admin.study.update'
        ]);

        Route::delete('/{study}',[
            'uses' => 'StudyController@destroy',
            'as' => 'admin.study.destroy'
        ]);
    });

    Route::group(['prefix' => 'relation'], function () {
        Route::get('/',[
            'uses' => 'ManageRelationController@index',
            'as' => 'admin.relation.index'
        ]);

        Route::put('/{study}',[
            'uses' => 'ManageRelationController@update',
            'as' => 'admin.relation.update'
        ]);
    });
});
