-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 04:32 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` int(11) NOT NULL,
  `captcha_time` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `word` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(92, 1619919131, '127.0.0.1', '2259'),
(93, 1619919163, '127.0.0.1', '9643'),
(94, 1619921126, '127.0.0.1', '2670'),
(95, 1619922101, '127.0.0.1', '7134'),
(96, 1619922113, '127.0.0.1', '6098'),
(97, 1619922123, '127.0.0.1', '3390'),
(98, 1619922130, '127.0.0.1', '4234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer`
--

CREATE TABLE `tb_answer` (
  `ans_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL DEFAULT 0,
  `answer` varchar(1000) NOT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`c_id`, `category_name`, `added_on`, `status`) VALUES
(1, 'Political', '2021-04-29 06:34:29', 1),
(2, 'Casual', '2021-05-01 04:35:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_questions`
--

CREATE TABLE `tb_questions` (
  `q_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `asked_by` int(11) NOT NULL DEFAULT 0,
  `asked_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`status_id`, `status`) VALUES
(1, 'Active'),
(2, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_type`
--

CREATE TABLE `tb_user_type` (
  `ut_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_type`
--

INSERT INTO `tb_user_type` (`ut_id`, `role_name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'User', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `tb_answer`
--
ALTER TABLE `tb_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tb_questions`
--
ALTER TABLE `tb_questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  ADD PRIMARY KEY (`ut_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tb_answer`
--
ALTER TABLE `tb_answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_questions`
--
ALTER TABLE `tb_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user_type`
--
ALTER TABLE `tb_user_type`
  MODIFY `ut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
