-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 07 juil. 2023 à 18:20
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `gestion_atelier_php_221`
--

-- --------------------------------------------------------

--
-- Structure de la table `appro`
--

CREATE TABLE `appro` (
  `id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `dateAppro` date NOT NULL,
  `fournisseur` varchar(25) NOT NULL,
  `paiement` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article_confection`
--

CREATE TABLE `article_confection` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `prixAchat` float NOT NULL,
  `qteStock` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `categorieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `detail_appro_article_conf`
--

CREATE TABLE `detail_appro_article_conf` (
  `id` int(11) NOT NULL,
  `qteAppro` int(11) NOT NULL,
  `articleConfId` int(11) NOT NULL,
  `approId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appro`
--
ALTER TABLE `appro`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article_confection`
--
ALTER TABLE `article_confection`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`),
  ADD KEY `categorieId` (`categorieId`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `detail_appro_article_conf`
--
ALTER TABLE `detail_appro_article_conf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleConfId` (`articleConfId`),
  ADD KEY `approId` (`approId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appro`
--
ALTER TABLE `appro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `article_confection`
--
ALTER TABLE `article_confection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_appro_article_conf`
--
ALTER TABLE `detail_appro_article_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article_confection`
--
ALTER TABLE `article_confection`
  ADD CONSTRAINT `article_confection_ibfk_1` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `detail_appro_article_conf`
--
ALTER TABLE `detail_appro_article_conf`
  ADD CONSTRAINT `detail_appro_article_conf_ibfk_1` FOREIGN KEY (`articleConfId`) REFERENCES `article_confection` (`id`),
  ADD CONSTRAINT `detail_appro_article_conf_ibfk_2` FOREIGN KEY (`approId`) REFERENCES `appro` (`id`);