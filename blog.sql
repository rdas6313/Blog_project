-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2016 at 07:26 AM
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
(6, 'Python');

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
  `img` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`id`, `title`, `author`, `category`, `content`, `date`, `img`, `user_id`, `tag`, `description`) VALUES
(18, 'COFFIE SCRIPT TUTORIAL', 'Raja', 5, '<p>Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.come.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.Hello welcome.</p>', '2016-07-26 15:44:43', '78ee1449da.jpg', 2, 'coffie script,css', 'its a coffie script tutorial'),
(27, 'New post', 'Raja', 5, '<p>Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.Its a New Post.</p>', '2016-08-30 16:54:08', '2602f7fee4.png', 1, 'Css,Html', 'Css tutorial');

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
(1, 'All right are reserved');

-- --------------------------------------------------------

--
-- Table structure for table `msg_table`
--

CREATE TABLE `msg_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg_table`
--

INSERT INTO `msg_table` (`id`, `name`, `sub`, `email`, `date`, `msg`, `status`) VALUES
(7, 'Bijay', 'nothing', 'hgjha@kjgk.com', '2016-07-31 07:48:09', 'Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.Nothing to say.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE `page_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`id`, `title`, `content`) VALUES
(4, 'About Us', '<p>About us..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>\r\n<p>About me..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>\r\n<p>About me..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `slider_table`
--

CREATE TABLE `slider_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_table`
--

INSERT INTO `slider_table` (`id`, `title`, `img`, `link`) VALUES
(5, 'side2', 'c63c372eff.jpg', 'http://www.example.com'),
(6, 'slide3', '59f096034b.jpg', 'http://www.example.com'),
(7, 'side4', 'c0b5b73cc6.jpg', 'http://www.example.com'),
(8, 'slide1', '8adacb3945.jpg', 'http://www.example.com');

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
(1, 'My Blog', 'Learnning is not enough, You must put it to use', 'd1bc009a41.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE `user_id` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_id`
--

INSERT INTO `user_id` (`id`, `username`, `password`, `name`, `role`, `email`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Raja', 1, 'rdas6313@gmail.com'),
(2, 'pritam123', '202cb962ac59075b964b07152d234b70', 'Pritam', 2, 'pritam123@gmail.com'),
(3, '', '202cb962ac59075b964b07152d234b70', '', 1, '');

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
-- Indexes for table `msg_table`
--
ALTER TABLE `msg_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_table`
--
ALTER TABLE `page_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_table`
--
ALTER TABLE `slider_table`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `copyright_table`
--
ALTER TABLE `copyright_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `msg_table`
--
ALTER TABLE `msg_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `page_table`
--
ALTER TABLE `page_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slider_table`
--
ALTER TABLE `slider_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
