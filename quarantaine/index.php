{{include('layouts/header.php')}}

<h1>Liste des Enchères</h1>
<a href="{{base}}/enchere/create">Ajouter une enchère</a>
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
                <a href="{{base}}/enchere/edit?id={{enchere.id}}">Modifier</a>
                <a href="{{base}}/enchere/editid={{enchere.id}}">Supprimer</a>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{{include('layouts/footer.php')}}
