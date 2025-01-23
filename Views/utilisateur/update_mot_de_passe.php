<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau mot de passe</title>
</head>
<body>
    <h1>Nouveau mot de passe</h1>
    <form action="/utilisateur/resetPassword" method="POST">
        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" name="password" required>
        <button type="submit">Changer le mot de passe</button>
    </form>
</body>
</html>