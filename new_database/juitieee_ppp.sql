-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2015 at 06:41 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juitieee_ppp`
--
CREATE DATABASE IF NOT EXISTS `juitieee_ppp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `juitieee_ppp`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstn` varchar(25) NOT NULL,
  `lastn` varchar(25) NOT NULL,
  `rights` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstn`, `lastn`, `rights`, `contact`, `email`, `password`) VALUES
(1, 'Prateek ', 'Joshi', 3, '999999999', 'prateek@gmail.com', 'global');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesstr` text NOT NULL,
  `quesimg` varchar(100) NOT NULL,
  `options` text NOT NULL,
  `answer` int(11) NOT NULL,
  `cat` varchar(4) NOT NULL COMMENT '4-char question category code',
  `points` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quesstr`, `quesimg`, `options`, `answer`, `cat`, `points`, `time`) VALUES
(1, '', '1.png', 'a=1,b=1~a=2,b=1~a=1,b=2~a=2,b=2', 1, 'PROG', 25, 45),
(2, '', '2.png', 'Bubble Sort~Insertion Sort~Selection Sort~Quick Sort', 2, 'PROG', 25, 45),
(3, '', '3.png', 'Complete tree~Full binary tree~Binary search tree~Threaded tree', 2, 'PROG', 25, 25),
(4, '', '4.png', 'Semaphore~Thrashing~Interleaving~Deadlock', 1, 'PROG', 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(15) NOT NULL,
  `value` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `key`, `value`) VALUES
(1, 'is_open', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll` int(11) NOT NULL,
  `firstn` varchar(25) NOT NULL,
  `lastn` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `qattempted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll`, `firstn`, `lastn`, `dob`, `password`, `score`, `completed`, `qattempted`) VALUES
(1, 121225, 'Abhinav', 'Kumar', '1994-04-13', 'panday', 2, 1, 0),
(2, 131416, 'Prateek', 'Joshi', '0000-00-00', 'pool', 2, 1, 0),
(4, 65656, '', 'googo', '2000-12-12', 'pppp', 0, 0, 0),
(5, 121212, '', 'jkjkj', '0000-00-00', 'hgh', 0, 0, 0),
(6, 878, '', 'po', '0000-00-00', 'nmnm', 0, 0, 0),
(7, 89898, '', 'ppopo', '0000-00-00', 'kjkj', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
