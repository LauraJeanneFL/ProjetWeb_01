<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\EnchereController;

// Définition des routes
Route::get('/home', 'HomeController@index');
Route::get('/enchere/index', 'EnchereController@index');
Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/store', 'EnchereController@store');
Route::get('/enchere/edit/{id}', 'EnchereController@edit');
Route::post('/enchere/update/{id}', 'EnchereController@update');
Route::get('/enchere/delete/{id}', 'EnchereController@delete');

Route::get('/test', function() {
    echo "Route de test fonctionnelle";
});