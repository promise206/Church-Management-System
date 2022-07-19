-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 08:12 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'sino.japanes21@gmail.com', 'promsy205');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'BISHOP'),
(2, 'VENERABLE'),
(3, 'REVEREND'),
(4, 'CHATCHIST');

-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

CREATE TABLE `collect` (
  `collect_id` int(10) NOT NULL,
  `collect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collect`
--

INSERT INTO `collect` (`collect_id`, `collect`) VALUES
(8, 'The Lord is Good All the time.');

-- --------------------------------------------------------

--
-- Table structure for table `current_workers`
--

CREATE TABLE `current_workers` (
  `worker_id` int(100) NOT NULL,
  `worker_cat` varchar(30) NOT NULL,
  `worker_email` varchar(50) NOT NULL,
  `worker_firstname` varchar(30) NOT NULL,
  `worker_lastname` varchar(30) NOT NULL,
  `worker_image` text NOT NULL,
  `worker_phoneno` varchar(11) NOT NULL,
  `worker_bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_workers`
--

INSERT INTO `current_workers` (`worker_id`, `worker_cat`, `worker_email`, `worker_firstname`, `worker_lastname`, `worker_image`, `worker_phoneno`, `worker_bio`) VALUES
(8, 'REVEREND', 'sylvanus@gmail.com', 'Rev.Sylvanus', 'Ugonwenyi', '_20171115_225100.JPG', '080600504**', 'A powerful man of God'),
(9, 'CHATCHIST', 'alokwu@gmail.com', 'Mr Ifeanyi', 'Alokwu', '_20171115_225120.JPG', '080384950**', 'A powerful man of God');

-- --------------------------------------------------------

--
-- Table structure for table `ind_workers`
--

CREATE TABLE `ind_workers` (
  `worker_id` int(100) NOT NULL,
  `worker_cat` varchar(30) NOT NULL,
  `worker_firstname` varchar(30) NOT NULL,
  `worker_lastname` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `ordained_on` year(4) NOT NULL,
  `died_on` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ind_workers`
--

INSERT INTO `ind_workers` (`worker_id`, `worker_cat`, `worker_firstname`, `worker_lastname`, `image`, `ordained_on`, `died_on`) VALUES
(10, 'BISHOP', 'Rt.Rev.Bishop Owen', 'Nwokolo', '_20171111_110154.JPG', 1994, 0000),
(11, 'BISHOP', 'Rt.Rev.Bishop S.C.', 'Chukwuka(Rtd)', '_20171111_110504.JPG', 1987, 0000),
(12, 'VENERABLE', 'Ven.Prof.Engr.Theo', 'Madueme', '_20171111_110522.JPG', 1997, 0000),
(13, 'VENERABLE', 'Ven.Clement', 'Okoye', '_20171111_110542.JPG', 2005, 0000),
(14, 'VENERABLE', 'Ven.Victor', 'Ibah', '_20171111_110603.JPG', 0000, 0000),
(15, 'REVEREND', 'Late Rev.Canon Felix', 'Nwokolo', '_20171111_110623.JPG', 1963, 1994),
(16, 'REVEREND', 'Late Rev.Wilfred', 'Ifemeludike', '_20171111_110655.JPG', 1963, 1980),
(17, 'REVEREND', 'Late Rev.Christopher', 'Onyiagha', '_20171111_110725.JPG', 1964, 1993),
(18, 'REVEREND', 'Rev.Canon Temple', 'Madunagu', '_20171111_110218.JPG', 2000, 0000),
(19, 'REVEREND', 'Rev.Canon Samson I.', 'Ogbuka(jp)', '_20171111_110244.JPG', 2004, 0000),
(20, 'REVEREND', 'Rev.Vin', 'ifemeludike', '_20171111_110306.JPG', 2003, 0000),
(21, 'REVEREND', 'Late Rev.Emeka', 'Ezeume', '_20171111_110326.JPG', 1990, 0000),
(22, 'REVEREND', 'Late Rev.D.M.C.', 'Ume', '_20171111_110348.JPG', 1981, 0000),
(23, 'VENERABLE', 'Ven.Ike', 'Chukwuka', '_20171111_110408.JPG', 0000, 0000),
(24, 'REVEREND', 'Rev.Canon Ifeanyi', 'Chukwuka', '_20171111_110425.JPG', 0000, 0000),
(25, 'REVEREND', 'Rev.Paul N.', 'Anosike', '_20171111_110445.JPG', 0000, 0000);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `email`, `address`, `phone_no`, `pass`, `gender`, `date`, `image`, `country`, `state`) VALUES
(15, 'ifunanya', 'nnebe', 'ifunanya@gmail.com', 'umuona', '09060058188', 'inu343', 'Female', '1995-07-04', 'IMG_20150407_181559.jpg', 'Nigeria', 'Anambra'),
(16, 'okeke', 'sino', 'chuja@gmail.com', 'umuafor', '08495998494', 'osdi', 'Male', '0005-11-04', 'aa.JPG', 'Nigeria', 'Anambra'),
(28, 'okpalaugo ', 'kosisochukwu', 'kosiso@gmail.com', 'amadunu', '09040584758', 'promsy205', 'Female', '1996-11-05', 'IMG_20150505_112744.jpg', 'Nigeria', 'Anambra'),
(31, 'okpalaugo', 'chuks', 'sino.japanes2@gmail.com', 'amadunu', '08037869935', 'kklkkl', 'Male', '3304-04-02', '1489089_544150355680521_482334088_n.jpg', 'Cotonu', 'Port Harcourt'),
(32, 'promise', 'sino', 'sino.japanes22@gmail.com', 'amadunu', '09060058388', 'okeke', 'Male', '0005-11-23', '1463130_517266028368954_2120266372_n.jpg', 'South Africa', 'Calabar'),
(33, 'okeke', 'ebuka', 'sino.japanes1234567890@gmail.com', 'amadunu', '09060058123', 'promsy206', 'Male', '0000-00-00', '1491726_540797182682505_81897609_n.jpg', 'South Africa', 'Calabar'),
(41, 'ifeanyi', 'okoye', 'okoye@gmail.com', 'amadunu', '09040594859', 'promsy205', 'Male', '1993-11-03', '2016-10-18-12-09-41-134.jpg', 'Nigeria', 'Anambra'),
(42, 'kosiso', 'okpalaugo', 'okpalaugo@gmail.com', 'amadunu', '09048594838', 'promsy205', 'Male', '0000-00-00', 'IMG_20150223_181208.JPG', 'Nigeria', 'Anambra'),
(45, 'okechukwu', 'okakpu', 'sino@yahoo.com', 'amadunu', '09060594959', 'promsy206', 'Male', '2014-12-28', 'IMG_20150102_171938.JPG', 'Malaysia', 'Port Harcourt'),
(46, 'ksdf', 'jsdf', 'jksdf', 'jdsfl', '090', '123', 'Male', '0000-00-00', 'a.jpg', 'Algeria', 'Lagos'),
(47, 'okpalaugo', 'promise', 'sino.japanes21@gmail.com', 'amadunu', '0906005949', 'promsy205', 'Male', '0000-00-00', 'a.jpg', 'Ghana', 'Anambra'),
(48, 'okechukwu', 'lksdfoi', 'sino.jap@gmail.com', 'osinigwe', '09060058188', '1234', 'Male', '1994-08-03', 'a (2).jpg', 'Nigeria', 'Anambra'),
(49, 'sdf', 'ksdf', 'klasdf', 'kdlasf', 'sdkjf', '123', 'Male', '1993-11-02', '2016-10-18-12-08-36-779.jpg', 'Nigeria', 'Anambra');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notices_id` int(10) NOT NULL,
  `notices_title` varchar(200) NOT NULL,
  `notices_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`notices_id`, `notices_title`, `notices_body`) VALUES
(1, 'Choir will have practice today.', 'The will be choir practice today. and failing to come attracts the fine of #50 only!\r\n\r\n'),
(5, '  Tithes And Weekly Blessings', 'Tithing is a very inportant part of our worship and service to the lord in this church. it is a duty we owe the lord, it is also one of the ways to know ones membership of St.Pauls Ang. Church, Nnobi.Endeavour to pay your tithe regularly. Also make sure you belong to a group in the church to guarantee that you are a full member of St Pauls Ang. Church,Nnobi.'),
(6, 'St Pauls Church, Nnobi Membership Form', 'if you have not filled the membership form, request one from the wardens and fill please.'),
(7, 'St. Pauls church, Nnobi Mens Christian Fellowship', '#Register now with st. Pauls church mens christian fellowship. Note that decision has been taken that henceforth clearance for non registered dead person is #10,000.00. Avoid such embarrassment.'),
(8, 'Mens General Meeting', 'There will be mens General meeting on Wednesday.');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) NOT NULL,
  `slider_title` varchar(100) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_image`, `slider_desc`) VALUES
(4, 'Jesus', 'event4.png', ''),
(5, 'Holy', 'event5.png', ''),
(9, 'God', 'event3.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(10) NOT NULL,
  `song_title` varchar(50) NOT NULL,
  `song_artist` varchar(50) NOT NULL,
  `song` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_title`, `song_artist`, `song`) VALUES
(55, 'promise', 'jksdf', '8tracks radio _ Visions of God (21 songs) _ free and music playlist.m4a'),
(56, 'sdf', 'ef', '8tracks radio _ Study Instrumentals # 6_ Uplifting Chorals (27 songs) _ free and music playlist.m4a'),
(57, '', '', '8tracks radio _ Christian Hard Rock Mix (Part 1) (11 songs) _ free and music playlist.m4a'),
(58, '', '', '8tracks radio _ Intelligent Classical (50 songs) _ free and music playlist.m4a'),
(59, '', '', '8tracks radio _ Praising Jesus Rocks! (24 songs) _ free and music playlist.m4a'),
(60, '', '', '8tracks radio _ Library Classical (30 songs) _ free and music playlist.m4a'),
(61, '', '', '8tracks radio _ Make Yourself Ready For War! (8 songs) _ free and music playlist.m4a'),
(62, '', '', '8tracks radio _ Big music for big thoughts (Vol 2) (10 songs) _ free and music playlist.m4a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`collect_id`);

--
-- Indexes for table `current_workers`
--
ALTER TABLE `current_workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD UNIQUE KEY `worker_email` (`worker_email`);

--
-- Indexes for table `ind_workers`
--
ALTER TABLE `ind_workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notices_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `collect`
--
ALTER TABLE `collect`
  MODIFY `collect_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `current_workers`
--
ALTER TABLE `current_workers`
  MODIFY `worker_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ind_workers`
--
ALTER TABLE `ind_workers`
  MODIFY `worker_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notices_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
