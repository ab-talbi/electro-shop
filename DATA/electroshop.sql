-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 juin 2022 à 14:27
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `electroshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id_produit` int(11) NOT NULL,
  `adresse_ip` varchar(255) NOT NULL,
  `quantite` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `carte_backup`
--

CREATE TABLE `carte_backup` (
  `id_carte_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte_backup`
--

INSERT INTO `carte_backup` (`id_carte_commande`, `id_produit`, `quantite`) VALUES
(1570885650, 12, 20);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom_categorie`) VALUES
(12, 'test3'),
(13, 'TV');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `a_payer` float NOT NULL,
  `random_cmd` int(100) NOT NULL,
  `nombre_produits` int(100) NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_commande` varchar(100) NOT NULL,
  `remise` int(4) NOT NULL,
  `total_a_payer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_utilisateur`, `a_payer`, `random_cmd`, `nombre_produits`, `date_commande`, `status_commande`, `remise`, `total_a_payer`) VALUES
(21, 9, 41999.8, 1570885650, 20, '2022-06-08 23:50:37', 'Après Livraison', 0, 41999.8);

-- --------------------------------------------------------

--
-- Structure de la table `commande_incomplete`
--

CREATE TABLE `commande_incomplete` (
  `id_commande` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `random_cmd` int(255) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(255) NOT NULL,
  `status_commande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id_marque` int(11) NOT NULL,
  `nom_marque` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `nom_marque`) VALUES
(6, 'google'),
(7, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Structure de la table `paiement_utilisateur`
--

CREATE TABLE `paiement_utilisateur` (
  `id_paiement` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `random_cmd` int(11) NOT NULL,
  `a_payer` int(11) NOT NULL,
  `mode_paiement` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `description_produit` varchar(255) NOT NULL,
  `mots_cles` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `produit_image1` varchar(255) NOT NULL,
  `produit_image2` varchar(255) NOT NULL,
  `produit_image3` varchar(255) NOT NULL,
  `produit_image4` varchar(255) NOT NULL,
  `produit_image5` varchar(255) NOT NULL,
  `prix_produit` double NOT NULL,
  `status_produit` varchar(50) NOT NULL DEFAULT 'disponible',
  `date_produit` timestamp NOT NULL DEFAULT current_timestamp(),
  `stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `description_produit`, `mots_cles`, `id_categorie`, `id_marque`, `produit_image1`, `produit_image2`, `produit_image3`, `produit_image4`, `produit_image5`, `prix_produit`, `status_produit`, `date_produit`, `stock`) VALUES
(11, 'maps', 'dddddddddddddddddddddddddddbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', 'ecran tv ', 12, 6, 'google-maps.png', '', '', '', '', 1299.99, 'pas disponible', '2022-06-06 13:42:44', 0),
(12, 'TV samsung', 'TV SAMSUNG50 puce...', 'tv samsung cootia', 13, 7, 'samsung50.jpeg', 'Xiaomi-Mi-Smart-TV-4S-65.png', 'appleimac.jpeg', 'ecouteur_sans_fil_0.jpg', 'ecouteur_sans_fil_1.jpg', 2099.99, 'disponible', '2022-06-08 22:37:54', 30);

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL,
  `nom_remise` varchar(255) NOT NULL,
  `pourcentage_remise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom_utilisateur` varchar(100) NOT NULL,
  `email_utilisateur` varchar(100) NOT NULL,
  `mot_passe_utilisateur` varchar(255) NOT NULL,
  `image_utilisateur` varchar(255) NOT NULL,
  `ip_utilisateur` varchar(100) NOT NULL,
  `adresse_utilisateur` varchar(100) NOT NULL,
  `tel_utilisateur` varchar(20) NOT NULL,
  `verification_code` text NOT NULL,
  `verifie` int(11) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `email_utilisateur`, `mot_passe_utilisateur`, `image_utilisateur`, `ip_utilisateur`, `adresse_utilisateur`, `tel_utilisateur`, `verification_code`, `verifie`, `role`) VALUES
(9, 'YASSINE', 'Smail', 'ismailidyassine@gmail.com', '$2y$10$gnrSHJeSZPl3YPzQ2hQkA.P7/Vhl7Oq4NJsiNbGI3FtJw0jORLVUS', '', '::1', 'DR LAATAOUNA TAMESLOHT EL HAOUZ MARRAKECH MAROC AFRICA IGHIL AHL TIFNOUT OUZIOUA', '+212631817057', '584844', 1, 1),
(11, 'idyassine', 'smail', 'ismailidyassin@gmail.com', '$2y$10$sXCgDo89t3i.twAlRq9GOeZ9DisjZWKLgChceFGLO4DiMfNeic69.', '', '::1', 'DR LAARAOUNA TAMESLOHT EL HAOUZ MARRAKECH', '0648591294', '916513', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `paiement_utilisateur`
--
ALTER TABLE `paiement_utilisateur`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_marque` (`id_marque`);

--
-- Index pour la table `remise`
--
ALTER TABLE `remise`
  ADD PRIMARY KEY (`id_remise`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `paiement_utilisateur`
--
ALTER TABLE `paiement_utilisateur`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `remise`
--
ALTER TABLE `remise`
  MODIFY `id_remise` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id_marque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
