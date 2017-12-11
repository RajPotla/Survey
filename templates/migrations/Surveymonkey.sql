-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2017 at 06:14 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `surveymonkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`user_id` INT(11) NOT NULL,
`password` VARCHAR(10) NOT NULL,
`email` VARCHAR(25) NOT NULL,
`fname` VARCHAR(20) NOT NULL,
`lname` VARCHAR(20),
`address` VARCHAR(20),
`address2` VARCHAR(20),
`city` VARCHAR(25),
`state`VARCHAR(25),
`zip` VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `email`) VALUES
(1, 'password', 'john123@gmail.com');

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
`survey_id` INT(11) NOT NULL,
`user_id` INT(11) NOT NULL,
`name` VARCHAR (20) NOT NULL,
`q1` INT(11) NOT NULL,
`q2` INT(11) NOT NULL,
`q3` INT(11) NOT NULL,
`q4` INT(11) NOT NULL,
`q5` INT(11) NOT NULL,
`q6` INT(11) NOT NULL
) ENGINE = CSV;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `name`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`) VALUES
(1, 'John', 3, 3, 3, 3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey`
--


--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey`
--


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `survey`
--
