<?php
use App\Routes\Route;

use App\Controllers\HomeController;
use App\Controllers\EnchereController;
use App\Controllers\TimbreController;
use App\Controllers\UtilisateurController;
use App\Controllers\FavorisController;
use App\Controllers\PasswordController;

Route::get('/home', 'HomeController@index');
Route::get('/catalogue', 'CatalogueController@index'); 
Route::get('/fiche-produit/{id}', 'FicheProduitController@show');

// Gestion des utilisateurs
Route::get('/utilisateur/login', 'UtilisateurController@login');
Route::post('/utilisateur/login', 'UtilisateurController@handleLogin');
Route::get('/utilisateur/register', 'UtilisateurController@register');
Route::post('/utilisateur/register', 'UtilisateurController@handleRegister');
Route::get('/utilisateur/password-reset', 'UtilisateurController@passwordReset');
Route::post('/utilisateur/password-reset', 'UtilisateurController@handlePasswordReset');

//Gestions des enchères
Route::get('/enchere', 'EnchereController@index');
Route::get('/enchere/create', 'EnchereController@create');
Route::post('/enchere/create', 'EnchereController@store');
Route::get('/enchere/edit/{id}', 'EnchereController@edit');
Route::post('/enchere/edit/{id}', 'EnchereController@update');
Route::get('/enchere/delete/{id}', 'EnchereController@delete');
Route::get('/enchere/actives', 'EnchereController@actives');

Route::dispatch();
