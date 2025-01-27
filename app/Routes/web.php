<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\EnchereController;
use App\Controllers\TimbreController;
use App\Controllers\UtilisateurController;
use App\Controllers\FavorisController;
use App\Controllers\PasswordController;

// Routes définies

Route::get('/', function() {
    echo "Bienvenue à la page d'accueil.";
});
Route::get('/debug', function() {
    echo "Route de débogage fonctionnelle.";
});

Route::get('/test', function() {
    echo "Route de test fonctionnelle.";
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/enchere/index', 'EnchereController@index');
Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/store', 'EnchereController@store');
Route::get('/enchere/edit/{id}', 'EnchereController@edit');
Route::post('/enchere/update/{id}', 'EnchereController@update');
Route::get('/enchere/delete/{id}', 'EnchereController@delete');

Route::get('/timbre/index', 'TimbreController@index');
Route::get('/timbre/create', 'TimbreController@create');
Route::post('/timbre/store', 'TimbreController@store');
Route::get('/timbre/edit/{id}', 'TimbreController@edit');
Route::post('/timbre/update/{id}', 'TimbreController@update');
Route::get('/timbre/delete/{id}', 'TimbreController@delete');

Route::get('/utilisateur/index', 'UtilisateurController@index');
Route::get('/utilisateur/create', 'UtilisateurController@create');
Route::post('/utilisateur/store', 'UtilisateurController@store');
Route::get('/utilisateur/edit/{id}', 'UtilisateurController@edit');
Route::post('/utilisateur/update/{id}', 'UtilisateurController@update');
Route::get('/utilisateur/delete/{id}', 'UtilisateurController@delete');

Route::get('/favoris/index', 'FavorisController@index');
Route::get('/favoris/create', 'FavorisController@create');
Route::post('/favoris/store', 'FavorisController@store');
Route::get('/favoris/delete/{id}', 'FavorisController@delete');

Route::get('/password/request', 'PasswordController@requestForm');
Route::post('/password/request', 'PasswordController@handleRequest');
Route::get('/utilisateur/reset', 'PasswordController@requestForm');
Route::post('/utilisateur/reset', 'PasswordController@handleRequest');
Route::get('/utilisateur/update_password', 'PasswordController@showUpdateForm');
Route::post('/utilisateur/update_password', 'PasswordController@updatePassword');

echo "Chargement du fichier web.php<br>";
Route::dispatch();
