{{include('layouts/header.php')}}
<div class="container">
    <h1>Enchères Actives</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Prix Début</th>
            </tr>
        </thead>
        <tbody>
            {% for enchere in encheres %}
            <tr>
                <td>{{ enchere.id_enchere }}</td>
                <td>{{ enchere.nom }}</td>
                <td>{{ enchere.date_debut }}</td>
                <td>{{ enchere.date_fin }}</td>
                <td>{{ enchere.prix_debut }}</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
{% endblock %}
{{include('layouts/footer.php')}}