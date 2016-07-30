-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2016 at 08:47 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `category`) VALUES
(5, 'CSS'),
(6, 'Python'),
(7, 'Cycle'),
(8, 'Raja');

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE `content_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`id`, `title`, `author`, `category`, `content`, `date`, `img`) VALUES
(16, 'CSS Tutorial', 'Raja', 4, '<p>Hello php</p>', '2016-07-25 04:56:30', '2e8b4e76d3.jpg'),
(17, 'Html', 'Pritam', 4, '<p>HTML stands for Hyper</p>', '2016-07-25 05:24:25', '7532bdaac1.jpg'),
(18, 'COFFIE SCRIPT TUTORIAL', 'Raja', 8, '<p>Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.</p>', '2016-07-26 15:44:43', 'd88f30d0af.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `copyright_table`
--

CREATE TABLE `copyright_table` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copyright_table`
--

INSERT INTO `copyright_table` (`id`, `copyright`) VALUES
(1, 'Copyright text here');

-- --------------------------------------------------------

--
-- Table structure for table `social_table`
--

CREATE TABLE `social_table` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_table`
--

INSERT INTO `social_table` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'facebook/rdas.com', 'twitter/rdas.com', 'linkedin/rdas.com', 'googleplus/rdas6313.com');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan_table`
--

CREATE TABLE `title_slogan_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan_table`
--

INSERT INTO `title_slogan_table` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Blog', 'Learn', 'd21b3f9893.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE `user_id` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_id`
--

INSERT INTO `user_id` (`id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copyright_table`
--
ALTER TABLE `copyright_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_table`
--
ALTER TABLE `social_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan_table`
--
ALTER TABLE `title_slogan_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_id`
--
ALTER TABLE `user_id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `content_table`
--
ALTER TABLE `content_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `copyright_table`
--
ALTER TABLE `copyright_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_table`
--
ALTER TABLE `social_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `title_slogan_table`
--
ALTER TABLE `title_slogan_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_id`
--
ALTER TABLE `user_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
