-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 sep. 2019 à 15:42
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `proposition`
--

CREATE TABLE `proposition` (
  `id` int(255) NOT NULL,
  `nom_proposition` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_proposition` text CHARACTER SET utf8 NOT NULL,
  `date_proposition` date NOT NULL,
  `like_proposition` int(255) NOT NULL,
  `dislike_proposition` int(255) NOT NULL,
  `publication_proposition` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `proposition`
--

INSERT INTO `proposition` (`id`, `nom_proposition`, `description_proposition`, `date_proposition`, `like_proposition`, `dislike_proposition`, `publication_proposition`) VALUES
(1, 'test', 'test', '2019-09-12', 0, 0, '0000-00-00 00:00:00'),
(2, 'sos', 'tous bourré\r\n', '2019-09-11', 0, 0, '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `proposition`
--
ALTER TABLE `proposition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `proposition`
--
ALTER TABLE `proposition`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
