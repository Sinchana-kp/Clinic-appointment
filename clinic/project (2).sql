-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 06:23 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(30) NOT NULL,
  `admin_pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_pass`) VALUES
('Sanjita_N', 'Sanjita'),
('Sinchana_K', 'Sinchana'),
('Varsha_S', 'Varsha');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `pat_name` varchar(40) DEFAULT NULL,
  `pat_username` varchar(255) DEFAULT NULL,
  `doc_username` varchar(255) DEFAULT NULL,
  `doc_name` varchar(255) DEFAULT NULL,
  `doc_dept` varchar(255) DEFAULT NULL,
  `app_date` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `slot` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `pat_name`, `pat_username`, `doc_username`, `doc_name`, `doc_dept`, `app_date`, `age`, `slot`, `status`) VALUES
(923, 'Sinchana', 'Sinchana K P', 'Dr.Ashwin_Shetty', 'Dr.Ashwin Shetty', 'General Medicine', '2020-12-23', 21, 4, 'Inactive'),
(925, 'Varsha Shivshankar', 'varsh', 'Dr.Shreya_Hegde', 'Dr.Shreya Hegde', 'Gynecologist', '2021-01-01', 20, 1, 'Active'),
(930, 'SINCHANA ', 'Sinchana K P', 'Dr.Abdul_Ali', 'Dr.Abdul Ali', 'Orthopedic', '2021-01-22', 21, 1, 'Active'),
(931, 'SINCHANA ', 'Sinchana K P', 'Dr.Kavitha_Shetty', 'Dr.Kavitha Shetty', 'General Medicine', '2021-01-16', 21, 1, 'Active'),
(933, 'KANCHANA', 'kanch', 'Dr.Rekha_M', 'Dr.Rekha M', 'Gynecologist', '2021-02-16', 21, 1, 'Active'),
(935, 'sudeep', 'Sudeep', 'Dr.Ashwin_Shetty', 'Dr.Ashwin Shetty', 'General Medicine', '2021-02-19', 22, 1, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(801, 'General Medicine'),
(802, 'Gynecologist'),
(803, 'Orthopedic'),
(804, 'Cardiologist'),
(805, 'Dermatologist');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `drid` int(11) NOT NULL,
  `dr_username` varchar(30) DEFAULT NULL,
  `dr_name` varchar(50) DEFAULT NULL,
  `dr_password` varchar(50) DEFAULT NULL,
  `dr_dept` varchar(20) DEFAULT NULL,
  `dr_qualification` varchar(100) DEFAULT NULL,
  `day_from` varchar(100) DEFAULT NULL,
  `day_to` varchar(100) DEFAULT NULL,
  `a_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`drid`, `dr_username`, `dr_name`, `dr_password`, `dr_dept`, `dr_qualification`, `day_from`, `day_to`, `a_time`) VALUES
(301, 'Dr.Ashwin_Shetty', 'Dr.Ashwin Shetty', 'Ashwin', 'General Medicine', 'MBBS,MS', 'Monday', 'Friday', '10:00am-1:00pm'),
(302, 'Dr.Shreya_Hegde', 'Dr.Shreya Hegde', 'Shreya', 'Gynecologist', 'MBBS,MD', 'Friday', 'Sunday', '5:00pm-8:00pm'),
(303, 'Dr.Shyaam_Gowda', 'Dr.Shyaam Gowda', 'Shyaam', 'Orthopedic', 'MBBS,MS', 'Wednesday', 'Saturday', '10:00am-12noon'),
(304, 'Dr.Rekha_M', 'Dr.Rekha M', 'Rekha', 'Gynecologist', 'MBBS,MD', 'Monday', 'Wednesday', '09:00am-11:00am'),
(305, 'Dr.Kavitha_Shetty', 'Dr.Kavitha Shetty', 'Kavitha', 'General Medicine', 'MBBS', 'Saturday', 'Sunday', '03:00pm-06:00pm'),
(306, 'Dr.Navya_H', 'Dr.Navya H', 'Navya', 'Cardiologist', 'MBBS,MS', 'Wednesday', 'Friday', '11:00am-01:00pm'),
(307, 'Dr.Shrinivas_Nayak', 'Dr.Shrinivas Nayak', 'Shrinivas', 'General Medicine', 'MBBS,MD', 'Tuesday', 'Thursday', '05:00pm-08:00pm'),
(308, 'Dr.Abdul_Ali', 'Dr.Abdul Ali', 'Abdul', 'Orthopedic', 'MBBS,MS', 'Friday', 'Sunday', '11:00am-01:00pm'),
(309, 'Dr.Basavaraj_G', 'Dr.Basavaraj G', 'Basavaraj', 'Dermatologist', 'MBBS,BSD', 'Wednesday', 'Saturday', '05:00pm-07:00pm'),
(310, 'Dr.Vatsalya_Kawari', 'Dr.Vatsalya Kawari', 'Vatsalya', 'General Medicine', 'MBBS,MD', 'Monday', 'Wednesday', '03:00pm-06:00pm');

-- --------------------------------------------------------

--
-- Table structure for table `login_d`
--

CREATE TABLE `login_d` (
  `user_id` varchar(20) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_d`
--

INSERT INTO `login_d` (`user_id`, `username`, `password`) VALUES
('1008', 'Dr.Abdul_Ali', 'Abdul'),
('1001', 'Dr.Ashwin_Shetty', 'Ashwin'),
('1009', 'Dr.Basavaraj_G', 'Basavaraj'),
('1005', 'Dr.Kavitha_Shetty', 'Kavitha'),
('1006', 'Dr.Navya_H', 'Navya'),
('1004', 'Dr.Rekha_M', 'Rekha'),
('1002', 'Dr.Shreya_Hegde', 'Shreya'),
('1007', 'Dr.Shrinivas_Nayak', 'Shrinivas'),
('1003', 'Dr.Shyaam_Gowda', 'Shyaam'),
('1010', 'Dr.Vatsalya_Kawari', 'Vatsalya');

-- --------------------------------------------------------

--
-- Table structure for table `login_p`
--

CREATE TABLE `login_p` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_p`
--

INSERT INTO `login_p` (`user_id`, `username`, `password`) VALUES
(5008, 'Sinchana K P', '12345'),
(5009, 'poorni', '12345'),
(5010, '4NI18CS042', '12345'),
(5011, 'kanch', '12345'),
(5012, 'swathi', '12345'),
(5013, 'varsh', '12345'),
(5014, 'kavya', '123456'),
(5015, 'Sudeep', '12345');

--
-- Triggers `login_p`
--
DELIMITER $$
CREATE TRIGGER `userid` BEFORE INSERT ON `login_p` FOR EACH ROW if new.user_id>0 then set new.user_id=5000+new.user_id;
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `sl.no` int(11) NOT NULL,
  `pre_id` int(11) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `qnty` int(11) NOT NULL,
  `timing` char(2) NOT NULL,
  `dosage` varchar(11) NOT NULL DEFAULT '1-1-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`sl.no`, `pre_id`, `medicine`, `qnty`, `timing`, `dosage`) VALUES
(31, 9025, 'dolo650', 5, 'AF', '1-0-1'),
(32, 9025, 'sinerest', 6, 'AF', '1-1-1'),
(33, 9025, 'crocin', 6, 'AF', '1-0-1'),
(34, 9026, 'dolo650', 3, 'AF', '0-0-1'),
(35, 9026, 'calpol', 6, 'AF', '1-1-1'),
(36, 9026, 'crocin', 6, 'AF', '1-1-1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_username` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Mobile` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Gender` char(10) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_username`, `Name`, `Mobile`, `Email`, `City`, `Gender`, `Password`) VALUES
('4NI18CS042', 'SINCHANA ', 9380549498, 'dishahrai2001@gmail.com', 'belur', 'f', '12345'),
('kanch', 'kanchana', 9380549498, 'sinchanakp090@gmail.com', 'HASSAN', 'f', '12345'),
('kavya', 'Kavya J B', 7483318614, 'kavya@gmail.com', 'HASSAN', 'f', '123456'),
('Sinchana K P', 'SINCHANA ', 9380549498, 'dishahrai2001@gmail.com', 'belur', 'f', '12345'),
('Sudeep', 'sudeep', 9353465790, 'sudeephipparge@gmail.com', 'bidar', 'm', '12345'),
('swathi', 'swathi h', 8976543245, 'swathi@gmail.com', 'HASSAN', 'f', '12345'),
('varsh', 'Varsha Shivashankar', 9886608068, 'varsh_s@gmail.com', 'mysore', 'f', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `presc_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patientusername` varchar(255) NOT NULL,
  `doctorusername` varchar(255) NOT NULL,
  `a_date` date NOT NULL,
  `problem` varchar(255) NOT NULL,
  `advice` text DEFAULT NULL,
  `next_visit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presc_id`, `appointment_id`, `patientusername`, `doctorusername`, `a_date`, `problem`, `advice`, `next_visit`) VALUES
(9025, 923, 'Sinchana K P', 'Dr.Ashwin_Shetty', '2020-12-23', 'cold and fever', 'do come again', '2021-02-21'),
(9026, 935, 'Sudeep', 'Dr.Ashwin_Shetty', '2021-02-19', 'fever', 'drink hot water and do not eat fast food ', '2021-02-20');

--
-- Triggers `prescription`
--
DELIMITER $$
CREATE TRIGGER `appoint` AFTER INSERT ON `prescription` FOR EACH ROW UPDATE appointment SET status="Inactive" WHERE app_id=NEW.appointment_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_name`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD UNIQUE KEY `app_id` (`app_id`),
  ADD KEY `pat_username` (`pat_username`),
  ADD KEY `doc_username` (`doc_username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD KEY `dr_username` (`dr_username`);

--
-- Indexes for table `login_d`
--
ALTER TABLE `login_d`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `login_p`
--
ALTER TABLE `login_p`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `login_p_ibfk_1` (`username`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`sl.no`),
  ADD KEY `medications_ibfk` (`pre_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD UNIQUE KEY `username` (`P_username`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`presc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=936;

--
-- AUTO_INCREMENT for table `login_p`
--
ALTER TABLE `login_p`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5016;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `sl.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `presc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`dr_username`) REFERENCES `login_d` (`username`);

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `medications_ibfk` FOREIGN KEY (`pre_id`) REFERENCES `prescription` (`presc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
