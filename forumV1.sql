-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2021 at 01:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forumV1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` text NOT NULL,
  `qid` int(11) NOT NULL,
  `user` varchar(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`, `date`) VALUES
(1, 'Front-end Development', 'Explore this discussion to ask question or get answer of questions related to Front-End development.', '2021-01-12 21:23:25'),
(2, 'Back-end development', 'Explore this discussion to ask question or get answer of questions related to Back-End development.', '2021-01-12 21:24:11'),
(3, 'Full Stack Development', 'Explore this discussion to ask question or get answer of questions related to Full Stack development.', '2021-01-12 21:24:42'),
(4, 'Linux', 'Explore this discussion to ask question or get answer of questions related to Linux.', '2021-01-12 21:25:05'),
(5, 'Cyber Security', 'Explore this discussion to ask question or get answer of questions related to Cyber Security.', '2021-01-12 21:25:36'),
(6, 'Computer Networking', 'Explore this discussion to ask question or get answer of questions related to Computer Networking.', '2021-01-12 21:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(100) NOT NULL,
  `qtitle` text NOT NULL,
  `qdesc` text NOT NULL,
  `qcatid` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qtitle`, `qdesc`, `qcatid`, `user`, `date`) VALUES
(1, 'Demo Question', 'This is a Demo Question.', 1, 'demo', '2021-01-13 14:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`, `date`) VALUES
(12, 'cliuser', 'cliuser@gmail.com', '$2y$10$l6ylNwFbcTix0v/u6n67beX/rkm4HkWDRDyF0W5buYWoq.gp/jkcK', '2021-01-15 00:11:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);
ALTER TABLE `questions` ADD FULLTEXT KEY `qdesc` (`qdesc`);
ALTER TABLE `questions` ADD FULLTEXT KEY `qtitle` (`qtitle`);
ALTER TABLE `questions` ADD FULLTEXT KEY `qdesc_2` (`qdesc`);
ALTER TABLE `questions` ADD FULLTEXT KEY `qtitle_2` (`qtitle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
