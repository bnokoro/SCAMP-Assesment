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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware(['auth'])->group(function (){

        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('categories', 'CategoriesController');

        Route::resource('inventories', 'InventoriesController');

        Route::get('trashed-inventories', 'InventoriesController@trashed')->name('trashed-inventories.index');

        Route::put('restore-inventory/{inventory}', 'InventoriesController@restore')->name('restore-inventories');


});


Route::middleware(['auth','admin'])->group(function (){

    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');

    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');

    Route::get('users', 'UsersController@index')->name('users.index');

    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
