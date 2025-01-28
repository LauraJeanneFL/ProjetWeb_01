{% extends "layout/base.twig" %}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<h1>Réinitialisation du mot de passe</h1>
<form action="/password/request_reset" method="POST">
    <label for="email">Adresse e-mail :</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Envoyer le lien</button>
</form>
{% if error %}
    <p class="error">{{ error }}</p>
{% endif %}