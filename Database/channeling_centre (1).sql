-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 07:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `channeling_centre`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appinment`
--

CREATE TABLE `appinment` (
  `app_id` int(11) NOT NULL,
  `sch_id` varchar(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `amount` int(255) NOT NULL,
  `accept` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appinment`
--

INSERT INTO `appinment` (`app_id`, `sch_id`, `patient_email`, `trn_date`, `amount`, `accept`, `patient_name`, `patient_address`, `patient_phone`) VALUES
(37, '1', 'Kanishkadewsandaruwan@gmail.com', '2023-09-06 09:18:28', 1500, 'Pending', '', '', ''),
(38, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:46:34', 100, '0', 'Kanishka Dew Sandaruwan', 'Banwalgodalla, Kosmulla', '+94713664071'),
(39, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:46:55', 100, '0', 'Kanishka Dew Sandaruwan', 'Banwalgodalla, Kosmulla', '+94713664071'),
(40, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:48:08', 100, '0', 'Kanishka Dew Sandaruwan', 'Banwalgodalla, Kosmulla', '+94713664071'),
(41, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:49:07', 100, 'Pending', 'Kanishka Dew Sandaruwan', 'Banwalgodalla, Kosmulla', '+94713664071'),
(42, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:52:59', 100, 'Pending', 'Kanishka', 'Banwalgodalla, Kosmulla', '713664578'),
(43, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:53:23', 100, 'Pending', 'Kanishka Dew Sandaruwan', 'Banwalgodalla, Kosmulla', '+94713664071'),
(44, '1', 'kanishkadewsandaruwan@gmail.com', '2023-09-06 22:58:17', 1500, 'Pending', 'Kanishka', 'Banwalgodalla, Kosmulla', '713664578');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`) VALUES
(5, 'mc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `trndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `username`, `trndate`) VALUES
(2, 'kanishka', 'Neluwa', 785878963, 'kanishkadewsandaruwan@gmail.com', 'Other', '827ccb0eea8a706c4c34a16891f84e7b', 'nalaka', '2020-11-14'),
(3, 'Dr. Ruwan wijevardana', 'Colombo', 713664578, 'ruwan@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'thili', '2020-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `medical_officer`
--

CREATE TABLE `medical_officer` (
  `office_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `trndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_officer`
--

INSERT INTO `medical_officer` (`office_id`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `username`, `trndate`) VALUES
(1, 'Wathsal Sewwandi', 'Mathara', 713664078, 'wathsla1996@gmail.com', 'Female', '827ccb0eea8a706c4c34a16891f84e7b', 'kaniya', '2020-11-14 00:00:00'),
(4, 'Wevaldeniya', 'Neluwa', 713664071, 'wevaldeniya@gmail.com', 'Female', '827ccb0eea8a706c4c34a16891f84e7b', 'W', '2020-11-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_img_id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_img_id`, `image1`) VALUES
(4, 'channel_doc.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `trndate` datetime NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `full_name`, `phone_number`, `dob`, `gender`, `email`, `address`, `trndate`, `password`) VALUES
(11, 'Kanishka', 713664578, '1996.09.23', 'Male', 'kanishkadewsandaruwan@gmail.com', 'Banwalgodalla, Kosmulla', '2020-12-16 00:00:00', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Thilini', 776892356, '1999.10.10', 'Female', 'thili1@gmail.com', 'Galle', '2023-07-04 00:00:00', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(11) NOT NULL,
  `docid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `roomNo` int(255) NOT NULL,
  `sc_date` date NOT NULL,
  `sc_time` time NOT NULL,
  `price` int(255) NOT NULL,
  `trndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `docid`, `description`, `roomNo`, `sc_date`, `sc_time`, `price`, `trndate`) VALUES
(1, '3', 'pain killers', 3, '2023-09-08', '14:03:00', 1500, '2020-12-13 12:16:29'),
(5, '3', 'Patta sssds', 2, '2020-12-18', '05:05:00', 1500, '2020-12-16 12:12:34'),
(6, '2', 'dgdfbhfsj', 3, '2023-07-04', '10:00:00', 2500, '2023-07-04 07:04:21'),
(7, '2', 'aa', 2, '2023-08-30', '00:37:00', 4500, '2023-08-30 08:08:43'),
(8, '2', 'aa', 3, '2023-09-15', '13:03:00', 2500, '2023-09-06 09:19:48'),
(9, '2', 'ss', 3, '2023-09-07', '13:03:00', 2500, '2023-09-06 09:19:13'),
(11, '3', 'aa', 2, '2023-09-08', '13:07:00', 1500, '2023-09-06 09:19:34'),
(12, '3', 'ss', 2, '2023-09-07', '13:03:00', 1500, '2023-09-06 09:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `slider_banner`
--

CREATE TABLE `slider_banner` (
  `slider_banner_id` int(11) NOT NULL,
  `slider_banner_01` varchar(255) NOT NULL,
  `slider_banner_02` varchar(255) NOT NULL,
  `slider_banner_03` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_banner`
--

INSERT INTO `slider_banner` (`slider_banner_id`, `slider_banner_01`, `slider_banner_02`, `slider_banner_03`) VALUES
(9, 'mc1.jpg', 'mc2.jpg', 'mc3.jpg'),
(10, 'mc2.jpg', 'mc2.jpg', 'mc2.jpg'),
(11, 'mc2.jpg', 'mc2.jpg', 'mc2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appinment`
--
ALTER TABLE `appinment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `medical_officer`
--
ALTER TABLE `medical_officer`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_img_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `slider_banner`
--
ALTER TABLE `slider_banner`
  ADD PRIMARY KEY (`slider_banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appinment`
--
ALTER TABLE `appinment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medical_officer`
--
ALTER TABLE `medical_officer`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_banner`
--
ALTER TABLE `slider_banner`
  MODIFY `slider_banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
