-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2015 at 12:40 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juitieee_ppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `firstn` varchar(25) NOT NULL,
  `lastn` varchar(25) NOT NULL,
  `rights` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sec_ques` varchar(100) NOT NULL,
  `sec_answ` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `quesstr` text NOT NULL,
  `quesimg` varchar(100) NOT NULL,
  `options` text NOT NULL,
  `answer` int(11) NOT NULL,
  `cat` varchar(4) NOT NULL COMMENT '4-char question category code',
  `points` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
`id` int(11) NOT NULL,
  `key` varchar(15) NOT NULL,
  `value` varchar(25) NOT NULL
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
`id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `firstn` varchar(25) NOT NULL,
  `lastn` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(20) NOT NULL,
  `score` int(11) NOT NULL,
  `completed` int(11) NOT NULL,
  `qattempted` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll`, `firstn`, `lastn`, `dob`, `password`, `score`, `completed`, `qattempted`) VALUES
(1, 121225, 'Abhinav', 'Kumar', '1994-04-13', 'panday', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
