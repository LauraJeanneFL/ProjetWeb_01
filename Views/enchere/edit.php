
<h1>Modifier une enchère</h1>
<form action="/enchere/update/{{ enchere.id_enchere }}" method="POST">
    <label for="nom">Nom de l'enchère</label>
    <input type="text" id="nom" name="nom" value="{{ enchere.nom }}" required>

    <label for="prix_debut">Prix de départ</label>
    <input type="number" id="prix_debut" name="prix_debut" value="{{ enchere.prix_debut }}" required>

    <label for="date_debut">Date de début</label>
    <input type="date" id="date_debut" name="date_debut" value="{{ enchere.date_debut }}" required>

    <label for="date_fin">Date de fin</label>
    <input type="date" id="date_fin" name="date_fin" value="{{ enchere.date_fin }}" required>

    <button type="submit">Mettre à jour</button>
</form>
