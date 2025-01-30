{{ include('layouts/header.php') }}
<form action="{{ BASE }}/enchere/store" method="POST" enctype="multipart/form-data">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" required>

    <label for="prix">Prix :</label>
    <input type="number" name="prix" required>

    <label for="date_fin">Date de fin :</label>
    <input type="datetime-local" name="date_fin" required>

    <label for="image">Image :</label>
    <input type="file" name="image" required>

    <button type="submit">Créer Enchère</button>
</form>
{{ include('layouts/footer.php') }}