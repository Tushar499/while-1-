-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 08:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university database`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `credit`) VALUES
('122', 'dld lab', 1),
('123', 'Dsa I', 3),
('153', 'Dbms lab', 1),
('233', 'OOP', 3),
('33', 'OOP lab', 1),
('53', 'ICS', 1),
('CSe15', 'algo lab', 1),
('CSe33', 'Dbms lab', 1),
('CSe43', 'Data', 3),
('CSE53', 'spl lab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` varchar(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `course_id` varchar(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `course_id`, `time`, `day`) VALUES
('12', 'H', '122', '10:00', 'Sat'),
('138', 'V', '53', '9:40', 'San'),
('153', 'A', '122', '10:00', 'Sat'),
('223', 'B', '123', '9:00', 'Sun'),
('335', 'C', 'CSE53', '8:00', 'Tue'),
('344', 'L', '123', '9:00', 'Sun'),
('433', 'C', '233', '8:00', 'Tue'),
('530', 'K', '233', '8:00', 'Tue'),
('543', 'D', '33', '9:30', 'Sun'),
('567', 'K', '233', '8:00', 'Tue'),
('6', 'F', '33', '9:30', 'Sat'),
('663', 'A', 'CSe15', '10:00', 'Sat'),
('673', 'B', 'CSe33', '9:00', 'Sun'),
('753', 'E', '53', '9:40', 'San'),
('773', 'H', '122', '10:00', 'Sat'),
('78', 'L', '123', '9:00', 'Sun'),
('8', 'E', '53', '9:40', 'Sat'),
('873', 'F', '33', '9:30', 'Sun'),
('88', 'D', 'CSe33', '9:30', 'Sun'),
('900', 'V', '53', '9:40', 'Tue');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `credit_completed` varchar(3) NOT NULL,
  `cgpa` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `credit_completed`, `cgpa`) VALUES
('0112020', 'Ratul', 'tushar@gmail.com', '67', '3.40'),
('01120202', 'Sakib', 'sakib@gmail.com', '60', '3.50'),
('0112025', 'Tushar', 'tushar@gmail.com', '67', '3.30'),
('011202550', 'Toushif', 'toushif@gmail.com', '77', '3.70'),
('011250', 'Shiddho', 'shiddho@gmail.com', '77', '3.80'),
('01125500', 'Kichuna', 'kichuna@gmail.com', '66', '3.50'),
('01145520', 'Apu', 'apu@gmail.com', '78', '3.60'),
('0115500', 'Pias', 'pias@gmail.com', '67', '3.60'),
('0116650', 'Dipa', 'dipa@gmail.com', '76', '3.30'),
('06436650', 'Rakib', 'rakib@gmail.com', '88', '3.50');

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `id` varchar(11) NOT NULL,
  `student_id` varchar(11) DEFAULT NULL,
  `section_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`id`, `student_id`, `section_id`) VALUES
('T-1', '0112020', '12'),
('T-10', '011250', '78'),
('T-11', '0115500', '12'),
('T-12', '0116650', '153'),
('T-13', '0112020', '223'),
('T-14', '01145520', '6'),
('T-15', '06436650', '663'),
('T-16', '0112025', '335'),
('T-17', '0116650', '344'),
('T-18', '0115500', '673'),
('T-19', '01120202', '753'),
('T-2', '01120202', '153'),
('T-20', '0112020', '78'),
('T-3', '011250', '223'),
('T-4', '0115500', '6'),
('T-5', '0116650', '663'),
('T-6', '01145520', '335'),
('T-7', '011250', '344'),
('T-8', '0112020', '673'),
('T-9', '01120202', '753');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `room_no`) VALUES
('1', 'Himu', 'himu@g.com', 11),
('2', 'Tarek', 't@g.com', 12),
('3', 'Sadia', 's@g.com', 13),
('4', 'Faria', 'f@g.com', 14),
('5', 'Rafi', 'r@g.com', 15);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `id` varchar(11) NOT NULL,
  `t_id` varchar(11) DEFAULT NULL,
  `section_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`id`, `t_id`, `section_id`) VALUES
('t-1', '1', '12'),
('t-10', '5', '78'),
('t-11', '1', '530'),
('t-12', '2', '543'),
('t-13', '3', '663'),
('t-14', '4', '673'),
('t-15', '5', '773'),
('t-16', '1', '153'),
('t-17', '2', '335'),
('t-18', '3', '433'),
('t-19', '4', '223'),
('t-2', '2', '153'),
('t-20', '5', '6'),
('t-3', '3', '223'),
('t-4', '4', '6'),
('t-5', '5', '663'),
('t-6', '1', '335'),
('t-7', '2', '344'),
('t-8', '3', '673'),
('t-9', '4', '753');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student_id` (`student_id`),
  ADD KEY `FK_sec_id` (`section_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_t_id` (`t_id`),
  ADD KEY `FK_section_id` (`section_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `takes`
--
ALTER TABLE `takes`
  ADD CONSTRAINT `FK_sec_id` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `FK_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `FK_section_id` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `FK_t_id` FOREIGN KEY (`t_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
