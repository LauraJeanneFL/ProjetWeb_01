<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\EnchereController;

Route::get('/debug', function() {
    echo "Route de débogage fonctionnelle.";
});

Route::get('/test', function() {
    echo "Route de test fonctionnelle.";
});

Route::get('/home', 'HomeController@index');
Route::get('/enchere/index', 'EnchereController@index');
Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/store', 'EnchereController@store');
Route::get('/enchere/edit/{id}', 'EnchereController@edit');
Route::post('/enchere/update/{id}', 'EnchereController@update');
Route::get('/enchere/delete/{id}', 'EnchereController@delete');
 