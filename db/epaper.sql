-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 20, 2018 at 02:24 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `epaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `uid`, `comment`) VALUES
(10, 3, 'RA1611003010876', 'first post'),
(11, 3, 'RA1611003010876', 'hello comment on archived post'),
(12, 4, 'RA1611003010876', 'ooo this is python'),
(13, 3, 'RA1611003010876', 'comment'),
(14, 4, 'RA1611003010984', 'ok ok this');

-- --------------------------------------------------------

--
-- Table structure for table `dept_table`
--

CREATE TABLE `dept_table` (
  `DEPT_ID` int(11) NOT NULL,
  `DEPT_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_table`
--

INSERT INTO `dept_table` (`DEPT_ID`, `DEPT_NAME`) VALUES
(11, 'CIVIL ENGINEERING'),
(12, 'COMPUTER SCIENCE AND ENGINEERING'),
(13, 'ELECTRICAL AND ELECTRONICS ENGINEERING'),
(14, 'ELECTRONICS AND COMMUNICATION ENGINEERING'),
(15, 'ELECTRONICS AND INSTRUMENTATION ENGINEERING'),
(16, 'INFORMATION TECHNOLOGY'),
(17, 'MECHANICAL ENGINEERING'),
(18, 'MASTERS AND BUSINESS ADMINISTRATION');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `filename` text NOT NULL,
  `link` text NOT NULL,
  `putdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `topic`, `filename`, `link`, `putdate`) VALUES
(3, 'mladmin', 'nalu.txt', 'https://arxiv.org/pdf/1808.00508', '2018-12-11 18:30:00'),
(4, 'mladmin', 'narme.txt', 'www.google.com', '2018-12-19 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `security_questions_table`
--

CREATE TABLE `security_questions_table` (
  `ID` int(11) NOT NULL,
  `QUESTION` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_questions_table`
--

INSERT INTO `security_questions_table` (`ID`, `QUESTION`) VALUES
(11, 'What is the first name of your childhood friend?'),
(12, 'Which phone number do you remember most from your childhood?\r\n'),
(13, 'What was your favorite place to visit as a child?'),
(14, 'Who is your favorite actor, musician, or artist?\r\n'),
(15, 'What is the name of your favorite pet?'),
(16, 'In what city were you born?\r\n'),
(17, 'What high school did you attend?'),
(18, 'What is the name of your first school?'),
(19, 'What is your favorite movie?'),
(20, 'What is your mother\'s maiden name?'),
(21, 'What street did you grow up on?'),
(22, 'What was the make of your first car?'),
(23, 'When is your anniversary?'),
(24, 'What is your favorite color?'),
(25, 'What is your father\'s middle name?'),
(26, 'What is the name of your first grade teacher?'),
(27, 'What was your high school mascot?'),
(28, 'Which is your favorite web browser?'),
(29, 'What is your favorite website?'),
(30, 'What is your favorite laptop?');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic`, `admin`) VALUES
(1, 'Machine Learning', 'mladmin'),
(2, 'IoT', 'iotadmin'),
(3, 'Blockchain', 'bhadmin');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `USER_ID` varchar(15) NOT NULL,
  `FIRST_NAME` text NOT NULL,
  `LAST_NAME` text NOT NULL,
  `EMAIL_ID` text NOT NULL,
  `MOBILE` text NOT NULL,
  `ROLE` varchar(1) NOT NULL,
  `PASSWORD` text NOT NULL,
  `DEPARTMENT` text NOT NULL,
  `FORGOT_Q_1` text NOT NULL,
  `FORGOT_A_1` text NOT NULL,
  `FORGOT_Q_2` text NOT NULL,
  `FORGOT_A_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL_ID`, `MOBILE`, `ROLE`, `PASSWORD`, `DEPARTMENT`, `FORGOT_Q_1`, `FORGOT_A_1`, `FORGOT_Q_2`, `FORGOT_A_2`) VALUES
('bhadmin', 'Blockchain Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('iotadmin', 'IoT Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('mladmin', 'Machine Learning Admin', 'KAT', 'sample@mail.com', '1234567890', 'A', '5f4dcc3b5aa765d61d8327deb882cf99', 'KAT', 'a', 'a', 'a', 'a'),
('RA1611003010876', 'Siddhartha Dhar', 'Choudhury', 'siddharthadhar_soumen@srmuniv.edu.in', '1234567890', 'S', '5f4dcc3b5aa765d61d8327deb882cf99', 'COMPUTER SCIENCE AND ENGINEERING', 'What is your mother\'s maiden name?', 'abc', 'What is the name of your first school?', 'abcd'),
('RA1611003010984', 'Shashank', 'Pandey', 'pandeyshashank152@gmail.com', '9876543210', 'S', '5f4dcc3b5aa765d61d8327deb882cf99', 'COMPUTER SCIENCE AND ENGINEERING', 'What is your father\'s middle name?', 'yello', 'Which is your favorite web browser?', 'yello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_table`
--
ALTER TABLE `dept_table`
  ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_questions_table`
--
ALTER TABLE `security_questions_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dept_table`
--
ALTER TABLE `dept_table`
  MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `security_questions_table`
--
ALTER TABLE `security_questions_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
