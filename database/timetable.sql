-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 01:09 PM
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
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text DEFAULT NULL,
  `department_name` text DEFAULT NULL,
  `number_of_semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `department_name`, `number_of_semester`) VALUES
(1, 'Civil Engineering', 'Engineering', 6),
(2, 'IT management', 'Computer Science and Mathematics)', 6),
(3, 'Electrical Engineering', 'Engineering', 6),
(4, 'Computer Science', 'Computer Science and Mathematics)', 6);

-- --------------------------------------------------------

--
-- Table structure for table `day_table`
--

CREATE TABLE `day_table` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_table`
--

INSERT INTO `day_table` (`id`, `subject`, `course`, `duration`, `semester`, `level`, `time`, `day`) VALUES
(1, 'Fundamentals Of Computer Programming', 'Computer Science', 3, 1, 100, 1007, 1),
(2, 'Mathematics For Computer Science', 'Computer Science', 3, 1, 100, 1006, 3),
(3, 'Communication Skills  I', 'Computer Science', 2, 1, 100, 1004, 1),
(4, 'Fundamentals Of Computing I', 'Computer Science', 3, 1, 100, 1009, 4),
(5, 'Circuit Theory', 'Computer Science', 3, 1, 100, 1007, 1),
(6, 'African Studies', 'Computer Science', 2, 1, 100, 1001, 4),
(7, 'Statistical Methods I', 'Computer Science', 3, 1, 100, 1008, 3),
(8, 'Communication Skills  II', 'Computer Science', 2, 2, 100, 1003, 4);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `number_of_courses` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `number_of_courses`) VALUES
(1, 'Computer Science and Mathematics', 6),
(2, 'Engineering', 3),
(3, 'Fashion and Clothing', 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `staff_subject` text DEFAULT NULL,
  `duration` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `email`, `staff_subject`, `duration`) VALUES
(7, 'Mr Frimpong', 'rolalu.me@gmail.com', 'African Studies', 2),
(8, 'Roland Dodoo', 'roland@gmail.com', 'Circuit Theory', 3),
(9, 'Mr Godwin', 'godwin@gmail.com', 'Communication Skills  I', 2),
(10, 'Dr. Ekpe', 'ekpe@gmail.com', 'Statistical Methods I', 3),
(11, 'Dzata', 'dzata@gmail.com', 'Fundamentals Of Computer Programming', 3),
(12, 'Micheal', 'mike@gmail.com', 'Fundamentals Of Computing I', 3),
(13, 'nii', 'nii@gmail.com', 'Mathematics For Computer Science', 3),
(14, 'Quaynor', 'quaynor@gmail.com', 'Communication Skills  II', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `subject_code` varchar(25) DEFAULT NULL,
  `subject_course` varchar(100) DEFAULT NULL,
  `subject_level` int(5) DEFAULT NULL,
  `subject_semester` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_code`, `subject_course`, `subject_level`, `subject_semester`) VALUES
(1, 'Fundamentals Of Computer Programming', 'CPS 103', 'Computer Science', 100, '1'),
(2, 'Mathematics For Computer Science', 'CPS 111', 'Computer Science', 100, '1'),
(3, 'Communication Skills  I', 'COS 101', 'Computer Science', 100, '1'),
(4, 'Computer Hardware', 'CPS 108', 'Computer Science', 100, '2'),
(5, 'Fundamentals Of Computing II', 'CPS 110', 'Computer Science', 100, '2'),
(6, 'Fundamentals Of Computing I', 'CPS 109', 'Computer Science', 100, '1'),
(7, 'Introductory Electronics', 'EEE 110', 'Computer Science', 100, '2'),
(8, 'Circuit Theory', 'EEE 109', 'Computer Science', 100, '1'),
(9, 'African Studies', 'AFS 111', 'Computer Science', 100, '1'),
(10, 'Statistical Methods I', 'STA 101', 'Computer Science', 100, '1'),
(11, 'Communication Skills  II', 'CPS 102', 'Computer Science', 100, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `day_table`
--
ALTER TABLE `day_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `day_table`
--
ALTER TABLE `day_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
