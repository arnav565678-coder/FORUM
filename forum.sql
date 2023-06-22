-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2023 at 06:44 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_description` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'DSA', 'A data structure is a named location that can be used to store and organize data. And, an algorithm is a collection of steps to solve a particular problem. Learning DSA allow us to write efficient computer programs.', '2023-06-10 11:30:47'),
(2, 'OOPS', 'Object-oriented programming is a programming paradigm based on the concept of \"objects\", which can contain data and code. The data is in the form of fields, and the code is in the form of procedures. ', '2023-06-10 11:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `comment_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thread_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `timestamp`, `thread_id`, `user_id`) VALUES
(1, 'mdx csdc we;fnq;almva;lzm', '2023-06-13 20:52:12', 1, 1),
(2, 'fsfsf', '2023-06-13 21:26:12', 2, 3),
(17, 'ss,', '2023-06-15 23:25:43', 2, 1),
(18, 'nx', '2023-06-15 23:25:57', 2, 6),
(24, 'ok\r\n', '2023-06-16 00:04:20', 1, 3),
(25, 'ok\r\n', '2023-06-16 00:05:00', 1, 3),
(23, 'yes', '2023-06-16 00:01:29', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loginid`
--

DROP TABLE IF EXISTS `loginid`;
CREATE TABLE IF NOT EXISTS `loginid` (
  `login_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(2000) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginid`
--

INSERT INTO `loginid` (`login_id`, `email`, `password`, `timestamp`) VALUES
(1, 'av@gmail.com', 'kkdd', '2023-06-14 22:39:48'),
(2, 'arnav@dks.com', '$2y$10$cE0MLzM6U1QZbm2ndjQOOORPWHdi.cnJXI8Wvdj731gkRmQLiWVp.', '2023-06-14 22:59:19'),
(3, 'arnav@gmail.com', '$2y$10$8Kdv7DQ/lrvOELxVhcg7BeAU.1iWHCQ9f/DgZ9W8npq7SI8wZ633y', '2023-06-14 23:05:28'),
(6, 'arnav@l.com', '$2y$10$Z.KFaeik5MrMbMJZbnn63.8/5aKGwYqIn1KswGF2Cv9qJF7PGB.2G', '2023-06-14 23:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `thread_id` int NOT NULL AUTO_INCREMENT,
  `thread_title` varchar(300) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_user_id` int NOT NULL,
  `thread_cat_id` int NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES
(1, 'How can i improve your data structures, algorithms, and problem-solving skills?', 'As there are many resources and i get confused many time which to practise,also it becomes very difficult to stay consistent after few days. Please help.', 1, 1, '2023-06-11 19:50:25'),
(2, 'I know the theory, but i get stuck on practical applications.', 'I faced this issue early in the term when I didn’t know what I didn’t know, which is a particularly pernicious problem. I understood the theory well enough — for instance, what a linked list was, how it worked, its various operations and their time complexities, the ADTs (abstract data types) it supported, and how the ADT operations were implemented.', 2, 1, '2023-06-11 20:51:12'),
(8, 'dk', 'mmmsaa', 3, 1, '2023-06-15 00:51:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
