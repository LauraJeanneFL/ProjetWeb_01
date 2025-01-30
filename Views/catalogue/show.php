{{ include('layouts/header.php') }}
<div class="container">
    <h1>Détails de l'enchère</h1>
    {% if message %}
        <p>{{ message }}</p>
    {% else %}
        <h2>{{ enchere.nom }}</h2>
        <p>Date de début : {{ enchere.date_debut }}</p>
        <p>Date de fin : {{ enchere.date_fin }}</p>
        <p>Prix de départ : {{ enchere.prix_debut }}</p>
    {% endif %}
</div>
{{ include('layouts/footer.php') }}
