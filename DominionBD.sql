-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 08 juin 2020 à 16:03
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
-- Base de données :  `dominion`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartes_basiques`
--

DROP TABLE IF EXISTS `cartes_basiques`;
CREATE TABLE IF NOT EXISTS `cartes_basiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Cout` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Effet` varchar(255) DEFAULT NULL,
  `MonnaieDonnee` int(11) NOT NULL,
  `CarteDonnee` int(11) NOT NULL,
  `ActionDonnee` int(11) NOT NULL,
  `AchatDonne` int(11) NOT NULL,
  `JetonPointDonne` int(11) NOT NULL,
  `PointDonne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartes_basiques`
--

INSERT INTO `cartes_basiques` (`id`, `Nom`, `Image`, `Cout`, `Type`, `Effet`, `MonnaieDonnee`, `CarteDonnee`, `ActionDonnee`, `AchatDonne`, `JetonPointDonne`, `PointDonne`) VALUES
(1, 'Cuivre', 'Cuivre.jpg', 0, 'Trésor', NULL, 1, 0, 0, 0, 0, 0),
(2, 'Argent', 'Argent.jpg', 3, 'Trésor', NULL, 2, 0, 0, 0, 0, 0),
(3, 'Or', 'or.jpg', 6, 'Trésor', NULL, 3, 0, 0, 0, 0, 0),
(4, 'Platine', 'platine.jpg', 9, 'Trésor', NULL, 5, 0, 0, 0, 0, 0),
(5, 'Domaine', 'domaine.jpg', 2, 'Trésor', NULL, 0, 0, 0, 0, 0, 1),
(6, 'Duché', 'duche.jpg', 5, 'Trésor', NULL, 0, 0, 0, 0, 0, 3),
(7, 'Province', 'province.jpg', 8, 'Trésor', NULL, 0, 0, 0, 0, 0, 8),
(8, 'Colonie', 'colonie.jpg', 11, 'Trésor', NULL, 0, 0, 0, 0, 0, 10),
(9, 'Malédiction', 'malediction.jpg', 0, 'Malédiction', NULL, 0, 0, 0, 0, 0, -1);

-- --------------------------------------------------------

--
-- Structure de la table `cartes_royaume`
--

DROP TABLE IF EXISTS `cartes_royaume`;
CREATE TABLE IF NOT EXISTS `cartes_royaume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Cout` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Effet` text DEFAULT NULL,
  `MonnaieDonnee` int(11) NOT NULL,
  `CarteDonnee` int(11) NOT NULL,
  `ActionDonnee` int(11) NOT NULL,
  `AchatDonne` int(11) NOT NULL,
  `JetonPointDonne` int(11) NOT NULL,
  `PointDonne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cartes_royaume`
--

INSERT INTO `cartes_royaume` (`id`, `Nom`, `Image`, `Cout`, `Type`, `Effet`, `MonnaieDonnee`, `CarteDonnee`, `ActionDonnee`, `AchatDonne`, `JetonPointDonne`, `PointDonne`) VALUES
(1, 'Douves', '2douves.jpg', 2, 'Action - Réaction', 'Quand un autre joueur joue une carte Attaque, vous pouvez révéler cette carte de votre main pour ne pas être affecté.', 0, 2, 0, 0, 0, 0),
(2, 'Or des fous', '2lordesfous.jpg', 2, 'Trésor - Réaction', 'Vaut 1 si c\'est le premier Or des fous que vous jouez, sinon, vaut 4. \r\n\r\nQuand un autre joueur reçoit une Province, vous pouvez écarter cette carte de votre main pour recevoir un Or et le placer sur votre deck.', 0, 0, 0, 0, 0, 0),
(3, 'Village', '3village.jpg', 3, 'Action', NULL, 0, 1, 2, 0, 0, 0),
(4, 'Évèque', '4eveque.png', 4, 'Action', 'Ecartez une carte de votre main. Recevez un nombre de jetons victoire égal à la moitié de son coût (arrondi inf). \r\nLes autres joueurs peuvent écarter une carte', 1, 0, 0, 0, 1, 0),
(5, 'Mascarade', '3mascarade.jpg', 3, 'Action', 'Chaque joueur passe une carte au joueur suivant. \r\nPuis vous pouvez écarter une carte de votre main', 0, 2, 0, 0, 0, 0),
(6, 'Laboratoire', '5laboratoire.jpg', 5, 'Action', NULL, 0, 2, 1, 0, 0, 0),
(7, 'Grand marché', '6grandmarche.png', 6, 'Action', 'Ne peut être acheté en utilisant des cuivres.', 2, 1, 1, 1, 0, 0),
(8, 'Marché', '5marche.jpg', 5, 'Action', NULL, 1, 1, 1, 1, 0, 0),
(9, 'Agrandissement', '7agrandissement.jpg', 7, 'Action', 'Écartez une carte de votre main et recevez une carte coûtant jusqu\'à 3 de plus.', 0, 0, 0, 0, 0, 0),
(10, 'Renovation', '4renovation.jpg', 4, 'Action', 'Écartez une carte de votre main et recevez une carte coûtant jusqu\'à 2 de plus.', 0, 0, 0, 0, 0, 0),
(11, 'Mine', '5mine.jpg', 5, 'Action', 'Écartez une carte Trésor. Recevez dans votre main une carte Trésor coûtant jusqu\'à 3 de plus.', 0, 0, 0, 0, 0, 0),
(12, 'Sorcière', '5sorciere.jpg', 5, 'Action - Attaque', 'Tous vos adversaires reçoivent une Malédiction', 0, 2, 0, 0, 0, 0),
(13, 'Tortionnaire', '5tortionnaire.jpg', 5, 'Action - Attaque', 'Tous vos adversaires choisissent : \r\n- soit ils défaussent deux cartes\r\n- soit ils reçoivent une Malédiction dans leur main', 0, 3, 0, 0, 0, 0),
(14, 'Aventurier', '6aventurier.jpg', 6, 'Action', 'Dévoilez les cartes de votre deck jusqu\'à avoir dévoilé 2 cartes Trésor. Ajoutez celles-là à votre main et défaussez les autres.', 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
