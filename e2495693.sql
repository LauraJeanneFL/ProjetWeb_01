-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 jan. 2025 à 04:26
-- Version du serveur : 10.11.6-MariaDB-0+deb12u1
-- Version de PHP : 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e2495693`
--

-- --------------------------------------------------------

--
-- Structure de la table `condition`
--

CREATE TABLE `condition` (
  `id_condition` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL COMMENT 'Texte descriptif (ex. Parfaite, Excellente)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `condition`:
--

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

CREATE TABLE `couleur` (
  `id_couleur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `couleur`:
--

-- --------------------------------------------------------

--
-- Structure de la table `dimension`
--

CREATE TABLE `dimension` (
  `id_dimensions` int(11) NOT NULL,
  `largeur` float(5,2) NOT NULL,
  `hauteur` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `dimension`:
--

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE `enchere` (
  `id_enchere` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `prix_debut` decimal(10,2) NOT NULL,
  `coup_coeur_Lord` tinyint(1) DEFAULT NULL,
  `id_timbre` int(11) NOT NULL COMMENT 'Clé étrangère',
  `status` tinyint(1) NOT NULL COMMENT '0 pour “terminée”, 1 pour “en cours”'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `enchere`:
--   `id_timbre`
--       `timbre` -> `id_timbre`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_timbre` int(11) DEFAULT NULL,
  `id_enchere` int(11) DEFAULT NULL,
  `date_favori` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `favoris`:
--   `id_utilisateur`
--       `utilisateur` -> `id_utilisateur`
--   `id_timbre`
--       `timbre` -> `id_timbre`
--   `id_enchere`
--       `enchere` -> `id_enchere`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_timbre` int(11) NOT NULL,
  `chemin_image` text NOT NULL,
  `principale` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `image`:
--   `id_timbre`
--       `timbre` -> `id_timbre`
--

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `pays`:
--

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom`) VALUES
(2, 'Angleterre'),
(1, 'Canada'),
(3, 'États-Unis'),
(4, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `timbre`
--

CREATE TABLE `timbre` (
  `id_timbre` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `tirage` int(11) NOT NULL COMMENT 'Nombre d’exemplaires du tirage du timbre. ',
  `certifier` tinyint(1) NOT NULL COMMENT 'Indique si le timbre est certifié ou non.',
  `id_pays` int(11) NOT NULL,
  `id_dimensions` int(11) NOT NULL,
  `id_condition` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `timbre`:
--   `id_pays`
--       `pays` -> `id_pays`
--   `id_dimensions`
--       `dimension` -> `id_dimensions`
--   `id_condition`
--       `condition` -> `id_condition`
--   `id_utilisateur`
--       `utilisateur` -> `id_utilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `timbre_couleur`
--

CREATE TABLE `timbre_couleur` (
  `id_timbre` int(11) NOT NULL,
  `id_couleur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `timbre_couleur`:
--   `id_timbre`
--       `timbre` -> `id_timbre`
--   `id_couleur`
--       `couleur` -> `id_couleur`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_inscription` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `utilisateur`:
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_enchere`
--

CREATE TABLE `utilisateur_enchere` (
  `id_utilisateur` int(11) NOT NULL,
  `id_enchere` int(11) NOT NULL,
  `date_participation` date NOT NULL,
  `prix_de_fin` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONS POUR LA TABLE `utilisateur_enchere`:
--   `id_utilisateur`
--       `utilisateur` -> `id_utilisateur`
--   `id_enchere`
--       `enchere` -> `id_enchere`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id_condition`);

--
-- Index pour la table `couleur`
--
ALTER TABLE `couleur`
  ADD PRIMARY KEY (`id_couleur`),
  ADD UNIQUE KEY `couleurs` (`nom`);

--
-- Index pour la table `dimension`
--
ALTER TABLE `dimension`
  ADD PRIMARY KEY (`id_dimensions`);

--
-- Index pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`id_enchere`),
  ADD KEY `id_timbre` (`id_timbre`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_timbre` (`id_timbre`),
  ADD KEY `id_enchere` (`id_enchere`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_timbre` (`id_timbre`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD UNIQUE KEY `pays_origine` (`nom`);

--
-- Index pour la table `timbre`
--
ALTER TABLE `timbre`
  ADD PRIMARY KEY (`id_timbre`),
  ADD KEY `id_pays` (`id_pays`),
  ADD KEY `id_dimensions` (`id_dimensions`),
  ADD KEY `id_condition` (`id_condition`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `timbre_couleur`
--
ALTER TABLE `timbre_couleur`
  ADD PRIMARY KEY (`id_timbre`,`id_couleur`),
  ADD KEY `id_couleur` (`id_couleur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `id_utilisateur` (`email`);

--
-- Index pour la table `utilisateur_enchere`
--
ALTER TABLE `utilisateur_enchere`
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_enchere` (`id_enchere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `condition`
--
ALTER TABLE `condition`
  MODIFY `id_condition` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `couleur`
--
ALTER TABLE `couleur`
  MODIFY `id_couleur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `dimension`
--
ALTER TABLE `dimension`
  MODIFY `id_dimensions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `id_enchere` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `timbre`
--
ALTER TABLE `timbre`
  MODIFY `id_timbre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`id_timbre`) REFERENCES `timbre` (`id_timbre`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_timbre`) REFERENCES `timbre` (`id_timbre`),
  ADD CONSTRAINT `favoris_ibfk_3` FOREIGN KEY (`id_enchere`) REFERENCES `enchere` (`id_enchere`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_timbre`) REFERENCES `timbre` (`id_timbre`);

--
-- Contraintes pour la table `timbre`
--
ALTER TABLE `timbre`
  ADD CONSTRAINT `timbre_ibfk_2` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `timbre_ibfk_3` FOREIGN KEY (`id_dimensions`) REFERENCES `dimension` (`id_dimensions`),
  ADD CONSTRAINT `timbre_ibfk_4` FOREIGN KEY (`id_condition`) REFERENCES `condition` (`id_condition`),
  ADD CONSTRAINT `timbre_ibfk_5` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `timbre_couleur`
--
ALTER TABLE `timbre_couleur`
  ADD CONSTRAINT `timbre_couleur_ibfk_1` FOREIGN KEY (`id_timbre`) REFERENCES `timbre` (`id_timbre`),
  ADD CONSTRAINT `timbre_couleur_ibfk_2` FOREIGN KEY (`id_couleur`) REFERENCES `couleur` (`id_couleur`);

--
-- Contraintes pour la table `utilisateur_enchere`
--
ALTER TABLE `utilisateur_enchere`
  ADD CONSTRAINT `utilisateur_enchere_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `utilisateur_enchere_ibfk_2` FOREIGN KEY (`id_enchere`) REFERENCES `enchere` (`id_enchere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
