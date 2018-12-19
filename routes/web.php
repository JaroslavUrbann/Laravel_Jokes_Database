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
Route::get("/category/all", "JokeController@Index")->name("jokes all");
Route::get("/category/{category_id}", "JokeController@ShowCategory");
Route::get("/delete/joke/{id}", "JokeController@Delete")->middleware("auth");
Route::get("/edit/joke/{id}", "JokeController@Edit")->middleware("auth");
Route::post("/update/joke", "JokeController@Update")->middleware("auth");

Route::get("/add/category", "CategoryController@Create")->name('add category')->middleware("auth");
Route::post("/store/category", "CategoryController@Store")->middleware("auth");
Route::get("/delete/category/{id}", "CategoryController@Delete")->middleware("auth");
