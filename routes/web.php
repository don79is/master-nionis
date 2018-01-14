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
    return redirect(app()->getLocale());
});
Route::get('login/admin/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login/admin/', ['as' => '', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::group(['prefix' => 'admin/nionis', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.core');
    });
    Route::group(['prefix' => 'lang'], function () {
        Route::get('/', ['as' => 'app.languages.index', 'uses' => 'MBLanguageCodesController@index']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.languages.edit', 'uses' => 'MBLanguageCodesController@edit']);
            Route::post('/edit', ['uses' => 'MBLanguageCodesController@update']);
        });
    });
    Route::group(['prefix' => 'resources'], function () {
        Route::get('/', ['as' => 'app.resources.index', 'uses' => 'MBResourcesController@index']);
        Route::get('/create/{MBWorks}', ['as' => 'app.resources.create', 'uses' => 'MBResourcesController@create']);
        Route::post('/create/{MBWorks}', ['uses' => 'MBResourcesController@store']);
        Route::delete('/delete/{MBWorks}', ['as' => 'app.resources.destroy', 'uses' => 'MBResourcesController@destroy']);
    });
    Route::group(['prefix' => 'works'], function () {
        Route::get('/', ['as' => 'app.works.index', 'uses' => 'MBWorksController@index']);
        Route::get('/create', ['as' => 'app.works.create', 'uses' => 'MBWorksController@create']);
        Route::post('/create', ['uses' => 'MBWorksController@store']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/', ['as' => 'app.works.show', 'uses' => 'MBWorksController@show']);
            Route::get('/edit', ['as' => 'app.works.edit', 'uses' => 'MBWorksController@edit']);
            Route::post('/edit', ['uses' => 'MBWorksController@update']);
            Route::delete('/delete', ['as' => 'app.works.destroy', 'uses' => 'MBWorksController@destroy']);
        });
    });
});
Route::post('contact', 'FrontendController@postContact');
Route::group(['prefix' => '{language}', 'middleware' => ['check-language']], function () {
    Route::get('/', ['as' => 'app.frontend.index', 'uses' => 'FrontendController@index']);
    Route::get('/{id}', ['as' => 'app.frontend.show', 'uses' => 'FrontendController@show']);
});

