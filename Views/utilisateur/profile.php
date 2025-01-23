<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Profil utilisateur</h1>
    <p>Nom : <?= htmlspecialchars($utilisateur['nom']) ?></p>
    <p>Prénom : <?= htmlspecialchars($utilisateur['prenom']) ?></p>
    <p>Email : <?= htmlspecialchars($utilisateur['email']) ?></p>

    <h2>Historique des enchères</h2>
    <ul>
        <?php foreach ($historique as $enchere): ?>
            <li><?= htmlspecialchars($enchere['nom']) ?> - <?= htmlspecialchars($enchere['date_fin']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>