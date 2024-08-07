-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 01:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'superadmin', 'superadmin@admin', '2023-05-18 17:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `logo`, `status`, `date`) VALUES
(2, 'Winter By Marissa Meyer', '7384926-M.jpg', 'Active', '2023-05-19 17:20:12'),
(4, 'Frindle By Andrew', '6794851-M.jpg', 'Active', '2023-05-20 17:19:59'),
(5, 'Game Of Thrones By George', '9269962-M.jpg', 'Active', '2023-05-22 03:26:48'),
(6, 'Lookin for Alaska by John Green', '12614602-M.jpg', 'Active', '2023-05-22 03:34:56'),
(7, 'Twisted Lies By ANA', '12816871-M.jpg', 'Active', '2023-05-22 03:36:46'),
(8, 'Learning Python', '1312568-M.jpg', 'Inactive', '2023-05-22 03:38:36'),
(9, 'Nobody Nowhere By Dona', '10857533-M.jpg', 'Active', '2023-05-22 03:40:19'),
(10, 'The Heart of Batrayal By Mary E', '12770099-M.jpg', 'Active', '2023-05-22 03:42:30'),
(11, 'Pound Circle By Betsy', '9997835-M.jpg', 'Active', '2023-05-22 03:43:53'),
(12, 'Gone Fishing By Tamera', '10336262-M.jpg', 'Active', '2023-05-22 03:45:27'),
(13, 'Wonder By R.J. Palacio', '0008223160-M.jpg', 'Active', '2023-05-22 03:46:37'),
(14, 'Blythewood', '0008320990-M.jpg', 'Active', '2023-05-22 03:48:03'),
(15, 'IT By Stephen King', '0008569284-M.jpg', 'Active', '2023-05-22 03:49:06'),
(16, 'Cell By Stephen King', '0008288254-M.jpg', 'Active', '2023-05-22 03:50:06'),
(17, 'Dark Justice By Jack Higgins', '259150-M.jpg', 'Active', '2023-05-22 03:52:19'),
(18, 'Red Rabbit By Tom Clancy', '0008783167-M.jpg', 'Active', '2023-05-22 03:54:34'),
(19, 'Skeleton Crew By Stephen King', '9330619-M.jpg', 'Active', '2023-05-22 03:55:42'),
(20, 'Ignite Me', '7272906-M.jpg', 'Active', '2023-05-22 03:58:08'),
(21, 'The Crown', '13326754-M.jpg', 'Inactive', '2023-05-22 03:59:19'),
(22, 'Iceberge', '272864-M.jpg', 'Active', '2023-05-22 04:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `borrowedbooks`
--

CREATE TABLE `borrowedbooks` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowedbooks`
--

INSERT INTO `borrowedbooks` (`id`, `username`, `email`, `book_id`, `date`) VALUES
(8, 'Zainab', 'Zainab@gmail.com', 8, '2023-05-24 16:08:52'),
(9, 'Zainab', 'Zainab@gmail.com', 21, '2023-05-24 16:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `registerdata`
--

CREATE TABLE `registerdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerdata`
--

INSERT INTO `registerdata` (`id`, `name`, `email`, `password`, `date`) VALUES
(3, 'Zainab', 'Zainab@gmail.com', '123456789', '2023-05-24 16:08:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registerdata`
--
ALTER TABLE `registerdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `borrowedbooks`
--
ALTER TABLE `borrowedbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registerdata`
--
ALTER TABLE `registerdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
