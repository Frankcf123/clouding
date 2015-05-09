-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 09, 2015 at 04:51 PM
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
  `duration` int(11) NOT NULL,
  `status` varchar(75) NOT NULL,
  `code` varchar(300) NOT NULL,
  `exam_name` varchar(175) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `username`, `total_question`, `duration`, `status`, `code`, `exam_name`) VALUES
(10, 'frankcf329', 3, 60, 'private', 'frddO4oa5P2kI', 'asdasdas'),
(11, 'frankcf329', 3, 60, 'private', 'frmbmqPzUaB8U', 'asdadasdassdas');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `exam_question_id`, `title`, `A`, `B`, `C`, `D`, `result`, `exam_name`) VALUES
(10, 0, 'sdfas', 'safsad', 'safsad', 'safsad', 'safsad', 'A', ''),
(12, 0, 'sdfas', 'safsad', 'safsad', 'safsad', 'safsad', 'A', ''),
(14, 0, 'wqe', 'weq', 'weq', 'weq', 'weq', 'A', ''),
(17, 0, 'dasdas', 'd', 'd', 'd', 'd', 'A', ''),
(19, 0, 'ewr', 'r', 'r', 'r', 'r', 'A', 'asdadasdassdas'),
(20, 1, 'qe', 'qweqdq', 'qweqdq', 'qweqdq', 'qweqdq', 'A', 'asdadasdassdas'),
(21, 2, 'we', 'qwesqwd', 'qwesqwd', 'qwesqwd', 'qwesqwd', 'A', 'asdadasdassdas');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'frankcf329', 'frankcf329'),
(2, 'Frankcf32dasd', 'asda'),
(3, 'Frankcf329ds', 'asda'),
(4, 'Frankcf329dsfdsf', 'asdfasdf'),
(5, 'Frankcf329sadas', 'asdas'),
(6, 'dsfasdf', 'sadfas'),
(7, 'Frankcf329sadassada', 'asdas'),
(8, 'Frankcf329sadasdas1wq', 'wqweqw'),
(9, 'test123', '123'),
(10, 'test123asdasd', 'asdas'),
(11, 'test123dfasdf', 'sdfas'),
(12, 'test123adasd', 'qwd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
