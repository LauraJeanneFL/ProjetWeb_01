<form action="{{ BASE }}/enchere/upload" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Choisir une image :</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="id_timbre" value="{{ id_timbre }}"> <!-- ID du timbre associé -->
    <input type="submit" value="Téléverser" name="submit">
</form>