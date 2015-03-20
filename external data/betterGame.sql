-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 01:42 AM
-- Server version: 5.5.32-cll-lve
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `betterGame`
--

-- --------------------------------------------------------

--
-- Table structure for table `emailSubscribtion`
--

CREATE TABLE IF NOT EXISTS `emailSubscribtion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailid` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `activationcode` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `expiry` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `emailSubscribtion`
--

INSERT INTO `emailSubscribtion` (`id`, `emailid`, `date`, `activationcode`, `status`, `expiry`) VALUES
(2, 'abc@def.com', NULL, '98e8c1027e3e62f22d1ea0b19fdfd378', 0, ''),
(3, 'sdsdf@fjdkf.dfd', NULL, '6cb1718bd82ed419ae744e7acbc11b77', 0, ''),
(6, '453ankitapalekar@gmail.com', NULL, 'f7334a59d37187ba803738be816b3654', 0, ''),
(7, 'k.kerkar@yahoo.com', NULL, '2b5ec195465b6b95d06801ab86b1f96e', 0, ''),
(8, 'helixtechin@gmail.com', NULL, 'd064aedd2ae86f51dd864a4fe6add62c', 1, ''),
(9, 'kunalkerkar.7@gmail.com', NULL, 'd5b747571197a5bc18c2b0799e21ea6e', 0, ''),
(10, 'betterthegame@yahoo.com', NULL, 'f8bf6b2f382f3859cec3b50afd353933', 0, ''),
(11, 'abc@helixtech.co', NULL, 'b482b760ccddd97f420ffa1b6f4e499f', 0, ''),
(12, 'ceo@helixtech.co', NULL, '5de08bf4c2c7ff47569e3fb8716e8a98', 0, ''),
(13, 'betterthegame@gmail.com', NULL, '6881dfb4f5bb8a4941c867fb1986bfca', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
