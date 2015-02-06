-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 24 Janvier 2015 à 10:28
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `worldwidefood`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id_categorie` int(10) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `nom`) VALUES
(1, 'Italien'),
(2, 'Mexiquain');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id_produit` int(10) NOT NULL,
  `id_categorie` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id_produit`, `id_categorie`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id_client` int(10) NOT NULL,
  `pseudo` varchar(20) CHARACTER SET utf8 NOT NULL,
  `motdepasse` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `adresse` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `pseudo`, `motdepasse`, `nom`, `prenom`, `email`, `adresse`) VALUES
(2, 'testInsertLogin', 'testInsertMDP', 'testInsertNom', 'testInsertPrenom', 'testInsertEmail', 'testInsertAdresse'),
(3, 'testInsertLogin', 'testInsertMDP', 'testInsertNom', 'testInsertPrenom', 'testInsertEmail', 'testInsertAdresse'),
(4, 'testInsertLogin', 'testInsertMDP', 'testInsertNom', 'testInsertPrenom', 'testInsertEmail', 'testInsertAdresse'),
(5, 'testInsertLogin', 'testInsertMDP', 'testInsertNom', 'testInsertPrenom', 'testInsertEmail', 'testInsertAdresse'),
(6, 'testInsertLogin', 'testInsertMDP', 'testInsertNom', 'testInsertPrenom', 'testInsertEmail', 'testInsertAdresse');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(10) NOT NULL,
  `id_ligne` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `datePassageCommande` date DEFAULT NULL,
  `dateCreationCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `coupdecoeur`
--

CREATE TABLE IF NOT EXISTS `coupdecoeur` (
`id_coupCoeur` int(10) NOT NULL,
  `id_produit` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `coupdecoeur`
--

INSERT INTO `coupdecoeur` (`id_coupCoeur`, `id_produit`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lignescommandes`
--

CREATE TABLE IF NOT EXISTS `lignescommandes` (
`id_ligne` int(10) NOT NULL,
  `id_produit` int(10) NOT NULL,
  `quantite` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
`id_produit` int(10) NOT NULL,
  `nom` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom`, `description`, `prix`) VALUES
(1, 'Chili con carne', 'Chili con carne fait avec des haricots rouge, du piment et de la viande.', 10),
(2, 'Pâte à la carbonara', 'Pâte à la carbonara original. A base de tagliatelles, pancetta, oeuf et poivre', 5);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `categorie_produit`
--
ALTER TABLE `categorie_produit`
 ADD PRIMARY KEY (`id_produit`,`id_categorie`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
 ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `coupdecoeur`
--
ALTER TABLE `coupdecoeur`
 ADD PRIMARY KEY (`id_coupCoeur`);

--
-- Index pour la table `lignescommandes`
--
ALTER TABLE `lignescommandes`
 ADD PRIMARY KEY (`id_ligne`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
 ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id_categorie` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
MODIFY `id_client` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `coupdecoeur`
--
ALTER TABLE `coupdecoeur`
MODIFY `id_coupCoeur` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `lignescommandes`
--
ALTER TABLE `lignescommandes`
MODIFY `id_ligne` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
MODIFY `id_produit` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
