-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2019 at 03:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canitoan_daycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_log`
--

CREATE TABLE `daily_log` (
  `ID` int(11) NOT NULL,
  `student_ID` int(11) NOT NULL,
  `date_ID` int(11) NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_log`
--

INSERT INTO `daily_log` (`ID`, `student_ID`, `date_ID`, `Time_In`, `Time_Out`) VALUES
(4, 2, 2, '11:32:52', '00:00:00'),
(5, 1, 1, '10:50:30', '00:00:00'),
(8, 2, 3, '19:06:00', '00:32:00'),
(9, 1, 3, '19:03:00', '00:32:00'),
(17, 14, 3, '22:31:00', '22:45:00'),
(18, 13, 3, '22:32:00', '22:46:00'),
(19, 13, 4, '21:46:00', '22:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `date_list`
--

CREATE TABLE `date_list` (
  `date_ID` int(11) NOT NULL,
  `date_name` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_list`
--

INSERT INTO `date_list` (`date_ID`, `date_name`) VALUES
(1, '2019-03-19'),
(2, '2019-03-20'),
(3, '2019-03-22'),
(4, '2019-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_ID` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_QTY` int(11) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `date_of_purchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_ID`, `item_name`, `item_QTY`, `item_description`, `price`, `date_of_purchase`) VALUES
(1, 'Rice', 15, 'feeding program', 1500, '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `contact_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `student_id`, `name`, `contact_number`) VALUES
(1, 1, 'Molly Good', '01-000-000'),
(2, 2, 'Lourdes Auckman', '02-000-000'),
(8, 13, 'George Clinton', '13-000-000'),
(9, 14, 'Dechlan Newman', '14-000-000');

-- --------------------------------------------------------

--
-- Table structure for table `reimbursed_inventory`
--

CREATE TABLE `reimbursed_inventory` (
  `item_ID` int(11) NOT NULL,
  `date_of_reimbursement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `student_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `PWD` varchar(3) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`student_id`, `name`, `sex`, `PWD`, `date_of_birth`, `address`) VALUES
(1, 'Sarah Good', 'Female', 'No', '2012-12-12', 'Sarah Good\'s Address'),
(2, 'Adam Auckman', 'Male', 'Yes', '2019-03-14', 'Adam Auckman\'s Address'),
(13, 'Mark Clinton', 'Male', 'No', '2019-03-13', 'Mark Clinton\'s Address'),
(14, 'Alice Newman', 'Female', 'No', '2019-03-15', 'Alice Newman\'s Address');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password`) VALUES
(1, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `date_ID` (`date_ID`);

--
-- Indexes for table `date_list`
--
ALTER TABLE `date_list`
  ADD PRIMARY KEY (`date_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `reimbursed_inventory`
--
ALTER TABLE `reimbursed_inventory`
  ADD PRIMARY KEY (`item_ID`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_log`
--
ALTER TABLE `daily_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `date_list`
--
ALTER TABLE `date_list`
  MODIFY `date_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reimbursed_inventory`
--
ALTER TABLE `reimbursed_inventory`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_log`
--
ALTER TABLE `daily_log`
  ADD CONSTRAINT `daily_log_ibfk_2` FOREIGN KEY (`date_ID`) REFERENCES `date_list` (`date_ID`),
  ADD CONSTRAINT `daily_log_ibfk_3` FOREIGN KEY (`student_ID`) REFERENCES `student_profile` (`student_id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_profile` (`student_id`);

--
-- Constraints for table `reimbursed_inventory`
--
ALTER TABLE `reimbursed_inventory`
  ADD CONSTRAINT `reimbursed_inventory_ibfk_1` FOREIGN KEY (`item_ID`) REFERENCES `inventory` (`item_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
