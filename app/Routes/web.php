<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\EnchereController;
use App\Controllers\TimbreController;
use App\Controllers\UtilisateurController;
use App\Controllers\FavorisController;
use App\Controllers\PasswordController;

$base = rtrim(BASE, '/');

Route::get('test', 'HomeController@index' );

Route::get('/home/index', 'HomeController@index');
Route::get('/catalogue/index', 'CatalogueController@index');
Route::get('/catalogue/show/{id}', 'CatalogueController@show');
Route::get('/fiche/fiche-produit', 'FicheProduitController@show');

Route::get('/utilisateur/login', 'UtilisateurController@login');
Route::post('/utilisateur/login', 'UtilisateurController@handleLogin');

Route::get('/utilisateur/register', 'UtilisateurController@register');
Route::post('/utilisateur/register', 'UtilisateurController@handleRegister');

Route::get('/utilisateur/profil', 'UtilisateurController@profile');
Route::post('/utilisateur/profil', 'UtilisateurController@profile');
Route::get('/utilisateur/logout', 'UtilisateurController@logout');

Route::post('/timbre/ajouter', 'TimbreController@ajouter');

Route::get('/enchere/liste', 'EnchereController@listeActive');
Route::get('/enchere/archive', 'EnchereController@listeArchivee');

Route::get('/enchere/recherche', 'EnchereController@rechercher');
Route::post('/enchere/upload', 'EnchereController@upload');

Route::get($base . '/', function() {
    header("Location: " . BASE . "/home");
    exit;
});

Route::dispatch();

