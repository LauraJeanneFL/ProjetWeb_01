{% extends "layout/base.twig" %}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<h1>Réinitialiser le mot de passe</h1>
<form action="/password/update" method="POST">
    <input type="hidden" name="token" value="{{ token }}">
    <label for="password">Nouveau mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Mettre à jour</button>
</form>