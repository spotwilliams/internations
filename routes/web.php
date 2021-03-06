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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/{url}', 'HomeController@index')
        ->where(['url' => '|home|index'])
        ->name('home')
        ->middleware('verified');

Route::group(['middleware' => ['permission:manage users', 'verified']], function () {

    Route::resource('groups', 'GroupController');
    Route::resource('users', 'UserController');
});