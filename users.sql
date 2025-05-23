-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 04:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_uid` tinytext NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `encryption_key` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_uid`, `users_pwd`, `users_email`, `encryption_key`) VALUES
(22, 'IkramZulbalayev', '$2y$10$amEl/EYL0k980/n6MJdRa.WKh5T5hcgtRaJsZEgNGFzD/H5t9vf2S', 'ikram.zulbalayev@sa.stud.vu.lt', 'iuOJgkK+zBpMUcTfq8kRRLUs9fAkVcgMsodudMrQ874='),
(23, 'anotherExample', '$2y$10$6QU75J0X7FY.ZvK7K3VkdOwqOwjOJWiMcDmtdJ9IPUdLBWXXRF8TS', 'ikramzulbalaeff@gmail.com', 'jlVSxh+pkDPMoTxxH3n/JeqHL4dbFvTK1LmNsP0MC/w='),
(24, 'John', '$2y$10$.nKMaYdN0mTjGjyju5PGGeHqjwlwyfOhuoJ2m/a/.8hsK7ArrcEpa', 'ikram@gmail.com', 'spMozsu67EZZ/1rEMiv6+iqAhalSA47K08wnBdqdnzs=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
