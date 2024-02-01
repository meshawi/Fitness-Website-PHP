-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS `fitness_db`;
USE `fitness_db`;

-- Set SQL mode and transaction settings
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Create the `users` table
CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bmi` decimal(5,2) DEFAULT NULL,
  `calorie_needs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add primary key to the `users` table
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- Set the `id` column to auto-increment
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

-- Commit the transaction
COMMIT;
