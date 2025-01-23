<h1>Modifier l'Enchère</h1>
<form action="/enchere/update/<?= $enchere['id_enchere'] ?>" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($enchere['nom']) ?>" required>

    <label for="prix_debut">Prix de Départ :</label>
    <input type="number" id="prix_debut" name="prix_debut" step="0.01" value="<?= $enchere['prix_debut'] ?>" required>

    <label for="date_debut">Date de Début :</label>
    <input type="datetime-local" id="date_debut" name="date_debut" value="<?= $enchere['date_debut'] ?>" required>

    <label for="date_fin">Date de Fin :</label>
    <input type="datetime-local" id="date_fin" name="date_fin" value="<?= $enchere['date_fin'] ?>" required>

    <label for="id_timbre">ID Timbre :</label>
    <input type="number" id="id_timbre" name="id_timbre" value="<?= $enchere['id_timbre'] ?>" required>

    <button type="submit">Enregistrer</button>
</form>