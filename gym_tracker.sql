-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 05:22 AM
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
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `meal_user_id` int(11) NOT NULL,
  `meal_name` varchar(50) NOT NULL,
  `meal_ingredients` varchar(255) NOT NULL,
  `meal_calories` int(11) NOT NULL,
  `meal_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `meal_user_id`, `meal_name`, `meal_ingredients`, `meal_calories`, `meal_datetime`) VALUES
(1, 1, 'Chicken', 'Chicken, rice, lemon drops', 1200, '2021-11-05 23:15:37'),
(2, 2, 'Ice cream', 'Strawberry Icecream', 2000, '2021-11-05 23:15:37'),
(3, 1, 'test', 'test', 177, '2021-11-10 01:38:00');

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
  `user_email` varchar(50) NOT NULL,
  `user_goal_weight` int(11) NOT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_date_created` date NOT NULL DEFAULT current_timestamp(),
  `user_height` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_firstname`, `user_lastname`, `user_weight`, `user_email`, `user_goal_weight`, `user_gender`, `user_dob`, `user_date_created`, `user_height`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 231, 'admin1@gmail.com', 200, 'Male', '1996-03-08', '2021-10-24', 73),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'ellie', 'eler', 225, 'user@gmail.com', 196, 'Female', '1996-03-08', '2021-10-24', 0),
(3, 'john_wick', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 225, 'john@gmail.com', 196, 'Male', '1996-03-08', '2021-10-24', 0),
(4, 'bravo', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 225, 'bro@gmail.com', 196, 'Male', '1996-03-08', '2021-10-24', 0),
(5, 'garyneelz', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 225, 'gary@gmail.com', 196, 'Male', '1996-03-08', '2021-10-24', 0),
(10, 'test', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 225, 'test@gmail.com', 196, 'Male', '1996-03-08', '2021-10-24', 0),
(11, 'blargh', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ethan', 'Degenhardt', 225, 'blargh@gmail.com', 196, 'Male', '1996-03-08', '2021-10-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weighins`
--

CREATE TABLE `weighins` (
  `weighin_id` int(11) NOT NULL,
  `weighin_user_id` int(11) NOT NULL,
  `weighin_weight` int(11) NOT NULL,
  `weighin_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weighins`
--

INSERT INTO `weighins` (`weighin_id`, `weighin_user_id`, `weighin_weight`, `weighin_date`) VALUES
(1, 1, 199, '2021-11-09'),
(2, 1, 225, '2021-11-09'),
(3, 1, 228, '2021-11-10'),
(4, 1, 228, '2021-11-10'),
(5, 1, 231, '2021-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `weight_goals`
--

CREATE TABLE `weight_goals` (
  `weight_goal_id` int(11) NOT NULL,
  `weight_goal_name` varchar(50) NOT NULL,
  `weight_goal_start` date NOT NULL,
  `weight_goal_end` date NOT NULL,
  `weight_goal_change` float NOT NULL,
  `weight_goal_user_id` int(11) NOT NULL,
  `weight_goal_daily_calories` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weight_goals`
--

INSERT INTO `weight_goals` (`weight_goal_id`, `weight_goal_name`, `weight_goal_start`, `weight_goal_end`, `weight_goal_change`, `weight_goal_user_id`, `weight_goal_daily_calories`) VALUES
(1, 'lose some weight', '2021-11-19', '2022-12-31', -10, 1, 3823);

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
(7, '2021-11-02', 100, 'back and bi', 'gold\'s', 2),
(8, '2021-11-09', 20, 'nothing', 'none', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `user_id` (`meal_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `weighins`
--
ALTER TABLE `weighins`
  ADD PRIMARY KEY (`weighin_id`),
  ADD KEY `weighin_user_id` (`weighin_user_id`);

--
-- Indexes for table `weight_goals`
--
ALTER TABLE `weight_goals`
  ADD PRIMARY KEY (`weight_goal_id`),
  ADD KEY `weight_goal_user_id` (`weight_goal_user_id`);

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
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weighins`
--
ALTER TABLE `weighins`
  MODIFY `weighin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weight_goals`
--
ALTER TABLE `weight_goals`
  MODIFY `weight_goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `workout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`meal_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weighins`
--
ALTER TABLE `weighins`
  ADD CONSTRAINT `weighins_ibfk_1` FOREIGN KEY (`weighin_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weight_goals`
--
ALTER TABLE `weight_goals`
  ADD CONSTRAINT `weight_goals_ibfk_1` FOREIGN KEY (`weight_goal_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`workout_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
