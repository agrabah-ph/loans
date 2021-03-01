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

Route::group(['middleware' => ['role:super_admin','auth']],function(){
    /*route prefix can be user for nav activation*/
    Route:prefix('super_admin')->as('super_admin.')->group(function(){
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    });
});

Route::group(['middleware' => ['role:loan_provider','auth']],function(){
    /*route prefix can be user for nav activation*/
    Route:prefix('loan_provider')->as('loan_provider.')->group(function(){

    });
});

Route::group(['middleware' => ['role:borrower','auth']],function(){
    /*route prefix can be user for nav activation*/
    Route:prefix('borrower')->as('borrower.')->group(function(){

    });
});