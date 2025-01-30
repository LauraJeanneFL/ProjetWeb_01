{{include('layouts/header.php')}}
<form action="{{ BASE }}/timbre/ajouter" method="post" enctype="multipart/form-data">
    <label for="nom">Nom du timbre :</label>
    <input type="text" name="nom" required>

    <label for="date_creation">Date de création :</label>
    <input type="date" name="date_creation" required>

    <label for="tirage">Tirage :</label>
    <input type="number" name="tirage" required>

    <label for="image">Image :</label>
    <input type="file" name="image" required>

    <button type="submit">Ajouter le timbre</button>
</form>
{{include('layouts/footer.php')}}