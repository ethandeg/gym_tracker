-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 05:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_firstname` varchar(25) NOT NULL,
  `user_lastname` varchar(25) NOT NULL,
  `user_weight` float DEFAULT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_weight`, `user_email`) VALUES
(1, 'admin', 'admin', 'Ethan', 'Degenhardt', 200, 'admin@gmail.com'),
(2, 'user', 'user', 'first', 'last', 255, 'user@gmail.com'),
(3, 'john_wick', 'johnwick', 'john', 'wick', 0, 'john@gmail.com'),
(4, 'bravo', 'bravo', 'bro', 'vo', NULL, 'bro@gmail.com'),
(5, 'garyneelz', 'imgary', 'gary', 'neeley', NULL, 'gary@gmail.com'),
(10, 'test', 'test', 'test', 'test', NULL, 'test@gmail.com'),
(11, 'blargh', 'test', 'blarch', 'jalsdf', NULL, 'blargh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `workout_id` int(11) NOT NULL,
  `workout_date` date NOT NULL DEFAULT current_timestamp(),
  `workout_length` float NOT NULL,
  `workout_muscle_group` varchar(25) NOT NULL,
  `workout_gym` varchar(59) DEFAULT NULL,
  `workout_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workout_id`, `workout_date`, `workout_length`, `workout_muscle_group`, `workout_gym`, `workout_user_id`) VALUES
(1, '2021-10-28', 55, 'Back and Biceps', 'Aliro', 1),
(2, '2021-10-28', 120, 'Chest and Triceps', 'Planet Fitness', 1),
(3, '2021-10-28', 20, 'test', 'test', 1),
(4, '2021-10-30', 12, 'test1', 'test1', 1),
(5, '2021-10-04', 100, 'legs', 'planet', 1),
(6, '2021-11-02', 40, 'Chest and Tri', 'Aliro', 1),
(7, '2021-11-02', 100, 'back and bi', 'gold\'s', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `workout_user_id` (`workout_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`workout_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
