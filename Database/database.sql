-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 06:19 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aiworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`id`, `username`, `email`, `password`, `date`) VALUES
(4, 'AIAdmin444', 'Adim09876@gmail.com', 'admin567aiworld', '2022-12-02 16:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `multipleimages`
--

CREATE TABLE `multipleimages` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multipleimages`
--

INSERT INTO `multipleimages` (`id`, `images`, `postid`) VALUES
(13, '7e571ccb-33c1-41e6-9d01-53fb6acdf192.jpg', 14),
(14, '777c92f3-d4ae-41ad-8f87-ee28bc1cd28b.jpg', 14),
(15, '4951f89f-0230-4ed9-b4fb-16fa94e305ac.jpg', 14),
(16, '308254ee-25c4-4ae0-9ca9-5f13dd84bcd3.jpg', 14),
(17, 'cb6e38e3-f00a-4cd8-86b7-17ec634e51eb.jpg', 14),
(18, 'dcec5f23-f452-416b-8955-3fc118feb779.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `social` varchar(255) NOT NULL,
  `vote` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image`, `title`, `description`, `username`, `social`, `vote`, `date`) VALUES
(14, 'dcec5f23-f452-416b-8955-3fc118feb779.jpg', 'A friendly orcish merchant', 'A friendly orcish merchant, green skin and tusks, fantasy character portrait by greg rutkowski, gaston bussiere, craig mullins', '', '', 7, '2022-12-01 00:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `userregister`
--

CREATE TABLE `userregister` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userregister`
--

INSERT INTO `userregister` (`id`, `username`, `email`, `password`, `date`) VALUES
(1, 'usman', 'abc@gmail.com', '0987654321', '2022-11-30 00:28:44'),
(3, 'charlie', 'mnop@gmail.com', 'charlie1234567', '2022-12-02 16:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipleimages`
--
ALTER TABLE `multipleimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregister`
--
ALTER TABLE `userregister`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindata`
--
ALTER TABLE `admindata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `multipleimages`
--
ALTER TABLE `multipleimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `userregister`
--
ALTER TABLE `userregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
