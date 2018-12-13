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
Route::get("/add/joke", "JokeController@Create")->name('add joke')->middleware("auth");
Route::post("/store/joke", "JokeController@Store")->middleware("auth");
Route::get("/jokes/all", "JokeController@Index")->name("jokes all");
Route::get("/jokes/{category_id}", "JokeController@ShowCategory");
Route::get("/add/category", "CategoryController@Create")->name('add category')->middleware("auth");
Route::post("/store/category", "CategoryController@Store")->middleware("auth");
