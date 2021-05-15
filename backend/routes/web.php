<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DailyHabitController;
use App\Http\Controllers\PGController;
use App\Http\Controllers\MyappController;

// use App\Http\Controllers\TestController;

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

Route::get('/myapp', function () {
    return view('myapp');
});

Route::group(['prefix'=>'myapp'], function () {
    Route::get('', 'App\Http\Controllers\MyappController@index')->name('myapp.index');
    Route::group(['prefix'=>'habits'], function () {
        Route::get('index', 'App\Http\Controllers\HabitController@index')->name('habit.index');
        Route::get('create', 'App\Http\Controllers\HabitController@create')->name('habit.create');
        Route::post('store', 'App\Http\Controllers\HabitController@store')->name('habit.store');
        Route::get('show/{id}', 'App\Http\Controllers\HabitController@show')->name('habit.show');
        Route::get('edit/{id}', 'App\Http\Controllers\HabitController@edit')->name('habit.edit');
        Route::post('update/{id}', 'App\Http\Controllers\HabitController@update')->name('habit.update');
        Route::post('destroy/{id}', 'App\Http\Controllers\HabitController@destroy')->name('habit.destroy');
    });
    Route::group(['prefix'=>'daily_habits'], function () {
        Route::get('index', 'App\Http\Controllers\DailyHabitController@index')->name('daily_habit.index');
        Route::get('create', 'App\Http\Controllers\DailyHabitController@create')->name('daily_habit.create');
        Route::post('store', 'App\Http\Controllers\DailyHabitController@store')->name('daily_habit.store');
    });
});


// pgはplaygroundです。
Route::group(['prefix'=>'pg'], function () {
    Route::get('', 'App\Http\Controllers\PGController@index')->name('pg.index');
});
Route::get('tests/test', [TestController::class, 'index']);
Route::group(['prefix'=>'contacts'], function () {
    Route::get('index', 'App\Http\Controllers\ContactFormController@index')->name('contact.index');
    Route::get('create', 'App\Http\Controllers\ContactFormController@create')->name('contact.create');
    Route::post('store', 'App\Http\Controllers\ContactFormController@store')->name('contact.store');
    Route::get('show/{id}', 'App\Http\Controllers\ContactFormController@show')->name('contact.show');
    Route::get('edit/{id}', 'App\Http\Controllers\ContactFormController@edit')->name('contact.edit');
    Route::post('update/{id}', 'App\Http\Controllers\ContactFormController@update')->name('contact.update');
    Route::post('destroy/{id}', 'App\Http\Controllers\ContactFormController@destroy')->name('contact.destroy');
});
Route::get('shops/index', [ShopController::class, 'index']);
