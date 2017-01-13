-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Janvier 2017 à 15:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mini_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) COLLATE utf8_bin NOT NULL,
  `categorie` varchar(250) COLLATE utf8_bin NOT NULL,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `article` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `pseudo`, `categorie`, `titre`, `article`) VALUES
(1, 'Alexandre', 'Concert', 'AC/DC', 'Concert de AC/DC prochainement le lieu est encore Ã  dÃ©finir encore un peu de patience'),
(2, 'Alexandre', 'Musique', 'Musique Ã  Ã©couter', 'Je vous conseil d''Ã©couter ce groupe il est trop cool.'),
(3, 'Alexandre', 'Jeux video', 'Watch dogs 2', 'C''est un jeu de hacker '),
(4, 'Alexandre', 'Sport', 'Mondial de handball', 'Cet aprÃ¨s-midi la France affronte le Japon'),
(5, 'Admin', 'Musique', 'CD Ã  vendre ', 'Bonjour, je suis l''admin de ce blog je vends des CD pas cher.'),
(6, 'Admin', 'Jeux video', 'GTA 5', 'Apparemment ce jeu est bien je vais allÃ© le tester'),
(7, 'Admin', 'Concert', 'Led Zepplin', 'De source sur,Led Zepplin sera de retour en France prochainement suite Ã  leur nouvel album'),
(8, 'Admin', 'Sport', 'WWE', 'Ceci est un divertissement est non un sport ');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Musique'),
(2, 'Concert'),
(3, 'Sport'),
(4, 'Jeux video');

-- --------------------------------------------------------

--
-- Structure de la table `jointure`
--

CREATE TABLE IF NOT EXISTS `jointure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_art` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=30 ;

--
-- Contenu de la table `jointure`
--

INSERT INTO `jointure` (`id`, `id_art`, `id_cat`) VALUES
(21, 27, 1),
(22, 1, 2),
(23, 2, 1),
(24, 3, 4),
(25, 4, 3),
(26, 5, 1),
(27, 6, 4),
(28, 7, 2),
(29, 8, 3);

-- --------------------------------------------------------

--
-- Structure de la table `jointure_aut_art`
--

CREATE TABLE IF NOT EXISTS `jointure_aut_art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aut` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=22 ;

--
-- Contenu de la table `jointure_aut_art`
--

INSERT INTO `jointure_aut_art` (`id`, `id_aut`, `id_article`) VALUES
(2, 8, 16),
(3, 2, 17),
(4, 8, 18),
(5, 8, 19),
(6, 8, 20),
(7, 8, 21),
(8, 8, 22),
(9, 8, 23),
(10, 8, 24),
(11, 8, 25),
(12, 8, 26),
(13, 2, 27),
(14, 2, 1),
(15, 2, 2),
(16, 2, 3),
(17, 2, 4),
(18, 1, 5),
(19, 1, 6),
(20, 1, 7),
(21, 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) COLLATE utf8_bin NOT NULL,
  `mot_de_passe` text COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mot_de_passe`, `email`) VALUES
(1, 'Admin', '3a9ff7a5d1d82e0f401f6d255cf007d21bc663aa', 'alexandrepacoret@yahoo.fr'),
(2, 'Alexandre', '4303f7fbc75763e3133bf7714fc90f02260848b5', 'alexandre.ulrich91@gmail.com'),
(3, 'esteban', '50e781cfea1e874dd72ed87c52f019f9eaac7a23', 'e.duvernay@laposte.net');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
