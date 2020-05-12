-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 06:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aimitcollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `have_seen_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=not seen, 1=seen',
  `mail_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `first_name`, `last_name`, `mobile`, `emailid`, `message`, `have_seen_status`, `mail_time`) VALUES
(1, 'Aditya', 'Kumar', '9877899876', 'kumaradityamanu@gmail.com', 'I am interested in BCA.', 0, '2019-04-25 05:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0' COMMENT '0-enabled, 1-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `Name`, `Status`) VALUES
(1, 'BCA', 0),
(2, 'BBA', 0),
(3, 'BJMC', 0),
(4, 'BLIS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `flash_message`
--

CREATE TABLE `flash_message` (
  `id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flash_message`
--

INSERT INTO `flash_message` (`id`, `message`, `timestamp`, `status`) VALUES
(1, 'BLIS - Examination 2019 Held In the month of March-2019 result Declared. Check out in Student Corner.', '2019-05-24 08:43:13', 1),
(2, 'Hello', '2019-05-24 08:43:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `course_year` varchar(500) NOT NULL,
  `course_part` varchar(500) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(500) NOT NULL,
  `file_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `file_name`, `course_year`, `course_part`, `upload_date`, `description`, `file_type`) VALUES
(2, 4, 'bf32fa557383ec334b484ba525c809ee.pdf', '2016', '3', '2019-05-17 09:39:35', '', ''),
(4, 3, '8601708b60540e2c05e407cc4aa79b18.pdf', '2015', '3', '2019-05-20 09:07:54', '', ''),
(5, 1, 'afe59010bf5f380aa5b1d67f5ff9f5bd.pdf', '2011', '1', '2019-05-20 09:10:37', '', ''),
(6, 1, 'f506287d5ce007ac84bc2ab2558a0926.pdf', '2010', '1', '2019-05-20 09:12:25', '', ''),
(7, 1, 'a9e03f8727ff0a819b0ceeb294dcadab.pdf', '2010', '1', '2019-05-20 09:18:58', '', ''),
(8, 1, 'd029c1fd1178752589c8b1a900747ca8.pdf', '2011', '1', '2019-05-20 09:20:12', '', ''),
(9, 4, '1b531035343c275b1ac58afa71a0d077.pdf', '2019', '2', '2019-05-23 10:33:46', 'Dear Students, It is announced that the result of BLIS - Examination 2019 Held In the month of March-2019 is Declared. ', 'result');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_val` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `attemps` int(250) NOT NULL,
  `utype` int(11) NOT NULL,
  `locked` int(11) NOT NULL DEFAULT '0',
  `last_login` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `gender`, `image`, `mobile`, `email`, `address`, `dob`, `password`, `attemps`, `utype`, `locked`, `last_login`, `ip_address`, `location`, `created_date`) VALUES
(1, 'Aditya', 'Kumar', '', '', '', 'kumaradityamanu@gmail.com', '', '', '21232f297a57a5a743894a0e4a801fc3', 0, 1, 0, '2019-05-28 11:10:14 am', '', '', '2019-01-24 10:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `user_name`) VALUES
(1, 'admin'),
(2, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_message`
--
ALTER TABLE `flash_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `flash_message`
--
ALTER TABLE `flash_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
