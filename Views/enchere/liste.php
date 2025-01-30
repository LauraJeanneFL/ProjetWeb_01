<pre>
{{ dump(encheres) }}
</pre>
{{ include('layouts/header.php') }}
<form method="GET" action="{{ BASE }}/enchere/recherche">
    <input type="text" name="query" placeholder="Rechercher une enchère..." required>
    <button type="submit">Rechercher</button>
</form>

<div class="container">
    <h1>Enchères Actives</h1>
    
    {% for enchere in encheres %}
        {% set date_fin = enchere.date_fin|date("U") %}
        {% set now = "now"|date("U") %}
        
        {% if date_fin - now < 3600 %}
            <p style="color: red;">⚠️ L'enchère "{{ enchere.nom }}" se termine bientôt !</p>
        {% endif %}

    {% endfor %}

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Prix Début</th>
                <th>Actions</th>
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
                <td>
                    {% if enchere.chemin_image %}
                        <img src="{{ BASE }}/{{ enchere.chemin_image }}" alt="{{ enchere.nom }}" width="100">
                    {% else %}
                        <img src="{{ BASE }}/public/images-optimisees/Timbres/default.jpg" alt="Image par défaut" width="100">
                    {% endif %}
                </td>
                <td>
                    <a href="{{ BASE }}/enchere/edit?id={{ enchere.id_enchere }}">Modifier</a>
                    <a href="{{ BASE }}/enchere/delete?id={{ enchere.id_enchere }}">Supprimer</a>
                </td>
            </tr>
            {% else %}
            <tr>
                <td colspan="7">Aucune enchère active trouvée.</td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
</div>
{{ include('layouts/footer.php') }}