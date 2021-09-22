-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 04:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tagsoftwares`
--

-- --------------------------------------------------------

--
-- Table structure for table `tagproducts`
--

CREATE TABLE `tagproducts` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_category` varchar(200) NOT NULL,
  `ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagproducts`
--

INSERT INTO `tagproducts` (`p_id`, `p_name`, `p_price`, `p_category`, `ts`) VALUES
(1, 'a', 1, 'software', '2021-09-22 00:28:28'),
(2, 'b', 2, 'software', '2021-09-22 00:28:36'),
(3, 'c', 3, 'software', '2021-09-22 00:28:44'),
(4, 'd', 4, 'software', '2021-09-22 00:28:50'),
(5, 'e', 5, 'apps', '2021-09-22 00:29:05'),
(6, 'f', 6, 'apps', '2021-09-22 00:29:14'),
(7, 'g', 7, 'apps', '2021-09-22 00:29:26'),
(8, 'h', 8, 'apps', '2021-09-22 00:29:41'),
(9, 'i', 9, 'Pdf', '2021-09-22 07:05:08'),
(10, 'j', 10, 'Pdf', '2021-09-22 07:05:17');



--
-- Indexes for table `tagproducts`
--
ALTER TABLE `tagproducts`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `tagproducts`
--
ALTER TABLE `tagproducts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
