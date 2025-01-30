{{ include('layouts/header.php') }}
<main>
    <h1>Profil utilisateur</h1>
    <p>Bienvenue sur votre profil, {{ session.user }} !</p>

    {% if user %}
        <p>Nom d’utilisateur : {{ user.prenom }} {{ user.nom }}</p>
        <p>Email : {{ user.email }}</p>
    {% else %}
        <p>Les informations de l'utilisateur ne sont pas disponibles.</p>
    {% endif %}

    <h2>Historique des enchères</h2>
    <ul>
        {% for bid in history %}
            <li>{{ bid.name }} - {{ bid.end_date }}</li>
        {% else %}
            <li>Aucune enchère trouvée.</li>
        {% endfor %}
    </ul>
</main>
{{ include('layouts/footer.php') }}