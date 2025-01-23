<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation de mot de passe</title>
</head>
<body>
    <h1>Réinitialiser le mot de passe</h1>
    <form action="/utilisateur/sendResetLink" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <button type="submit">Envoyer le lien de réinitialisation</button>
    </form>
</body>
</html>