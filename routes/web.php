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

Route::prefix('api')->group(function(){


	Route::get('drink','DrinkController@getDrink');
	Route::get('table','TableController@getTable');
	Route::get('table/{id}','TableController@getTableById'); // return Obj Table with all attribute JSON
	Route::get('getListDrinkByTable/{tableid}','OrderController@getListDrinkByTable');



	Route::post('drink','DrinkController@postDrink')->name("addDrink");
	Route::post('order','OrderController@makeNewOrder')->name("addOrder");
	Route::post('addDrinkToOrder','OrderController@addDrinkToOrder')->name("addDrinkToOrder");


	Route::put('updateOrderAndTableStatus/{tableid}','OrderController@updateOrderAndTableStatus');


});

