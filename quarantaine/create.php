{{include('layouts/header.php')}}
<div class="container">
    <h1>Créer une nouvelle enchère</h1>
    <form method="post">
        <label for="nom">Nom de lenchère</label>
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
{{include('layouts/footer.php')}}