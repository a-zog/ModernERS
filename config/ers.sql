-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 03 Décembre 2013 à 15:57
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ers`
--
CREATE DATABASE IF NOT EXISTS `ers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ers`;

-- --------------------------------------------------------

--
-- Structure de la table `reg_member`
--

CREATE TABLE IF NOT EXISTS `reg_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `c_number` varchar(20) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `age` int(2) NOT NULL,
  `organisation` varchar(200) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `reg_member`
--

INSERT INTO `reg_member` (`member_id`, `firstname`, `lastname`, `address`, `email`, `c_number`, `gender`, `date`, `age`, `organisation`) VALUES
(5, 'John', 'Doe', 'Tunisia', 'johnd@yahoo.com', '123456', 'Male', '2013-02-12 18:07:16', 20, 'DoeCampany'),
(4, 'Lara', 'Croft', 'USA', 'tomber@yahoo.com', '789465', 'Female', '2013-06-20 17:59:37', 28, ''),
(6, 'Master', 'Chief', 'Japan', 'kitchen_attitude@yahoo.com', '00000000', 'Male', '2013-04-15 18:08:16', 14, ''),
(7, 'Ruce', 'Lee', 'China', 'nicelee@yahoo.com', '112233', 'Male', '2013-07-2 18:08:56', 18, ''),
(3, 'Mac', 'Gaiver', 'USA', 'thehacker@yahoo.com', '7823718371', 'Male', '2013-01-24 18:09:28', 23, ''),
(2, 'Hello', 'Cuty', 'Italy', 'tuting@yahoo.com', '738273817487', 'Female', '2013-10-6 10:08:12', 25, ''),
(1, 'AZOG', 'Surname', 'Tunisia', 'azog@yahoo.com', '000000', 'Male', '2013-11-28 22:03:22', 20, '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'user1', 'user1', 'Enforcer', 'Mega'),
(2, 'user2', 'user2', 'Another', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
