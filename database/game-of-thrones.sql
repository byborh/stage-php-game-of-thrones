-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Juin 2024 à 13:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `game-of-thrones`
--

-- --------------------------------------------------------

--
-- Structure de la table `beast`
--

CREATE TABLE IF NOT EXISTS `beast` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `propertyName` varchar(255) NOT NULL,
  `asset` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `beast`
--

INSERT INTO `beast` (`idUser`, `name`, `propertyName`, `asset`) VALUES
(16, 'loup', 'reg', ''),
(17, 'dragon', 'a', 'feu & vol'),
(19, '', 'admin2', ''),
(20, '2 loups', 'beibarys', '');

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `class`
--

INSERT INTO `class` (`idUser`, `name`, `skill`) VALUES
(16, '', 'Ã©pÃ©e et arc'),
(17, 'esclave', 'Ã©pÃ©e'),
(19, 'roi', ''),
(20, '', 'Ã©pÃ©e');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `class`, `date`, `role`) VALUES
(16, 'reg@gmailLfr', 'reg', '$2y$10$swgIPbXgeX9anQ2g1aPUYOr7qsFoSBAgBfaozPbjTM90Mq/aOVzWC', '', '1111-11-11', 'user'),
(17, 'a@a.fr', 'a', '$2y$10$11DaBXa9gLZ0WgXgqFbgDOUlYe4tIuyyX94L6rwFYwJ1QVynnDCLu', 'esclave', '2222-02-22', ''),
(19, 'admin2@snapp.fr', 'admin2', '$2y$10$FK2zl9biHOgkM98f5Quf0OUspjbfI46Uyc.Xb4IhqCdQJ3qp/OHc2', 'roi', '1111-11-11', 'admin'),
(20, 'beibarys@snapp.fr', 'beibarys', '$2y$10$KF4rtR6FeKdP405bzTJN7O9AKRhos4iA10i5nAGHOoKnEb6ZNLPSK', '', '2004-03-12', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
