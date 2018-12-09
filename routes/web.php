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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/add/joke", "JokeController@Create")->middleware("auth");
Route::post("/store/joke", "JokeController@Store")->middleware("auth");
Route::get("/jokes/all", "JokeController@Index");
Route::get("/jokes/{category_id}", "JokeController@ShowCategory");
Route::get("/add/category", "CategoryController@Create")->middleware("auth");
Route::get("/store/category", "CategoryController@Store")->middleware("auth");
