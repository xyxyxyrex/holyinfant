-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 03:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holyinfant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `access_level` int(11) DEFAULT 4,
  `registered` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `admin_name`, `access_level`, `registered`) VALUES
(1, 'admin', 'admin', 'Admin', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookkeeper`
--

CREATE TABLE `tbl_bookkeeper` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `access_level` int(11) DEFAULT 2,
  `profile_picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `registered` tinyint(1) DEFAULT 0,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bookkeeper`
--

INSERT INTO `tbl_bookkeeper` (`user_id`, `username`, `password`, `firstname`, `lastname`, `birthdate`, `email`, `contact_number`, `address`, `access_level`, `profile_picture`, `date_created`, `registered`, `gender`) VALUES
(4, 'bk1', 'bk1', 'bk1', 'bk1', '1111-11-11', 'bk1', '111', 'bk1', 2, 'profile_picture/womens empowerment (1).png', '2024-03-10 11:56:08', 1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_children`
--

CREATE TABLE `tbl_children` (
  `child_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `child_description` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `health_conditions` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `parent1_name` varchar(255) DEFAULT NULL,
  `parent1_contact_number` varchar(20) DEFAULT NULL,
  `parent2_name` varchar(255) DEFAULT NULL,
  `parent2_contact_number` varchar(20) DEFAULT NULL,
  `added_by_admin` int(11) DEFAULT NULL,
  `added_by_director` int(11) DEFAULT NULL,
  `added_by_bookkeeper` int(11) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_children`
--

INSERT INTO `tbl_children` (`child_id`, `firstname`, `lastname`, `birthdate`, `status`, `child_description`, `gender`, `health_conditions`, `allergies`, `hobbies`, `parent1_name`, `parent1_contact_number`, `parent2_name`, `parent2_contact_number`, `added_by_admin`, `added_by_director`, `added_by_bookkeeper`, `profile_image`) VALUES
(6, 'Timothy', 'Ascalon', '2222-02-22', 'Status', 'asd', 'asdasd', 'asd', 'Peoplesd', 'hjas', 'asdasdasd', 'agfasdfg', 'Gabe Ascalons', 'asdasd', 1, NULL, NULL, 'uploads/1710332760_everything is blue - goularte [sem continuação].jpg'),
(10, 'ASDASD', 'ASDASASD', '2222-02-22', 'ASDASD', 'ASD', 'male', 'DASASDDSA', 'ASDfa', 'ADSDAS', 'ASD', '123', 'DASASD', '23', 1, NULL, NULL, NULL),
(12, 'FirstName', 'LASTname', '2024-03-29', 'asda', 'asdasd', 'Alien', 'asdasd', 'asdasd', 'asdasdsa', 'asd', 'dasd', 'asdasdas', 'asdasd', 1, NULL, NULL, 'uploads/1710339761_423600177_760756055936654_4837657945687289022_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_director`
--

CREATE TABLE `tbl_director` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `access_level` int(11) DEFAULT 3,
  `profile_picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `registered` tinyint(1) DEFAULT 0,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_director`
--

INSERT INTO `tbl_director` (`user_id`, `username`, `password`, `firstname`, `lastname`, `birthdate`, `email`, `contact_number`, `address`, `access_level`, `profile_picture`, `date_created`, `registered`, `gender`) VALUES
(3, 'director', '123', 'Firstname', 'Lastname', '2222-02-22', 'emailadd@gmail.com', '3241233121', 'addressline1', 3, 'profile_picture/TABLE TENNIS.png', '2024-02-27 01:13:05', 1, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `donation_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donation_date` date DEFAULT NULL,
  `donation_type` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hk_schedule`
--

CREATE TABLE `tbl_hk_schedule` (
  `schedule_id` int(11) NOT NULL,
  `housekeeper_id` int(11) DEFAULT NULL,
  `shift_start` datetime DEFAULT NULL,
  `shift_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_housekeeper`
--

CREATE TABLE `tbl_housekeeper` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `access_level` int(11) DEFAULT 1,
  `profile_picture` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `registered` tinyint(1) DEFAULT 0,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_housekeeper`
--

INSERT INTO `tbl_housekeeper` (`user_id`, `username`, `password`, `firstname`, `lastname`, `birthdate`, `email`, `contact_number`, `address`, `access_level`, `profile_picture`, `date_created`, `registered`, `gender`) VALUES
(1, 'hk1', 'hk1', 'Houseekeeper', 'Keeper', '2222-02-22', 'email2@gmail.com', '202020', 'add1', 1, 'profile_picture/womens empowerment (1).png', '2024-03-10 11:37:55', 1, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bookkeeper`
--
ALTER TABLE `tbl_bookkeeper`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_children`
--
ALTER TABLE `tbl_children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `added_by_admin` (`added_by_admin`),
  ADD KEY `added_by_director` (`added_by_director`),
  ADD KEY `added_by_bookkeeper` (`added_by_bookkeeper`);

--
-- Indexes for table `tbl_director`
--
ALTER TABLE `tbl_director`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tbl_hk_schedule`
--
ALTER TABLE `tbl_hk_schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `housekeeper_id` (`housekeeper_id`);

--
-- Indexes for table `tbl_housekeeper`
--
ALTER TABLE `tbl_housekeeper`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bookkeeper`
--
ALTER TABLE `tbl_bookkeeper`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_children`
--
ALTER TABLE `tbl_children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_director`
--
ALTER TABLE `tbl_director`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hk_schedule`
--
ALTER TABLE `tbl_hk_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_housekeeper`
--
ALTER TABLE `tbl_housekeeper`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hk_schedule`
--
ALTER TABLE `tbl_hk_schedule`
  ADD CONSTRAINT `tbl_hk_schedule_ibfk_1` FOREIGN KEY (`housekeeper_id`) REFERENCES `tbl_housekeeper` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;