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

Route::get('/','FrontendController@getHome');

Route::get('/details/{id}/{slug}','FrontendController@getDetails');

Route::get('/category/{id}/{slug}','FrontendController@getCategory');

//search route

Route::get('search','FrontendController@getSearch');

Route::group(['namespace'=>'Admin'],function(){
    Route::group(['prefix'=>'login'],function(){
        Route::get('/','LoginController@getLogin');
        Route::post('/','LoginController@postLogin');

        
    });
    Route::group(['prefix'=>'register'],function(){
        Route::get('/','RegisController@getRegis');
        Route::post('/','RegisController@postRegis');

        
    });
    Route::get('logout','HomeController@getLogout');
    Route::group(['prefix'=>'admin'],function(){
        Route::get('home','HomeController@getHome');

        // category route
        Route::group(['prefix'=>'category'],function(){
            Route::get('/','CategoryController@getCate');
            Route::post('/','CategoryController@postCate');

            Route::get('edit/{id}','CategoryController@getEditCate');
            Route::post('edit/{id}','CategoryController@postEditCate');

            Route::get('delete/{id}','CategoryController@getDeleteCate');
        });

        // product
        Route::group(['prefix'=>'product'],function(){
            Route::get('/','ProductController@getProduct');


            Route::get('/add','ProductController@getAddProduct');
            Route::post('/add','ProductController@postAddProduct');

            Route::get('edit/{id}','ProductController@getEditProduct');
            Route::post('edit/{id}','ProductController@postEditProduct');

            Route::get('delete/{id}','ProductController@getDeleteProduct');
        });
    });
});
