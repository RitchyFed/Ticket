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
Route::post('/home', 'HomeController@store')->name('store.table');
Route::get('/home/del/{table}', 'HomeController@del')->name('del.table');
Route::post('/home/modif', 'HomeController@rename')->name('rename.table');





Route::get('/profil', 'ProfilController@profil')->name('profil');
Route::post('/profil', 'ProfilController@rename')->name('rename.user');



// Route for TABLE BLADE
Route::get('/table/{id_table}', 'TableController@table')->name('table');

// Route for LISTES
Route::post('/table/{id_table}', 'TableController@storeli')->name('store.li');
Route::post('/table/del/{id_table}', 'TableController@delli')->name('del.li');
Route::post('/table/modif/{id_table}', 'TableController@renameli')->name('rename.li');

// Route for CARDS
Route::post('/table/card/{id_liste}', 'TableController@storecard')->name('store.card');
Route::post('/table/del/card/{id_liste}', 'TableController@delcard')->name('del.card');
Route::post('/table/modif/card/{id_liste}', 'TableController@renamecard')->name('rename.card');

// Route for COMS
Route::post('/table/com/{id_card}', 'TableController@storecom')->name('store.com');
Route::post('/table/del/com/{id_card}', 'TableController@delcom')->name('del.com');
Route::post('/table/modif/com/{id_card}', 'TableController@renamecom')->name('rename.com');
