{% extends 'layout/base' %}

{% block title %}Créer une nouvelle enchère{% endblock %}

{% block content %}
<h1>Créer une nouvelle enchère</h1>
<form action="{{ path('enchere_store') }}" method="POST">
    <label for="nom">Nom de l'enchère</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prix_debut">Prix de départ</label>
    <input type="number" id="prix_debut" name="prix_debut" required>

    <label for="date_debut">Date de début</label>
    <input type="date" id="date_debut" name="date_debut" required>

    <label for="date_fin">Date de fin</label>
    <input type="date" id="date_fin" name="date_fin" required>

    <button type="submit">Créer</button>
</form>
{% endblock %}