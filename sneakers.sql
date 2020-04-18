-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 15:04
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `items`
--

-- --------------------------------------------------------

--
-- Structure de la table `sneakers`
--

DROP TABLE IF EXISTS `sneakers`;
CREATE TABLE IF NOT EXISTS `sneakers` (
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `vente` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `photo` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prixActuel` int(11) NOT NULL,
  `tempsRestant` date NOT NULL,
  `etat` int(11) NOT NULL,
  `vendeur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sneakers`
--

INSERT INTO `sneakers` (`nom`, `description`, `categorie`, `vente`, `prix`, `photo`, `id`, `prixActuel`, `tempsRestant`, `etat`, `vendeur`) VALUES
('jordan1 fragment', 'jordan x fragment', 'sneakers', 'encheres', 3500, 'C:\\wamp64\\www\\ecebay\\fragment.jpg', 1, 0, '0000-00-00', 0, 0),
('jordan1 chicago', 'offwhite x nike', 'sneakers', 'meilleure offre', 3800, 'C:\\wamp64\\www\\ecebay\\chicago.jpg', 3, 1200, '2020-04-30', 0, 0),
('jordan 1 bred toe ', 'collection black toe ', 'sneakers', 'encheres', 450, 'C:\\wamp64\\www\\ecebay\\bredtoe.jpg', 2, 0, '0000-00-00', 0, 0),
('jordan 1 unc', 'offwhite x nike', 'sneakers', 'offre', 2400, 'C:\\wamp64\\www\\ecebay\\unc.jpg', 12, 0, '0000-00-00', 0, 0),
('jordan1 pinegreen', 'collection black toe', 'sneakers', 'encheres', 350, 'C:\\wamp64\\www\\ecebay\\pinegreen.jpg', 13, 0, '0000-00-00', 0, 0),
('jordan1 off white nrg', 'offwhite x jordan', 'sneakers', 'encheres', 5000, 'C:\\wamp64\\www\\ecebay\\nrg.jpg', 14, 0, '0000-00-00', 0, 0),
('jordan1 dior', 'dior x nike', 'sneakers', 'encheres', 2000, 'C:\\wamp64\\www\\ecebay\\jordan1dior.jpg', 16, 0, '0000-00-00', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
