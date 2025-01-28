{% extends "layout/base.twig" %}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<h1>Profil utilisateur</h1>
<p>Nom d’utilisateur : {{ user.username }}</p>
<p>Email : {{ user.email }}</p>

<h2>Historique des enchères</h2>
<ul>
    {% for bid in history %}
        <li>{{ bid.name }} - {{ bid.end_date }}</li>
    {% endfor %}
</ul>