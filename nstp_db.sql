-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nstp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `id` int(10) NOT NULL,
  `coordinatorImage` longblob DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`id`, `coordinatorImage`, `email`, `facebook`, `password`) VALUES
(202110118, NULL, NULL, NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(10) NOT NULL,
  `instructorName` varchar(50) DEFAULT NULL,
  `instructorDescription` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `courseID` int(10) NOT NULL,
  `instructorImage` longblob DEFAULT NULL,
  `sectionID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `instructorName`, `instructorDescription`, `facebook`, `email`, `password`, `courseID`, `instructorImage`, `sectionID`) VALUES
(1, 'Jenny Abayari', 'Instructor I', 'Jenny Abayari', 'jennyabayari@cvsu.edu.ph', '@Instructor03', 2, '', 0),
(2, 'Armand Aton', 'Instructor I', 'Armand Aton', 'armandaton@cvsu.edu.ph', '@instructor02', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `sectionID` int(10) DEFAULT NULL,
  `yearID` int(10) DEFAULT NULL,
  `semesterID` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `course` varchar(50) DEFAULT NULL,
  `attendance` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `sectionID`, `yearID`, `semesterID`, `name`, `course`, `attendance`, `password`) VALUES
(123123123, 4, NULL, NULL, 'asdasd', '2', NULL, 'Mark123?'),
(123123156, 1, 1, 1, 'mark', '1', NULL, 'Mark123?'),
(123564897, 4, 1, 0, 'hgkjhglh', '2', NULL, 'Mark123?'),
(189189189, 4, 1, 1, 'mark', '2', NULL, 'Mark123?'),
(202110111, 4, 1, 0, 'mark', '2', NULL, 'Mark123?'),
(202110117, 2, 1, 0, 'mark', '2', NULL, 'Mark123?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `activityID` int(10) NOT NULL,
  `courseID` int(10) DEFAULT NULL,
  `activityTitle` varchar(50) DEFAULT NULL,
  `activityImage` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget`
--

CREATE TABLE `tbl_budget` (
  `budgetID` int(10) NOT NULL,
  `yearID` int(10) DEFAULT NULL,
  `total_budget` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_budget`
--

INSERT INTO `tbl_budget` (`budgetID`, `yearID`, `total_budget`) VALUES
(1, NULL, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `courseID` int(10) NOT NULL,
  `courseName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`courseID`, `courseName`) VALUES
(1, 'Civil Welfare Training Service'),
(2, 'Reserve Officers Training Corps');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expenseID` int(10) NOT NULL,
  `yearID` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `expenseName` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`expenseID`, `yearID`, `date`, `expenseName`, `amount`) VALUES
(1, 1, '2023-06-25', 'Salary for staffs and instructord', '300000'),
(4, 1, NULL, 'sddsds', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `newsID` int(10) NOT NULL,
  `newsDescription` varchar(100) DEFAULT NULL,
  `newsImage` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `programID` int(10) NOT NULL,
  `programName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `programLocation` varchar(50) NOT NULL,
  `instructorID` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`programID`, `programName`, `description`, `programLocation`, `instructorID`, `scheduleDate`, `start_time`, `end_time`) VALUES
(2, 'bayanihan', '', 'imus', 1, '2023-07-07', '15:16:00', '03:16:00'),
(3, 'asdas', 'asdasda', 'asdasd', 2, '0000-00-00', '10:53:00', '22:53:00'),
(4, 'dasdas', 'sdasdasd', 'dasda', 2, '0000-00-00', '10:59:00', '10:59:00'),
(5, 'asd', 'dasdasd', 'asdas', 1, '0000-00-00', '20:54:00', '20:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `scheduleID` int(10) NOT NULL,
  `instructorID` int(10) NOT NULL,
  `sectionID` int(10) DEFAULT NULL,
  `scheduleType` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `dow` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `schedule_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`scheduleID`, `instructorID`, `sectionID`, `scheduleType`, `title`, `description`, `location`, `dow`, `start_date`, `end_date`, `schedule_date`, `time_from`, `time_to`) VALUES
(50, 2, 4, 1, 'CLASS', '', 'ROOM 999', '1', '2023-07-10', '2023-07-31', '0000-00-00', '15:16:00', '03:16:00'),
(51, 1, 1, 2, 'FEEDING PROGRAM', 'HELPING PEOPLE OF IMUS', 'IMUS', '0', '0000-00-00', '0000-00-00', '2023-07-11', '15:17:00', '15:17:00'),
(52, 1, 1, 1, '', '', '', '0', '0000-00-00', '0000-00-00', '2023-07-11', '00:00:00', '00:00:00'),
(53, 1, 1, 2, 'asdasdas', 'dasdasdas', 'asdasd', '0', '0000-00-00', '0000-00-00', '2023-07-12', '09:21:00', '09:21:00'),
(54, 0, 1, 1, 'asdas', '', '', '0', '0000-00-00', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00'),
(55, 0, 1, 1, 'dddddddd', '', '', '0', '0000-00-00', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `sectionID` int(10) NOT NULL,
  `courseID` int(10) DEFAULT NULL,
  `sectionName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`sectionID`, `courseID`, `sectionName`) VALUES
(1, 1, 'BSIT-1C'),
(2, 1, 'BSCS - 1C'),
(3, 2, 'BSCS - 1A'),
(4, 2, 'BSIT - 1B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `semesterID` int(10) NOT NULL,
  `semesterName` varchar(50) DEFAULT NULL,
  `total_attendance` int(10) DEFAULT NULL,
  `isDefault` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_semester`
--

INSERT INTO `tbl_semester` (`semesterID`, `semesterName`, `total_attendance`, `isDefault`) VALUES
(1, 'First Semester', 70, 0),
(5, 'Second Semester', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `yearID` int(11) NOT NULL,
  `yearName` varchar(50) DEFAULT NULL,
  `isDefault` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`yearID`, `yearName`, `isDefault`) VALUES
(1, '2023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionID` (`sectionID`),
  ADD KEY `semesterID` (`semesterID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`activityID`);

--
-- Indexes for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD PRIMARY KEY (`budgetID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expenseID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`newsID`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`programID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`sectionID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`semesterID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `activityID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  MODIFY `budgetID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `courseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expenseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `newsID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `programID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `scheduleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `sectionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `semesterID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `yearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sectionID`) REFERENCES `tbl_sections` (`sectionID`);

--
-- Constraints for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD CONSTRAINT `tbl_budget_ibfk_1` FOREIGN KEY (`yearID`) REFERENCES `tbl_year` (`yearID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD CONSTRAINT `tbl_program_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD CONSTRAINT `tbl_sections_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `tbl_course` (`courseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
