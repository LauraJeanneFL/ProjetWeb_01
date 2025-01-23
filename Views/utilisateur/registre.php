<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="/utilisateur/store" method="POST">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" required>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>