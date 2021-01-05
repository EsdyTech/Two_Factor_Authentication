-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 20, 2020 at 10:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twofactorauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(20) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `otpGen` varchar(255) NOT NULL,
  `timesUsed` varchar(255) NOT NULL,
  `dateGen` varchar(255) NOT NULL,
  `timeGen` varchar(100) NOT NULL,
  `timeElapse` varchar(100) NOT NULL,
  `dateReg` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `userName`, `phone`, `otpGen`, `timesUsed`, `dateGen`, `timeGen`, `timeElapse`, `dateReg`) VALUES
(2, 'Temitope', 'Owoeye', 'teepensam@gmail.com', 'tee', 'teepensam', '09087654322', 'W3I6E', '0', '2019-08-01 22:11:19', '', '', '2019-08-01'),
(3, 'Ahmed', 'Sodiq', 'Ahmedsodiq7@gmail.com', 'ola', 'Sawdyk', '07065903222', 'P3X3B', '1', '2020-11-18 17:02:41', '', '', '2020-09-16 18:29:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
