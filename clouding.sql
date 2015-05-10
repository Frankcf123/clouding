-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 10, 2015 at 06:12 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clouding`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `total_question` int(11) NOT NULL,
  `duration` varchar(75) NOT NULL,
  `status` varchar(75) NOT NULL,
  `code` varchar(300) NOT NULL,
  `exam_name` varchar(175) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `username`, `total_question`, `duration`, `status`, `code`, `exam_name`) VALUES
(13, 'frankcf329', 2, '00:20', 'public', 'frccQFbb6FwzI', 'testexam');

-- --------------------------------------------------------

--
-- Table structure for table `examiner`
--

CREATE TABLE `examiner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examiner_name` varchar(175) DEFAULT 'anonymity',
  `exam_name` varchar(175) NOT NULL,
  `rank` varchar(145) NOT NULL,
  `possible_mark` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `duration` varchar(175) NOT NULL,
  `possible_duration` varchar(175) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `examiner`
--

INSERT INTO `examiner` (`id`, `examiner_name`, `exam_name`, `rank`, `possible_mark`, `mark`, `duration`, `possible_duration`) VALUES
(15, 'anonymity', 'testexam', 'Hard', 2, 0, '0:3', '00:20'),
(16, 'anonymity', 'testexam', 'Hard', 2, 0, '00:03', '00:20'),
(17, 'anonymity', 'testexam', 'Hard', 2, 0, '00:02', '00:20'),
(18, 'anonymity', 'testexam', 'Hard', 2, 0, '00:02', '00:20'),
(19, 'anonymity', 'testexam', 'Hard', 2, 0, '00:02', '00:20'),
(20, 'anonymity', 'testexam', 'Hard', 2, 0, '00:02', '00:20'),
(21, 'anonymity', 'testexam', 'Medium', 2, 1, '00:07', '00:20'),
(22, 'anonymity', 'testexam', 'Medium', 2, 1, '00:07', '00:20');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_question_id` int(11) NOT NULL,
  `title` varchar(275) NOT NULL,
  `A` varchar(275) NOT NULL,
  `B` varchar(275) NOT NULL,
  `C` varchar(275) NOT NULL,
  `D` varchar(275) NOT NULL,
  `result` varchar(45) NOT NULL,
  `exam_name` varchar(175) NOT NULL,
  `correct_num` int(11) NOT NULL DEFAULT '0',
  `wrong_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `exam_question_id`, `title`, `A`, `B`, `C`, `D`, `result`, `exam_name`, `correct_num`, `wrong_num`) VALUES
(23, 0, 'testtitle', '1asdsa', '1asdsa', '1asdsa', '1asdsa', 'C', 'testexam', 0, 34),
(24, 1, 'testeam3', 'das', 'das', 'das', 'das', 'A', 'testexam', 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(13, 'frankcf329', 'frankcf329');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
