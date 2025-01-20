# Conception et programmation de sites Web 582-32W-MA - Projet Web 1

## Stampee — Devis d’appel d’offre

Ce projet consiste à créer un site web avec les technologies (HTML, CSS, JavaScript, PHP MVC). Le projet sera structuré avec la méthodologie agile (SCRUM).

## Mise en contexte

Lord Reginald Stampee, duc de Worcessteshear et philatéliste depuis sa tendre enfance au milieu des années cinquante, vous a choisi pour le développement d’une plateforme d’enchères de timbres. Depuis plusieurs années, Lord Stampee caresse l'idée de faire le pas dans le numérique et étendre au-delà du Royaume-Uni ses fameuses enchères de timbres qui font accourir les plus grands philatélistes du monde. Les requis établis par Lord Stampee lui-même sont présentés ci-bas.
Assurez-vous de bien répondre à ses demandes. Lord Reginald Stampee n’apprécie guère que ses consignes ne soient pas respectées. Nous préférons vous en avertir.

## Objectifs de la plateforme d’enchères « Stampee »

1. Tenir des enchères où tout membre peut publier des enchères et placer des mises.
2. Trouver rapidement des enchères précises, présentes ou passées.
3. Être accessible universellement, sur tout appareil.

## Requis de la plateforme d’enchères « Stampee »

Seulement les requis pour l’interface publique sont considérés ici, les requis pour l’interface
d’administration le seront après cette première phase de notre projet.

## Fonctionnalités

### Gérer des comptes de membres

La plateforme doit permettre à tout usager intéressé de devenir membre pour ainsi prendre part aux enchères. Le membre devrait avoir accès à des informations pertinentes sur son profil d’acheteur et son historique d’offres.

### Publier des enchères

Chaque membre doit pouvoir publier des enchères.

### Enchères

Chaque membre doit pouvoir sélectionner ses enchères favorites et les visualiser.

### Coups de coeur de Lord

Il s’agit des enchères recommandées par Lord, on doit pouvoir accéder à cette liste depuis la page accueil, notez qu’il y a un attribut “Coups de coeur de Lord” dans l’entité Enchère.

### Trouver rapidement une enchère

La plateforme doit permettre à tout usager de parcourir les enchères, actives ou archivées, en fonction de ses intérêts pour lui faciliter la tâche de trouver le timbre qui lui fait envie. Ses intérêts, sans être exhaustif, sont de l’ordre du pays d’origine, de l’année de publication, de la condition, etc.

### Placer des offres

La plateforme doit permettre à tout membre de placer des offres, à répétition s’il le souhaite, sur une ou des enchères. Les offres en cours et leur état devraient être accessibles dans la section « Profil » du membre.

### « Voir les timbres de proche »

Souhait spécial de Lord Stampee, la plateforme doit permettre de « voir les timbres de proche ». À vous de voir comment interpréter cette demande mais probablement que la possibilité de « zoomer » à l’intérieur des timbres pourrait exaucer ce souhait à prendre au sérieux.

### Une navigation « simple comme un timbre »

Deuxième souhait spécial de Lord Stampee, la plateforme doit permettre de naviguer de pages en pages (surtout deux les pages les plus importantes) simplement. Il faudra très probablement proposer une navigation en niveaux.

### Archives des enchères passées

La plateforme doit permettre de consulter les enchères archivées. Elle doit aussi permettre à l’usager de trouver rapidement l’enchère désirée, de la même façon qu’elle le fait pour les enchères en cours. La possibilité de pouvoir commenter les enchères archivées pourrait nous intéresser.

### Contenu

Certains contenus sont nécessaires au bon fonctionnement de la plateforme. Ces contenus prennent la forme d’entités telles que « Timbre » et « Enchère ». Nous en avons besoin pour communiquer les données pertinentes aux usagers tentés de placer une offre. Leur modèle de données initial est présenté ci-dessous. Soyez à l’aise de suggérer des ajouts si vous en voyez la pertinence dans l’interface.

#### Entité « Timbre »

- Nom
- Date de création
- Couleur(s)
- Pays d’origine
- Images
    o Image principale
    o Images supplémentaires
- Condition
    o Parfaite
    o Excellente
    o Bonne
    o Moyenne
    o Endommagé
- Tirage
- Dimensions
- Certifié
    o Oui
    o Non

#### Entité « Enchère »

- Période d’activité
    o Date de début
    o Date de fin
- Prix plancher
- Coups de cœur du Lord
Les entités définies ci-dessus sont requises au minimum. Il se pourrait que d’autres besoins émergent
en cours de conception. Nous vous rappelons que nous sommes aussi ouverts aux propositions.

### Pages

Voici quelques pages dont l’interface doit être maquettée à des fins de présentation à Lord Stampee. Les pages secondaires elles, n’ont pas besoin d’être maquettées mais doivent être considérées dans la navigation.

#### Fiche d’enchère

La fiche d'enchères doit mettre de l’avant le modèle de données derrière une entité « Timbre » et une autre entité « Enchère ». Toutes les informations pertinentes à propos du timbre doivent être affichées ici. Il va en de même de l’enchère en tant que telle.
« Voir les timbres de proche » et « Placer des offres » devraient être possibles ici.

#### Portail des enchères

Le portail des enchères doit présenter toutes les enchères en cours d’un côté mais aussi les enchères archivées de l’autre. Nous croyons qu’il s’agisse de pages séparées d’un point de vue de la navigation mais intégrant essentiellement les mêmes fonctionnalités et la même composition.
« Trouver rapidement une enchère » devrait être possible ici.

#### Accueil

L’accueil de la plateforme doit mettre de l’avant sa mission, présenter les offres en cours (de ~4 à ~12), notamment les offres vedettes ». Une présentation sommaire de Lord Stampee devrait suivre ainsi qu’un aperçu des actualités récentes.
Nous sommes ouverts aux suggestions. En fait, nous désirons que vous nous proposiez au minimum une suggestion pour l’accueil. C’est vous les pros, après tout.

### Pages secondaires

Les pages ci-dessous ne doivent pas être maquettées (pour l’instant) mais doivent être prises en compte dans la conception de la navigation. Mis à part « À propos de Lord Reginald Stampee III » nous sommes ouverts à revoir les libellés ci-dessous.

- Devenir membre
- Se connecter
    o Votre profil
- À propos de Lord Reginald Stampee III
    o La philatélie, c’est la vie.
    o Biographie du Lord
    o Historique familial
- Actualités
    o Timbres
    o Enchères
    o Bridge
- Fonctionnement de la plateforme
    o Aide « Profil »
    o Aide « Comment placer une offre »
    o Aide « Suivre une enchère »
    o Aide « Trouver l’enchère désirée »
    o Contacter le webmestre
- Contactez-nous
    o Angleterre
    o Canada
    o US
    o Australie
    o Termes et conditions

### Esthétique

Lord Stampee vous fait entièrement confiance quant à l’allure de l’interface. Ce n’est pas de son ressort croit-il. Quand même, il s’attend au minimum à ce qui suit.

#### Le rouge ou le bleu

Fier anglais, Lord Reginald Stampee demeure convaincu que le bleu et le rouge sont les meilleures couleurs. Il s’attend à voir l’une ou l’autre à l’honneur dans l’interface.

#### Classique et soigné

Lord Stampee est d’un naturel traditionnel, classique. Tout comme ses amis philatélistes le sont aussi, par ailleurs. La clientèle cible, en général, devrait s’attendre à une interface épurée, soignée où la couleur est appliquée avec parcimonie. Le clair sur sombre ou le sombre sur clair sont envisageables.

#### Simple, cohérent, uniforme

La composition, les effets d’interactions, le rythme des éléments de l’interface, les composantes, tout quoi, se doit d’être simple, cohérent et uniforme. Lord Stampee possède un œil de vieux loup, comme il aime si bien le dire, et ne tolérera aucune incongruité dans vos choix. Soyez rigoureux.

-------------------------------------------------------------------------------

## SPRINT 0 : vous allez préparer ce qui est nécessaire pour la réalisation du projet. Charte projet

Vous devez présenter une charte de projet, selon la date de remise définie dans le cahier des charges.
La charte projet doit contenir les points suivants :

- La vision du projet;
- La charte graphique (la typographie, les couleurs, l’iconographie);
- Les maquettes de la section 'publique';
- Un document présentant la modélisation de la base de données;
- Le « Product Backlog » avec les taches priorisées
- Présenter les tâches du premier sprint du site web à réaliser « Sprint backlog ».

## SPRINT 1

- Le « sprint backlog » avec le nombre d’heures réellement passé sur chaque tâche, il faut préciser pour chaque tâche si elle a été finalisée ou pas;
- Le « sprint backlog » du prochain sprint qui doit contenir les tâches non finalisées du sprint1;
- Le produit en ligne dont les tâches prioritaires du « sprint backlog » ont été implémentées,
testées et validées;
- MPD mis à jour.
Remise : selon la date définie dans le cahier de charges.

## SPRINT 2

- Le « sprint backlog » mis à jour avec le nombre d’heures réellement passé sur chaque tâche. Il faut préciser pour chaque tâche si elle a été finalisée ou pas;
- Le « sprint backlog » du prochain sprint qui doit contenir les tâches non finalisées du sprint2 ;
- Le produit en ligne dont les tâches prioritaires du « sprint backlog » ont été implémentées,
testées et validées;
- MPD mis à jour.
Remise : selon la date définie dans le cahier de charges.

## SPINT 3

- Le « sprint backlog » mis à jour avec le nombre d’heures réellement passé sur chaque tâche. Il faut préciser pour chaque tâche si elle a été finalisée ou pas;
Conception et programmation de sites Web 582-32W-MA - Projet Web 1
- MPD mis à jour;
- Le guide utilisateur de la partie administration;
- La présentation du projet en 10 minutes.
- Le produit en ligne dont les tâches prioritaires du « sprint backlog » ont été implémentées,
testées et validées;

Remise : selon la date définie dans le cahier des charges.
