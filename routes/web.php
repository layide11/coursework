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

//Page Routes
Route::get('/', 'PagesController@index');
Route::get('/adoption list', 'PagesController@adoptionList');
Route::get('/profile', 'PagesController@profile');
Route::get('/contact', 'PagesController@contact');
Route::get('/addAnimal', 'AnimalsController@create');



//Controler Routes
Route::resource('animals', 'AnimalsController');
Route::resource('adoptions', 'AdoptionReqsController');

Route::get('adoptions/store/{id}', 'AdoptionReqsController@store');
Route::post('animalUpdate{id}','AnimalsController@update');
Route::get('animaldelete{id}','AnimalsController@destroy');
Route::get('requestUpdat{id}','AdoptionReqsController@update');
Route::get('filterAnimals','AnimalsController@filter');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
