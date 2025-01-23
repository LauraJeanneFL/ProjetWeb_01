<h1>Liste des Enchères</h1>
<a href="/enchere/create">Ajouter une enchère</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix de Départ</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($encheres as $enchere): ?>
            <tr>
                <td><?= $enchere['id_enchere'] ?></td>
                <td><?= htmlspecialchars($enchere['nom']) ?></td>
                <td><?= $enchere['prix_debut'] ?></td>
                <td><?= $enchere['date_debut'] ?></td>
                <td><?= $enchere['date_fin'] ?></td>
                <td>
                    <a href="/enchere/edit/<?= $enchere['id_enchere'] ?>">Modifier</a>
                    <a href="/enchere/delete/<?= $enchere['id_enchere'] ?>" 
                       onclick="return confirm('Voulez-vous vraiment supprimer cette enchère ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>