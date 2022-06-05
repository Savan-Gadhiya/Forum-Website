-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 06:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `CreatedDate`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Python\'s design philosophy emphasizes code readability with its notable use of significant indentation.', '2021-05-26 10:20:16'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. ', '2021-05-26 10:21:18'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an American independent organization established as a 501 non-profit.', '2021-05-26 12:30:03'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party', '2021-05-26 12:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `Added time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `Added time`) VALUES
(1, 'This is Testing of commeant answer', 3, 1, '2021-05-26 17:30:12'),
(2, 'texting is going on for flask', 4, 12, '2021-05-26 17:38:38'),
(3, 'my test commtn', 3, 12, '0000-00-00 00:00:00'),
(4, 'my test commtn', 3, 10, '0000-00-00 00:00:00'),
(9, 'asfh;jhas;dkf', 2, 9, '2021-05-26 22:00:27'),
(10, 'Go to www.falsk.com and downlode according to your os', 13, 5, '2021-05-26 22:08:23'),
(11, 'Yes, You can definitely choose flask', 20, 10, '2021-05-27 13:01:05'),
(12, 'Yes, You can definitely choose flask', 20, 10, '2021-05-27 13:05:24'),
(17, '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', 3, 10, '2021-05-27 14:06:27'),
(23, 'savan', 2, 10, '2021-05-27 14:18:40'),
(31, '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', 2, 10, '2021-05-27 14:30:38'),
(32, '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', 2, 10, '2021-05-27 14:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `Added time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `Added time`) VALUES
(1, 'Unable to Install pyaudio', 'I am not able to install install pyaudio on windows 10.The Error is file is not found.', 1, 1, '2021-05-26 12:08:46'),
(2, 'How to learn JavaScript?', 'I am a currently second year student. I want to learn a Java Script.\r\nFrom where i can start.??', 4, 2, '2021-05-26 20:00:40'),
(3, 'This is testing', 'This is testing', 5, 3, '2021-05-26 20:24:22'),
(11, 'savam', 'svam', 2, 2, '2021-05-26 20:24:41'),
(12, 'How to install falsk', 's,adfjljhasklfguywe8687', 2, 4, '2021-05-26 22:04:13'),
(13, 'How to install falsk', 's,adfjljhasklfguywe8687', 6, 4, '2021-05-26 22:07:41'),
(17, 'is name visiable', 'I try to add name is it visiable?', 8, 2, '2021-05-27 12:41:48'),
(18, 'is name visiable', 'is name vissiae', 10, 2, '2021-05-27 12:43:47'),
(19, 'is name visiable', 'is name vissiae', 10, 2, '2021-05-27 12:44:41'),
(20, 'Is flask is suitable for big project', 'I want to create a vary big Project i am confuse that what am i use?\r\ndjango to flask.Please help me to clear my doubt.', 19, 4, '2021-05-27 13:00:07'),
(22, 'attect', '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', 10, 3, '2021-05-27 13:59:49'),
(23, '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt; try to attek', 10, 2, '2021-05-27 14:32:59'),
(24, '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt;', '&lt;script&gt;alert(\"HEloo\")&lt;/script&gt; try to attek', 10, 2, '2021-05-27 14:44:19'),
(25, 'Ss', 'Ss', 20, 2, '2021-05-28 20:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `Added Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `Added Date`) VALUES
(1, 'hjaskd', 'hjaskd@gmail.c', '$2y$10$VWkxI42dfemSJy4jnbsrTeeMDnjJyjRtzOpzm97vcfcbmqJ8oMtZC', '2021-05-27 09:32:25'),
(2, 'savan', 'savan@gmail.com', '$2y$10$a9eNqAOwVLULjlB7616EO.fyZM/pA7JN5RUc6JRyQmjI7MxD8yCom', '2021-05-27 09:33:33'),
(3, 'sa', 'sa@12.cm', '$2y$10$DcFARNxbyua88AmBGP3eFOZ3aMeG39M57PjGoPcQl5d96vgxdhJHi', '2021-05-27 09:34:18'),
(4, 'sas', 'sa@sa.as', '$2y$10$FtkczTOnicWQgnyyNmZ3juaZCcryKnDD5v0qLy2eLMJoj780.8l1i', '2021-05-27 09:36:54'),
(5, 'o', 'o@d.a', '$2y$10$xPpB0uqS388wo6lvrdkBQu9Ay7GiOUXQTGYGJf5whJILGTALbLhVe', '2021-05-27 09:37:07'),
(6, '12', '12@sd.df', '$2y$10$aDKJvagNZp0pdSwztJtle.5uppkGerev/txsSkdYqb4GkbRicib8K', '2021-05-27 09:38:55'),
(7, 'as234', 'as234@er.cd', '$2y$10$LAP9K2fk.EcljaZzKjXBkejRPMqUCqtWkN22sKP4w5ujnuTxHHoH6', '2021-05-27 09:40:10'),
(8, 'sd', 'sd@as.df', '$2y$10$VjHIYQDwW0nV.xdT2byjW.aqNbWGFOCj7ifR2aHD/Drw.8C5IhKpu', '2021-05-27 09:47:44'),
(9, 'my', 'my@new.com', '$2y$10$5bjE3bIYlXSb2a2y/7p1Y.Xa72XE2iVyynZuuzhGwnmXAEhC12OM2', '2021-05-27 09:56:39'),
(10, 'newtext', 'newtext@gmail.com', '$2y$10$FgH2FCqugyXJocXBRCoPu.IrKSYvXUNIEv.59x7SJF0Nm9IEYgtOu', '2021-05-27 10:45:34'),
(12, '1', '1asasd@asd.com', '$2y$10$I5oGdIxzD/m61IuRFgYbB.dRs5oyXs0wX/RPupFm.W6m21hnLj5J.', '2021-05-27 11:44:51'),
(19, 'tt', 'tt@tt.tt', '$2y$10$sdZoqY0W2Sitkw.ZZXuWJ.tcobgegWBX7KYNLgEJGtygLiO0XbNN.', '2021-05-27 12:57:57'),
(20, 'ss', 'ss@ss.ss', '$2y$10$rt1ZSZa9E1LmlWmfxHbsf.s2d9D3qVCJpWzVQPTPBx3qZ2dSPhvXa', '2021-05-28 20:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
