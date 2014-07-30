-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 04:16 PM
-- Server version: 5.6.19
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpcat`
--

CREATE DATABASE helpcat;
USE helpcat;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `issue` text NOT NULL,
  `location` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `vote` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `issue`, `location`, `timestamp`, `tag`, `email`, `vote`) VALUES
(67, 'Broken Chair', 'Room 514', '2014-07-24 06:42:34', 'chair', 'ayakosky@gmail.com', 17),
(70, 'Missing chair', 'Room 517', '2014-07-26 06:03:11', 'missing', 'joevo2@gmail.com', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(64) NOT NULL,
  `password` varchar(12) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `timestamp`, `type`) VALUES
('ayakosky@gmail.com', '123', '2014-07-19 04:08:16', NULL),
('joevo2@gmail.com', 'qweqweqwe', '2014-06-30 06:16:35', 'admin'),
('puiwan@gmail.com', '123123123', '2014-07-23 02:47:22', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
