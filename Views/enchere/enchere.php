{% extends "layout/base.twig" %}
<h1>Liste des Enchères</h1>
<a href="/enchere/create">Ajouter une enchère</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix de départ</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for enchere in encheres %}
        <tr>
            <td>{{ enchere.id_enchere }}</td>
            <td>{{ enchere.nom }}</td>
            <td>{{ enchere.prix_debut }}</td>
            <td>{{ enchere.date_debut }}</td>
            <td>{{ enchere.date_fin }}</td>
            <td>
                <a href="/enchere/edit/{{ enchere.id_enchere }}">Modifier</a>
                <a href="/enchere/delete/{{ enchere.id_enchere }}">Supprimer</a>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
