-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 07:43 PM
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
-- Database: `srkr ready`
--

-- --------------------------------------------------------

--
-- Table structure for table `com_users`
--

CREATE TABLE `com_users` (
  `company` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `com_users`
--

INSERT INTO `com_users` (`company`, `email`, `password`) VALUES
('Amazon', 'dharmikbanka23@gmail.com', '3d6359e48616288902c4e9cca2090b9e');

-- --------------------------------------------------------

--
-- Table structure for table `com_verification`
--

CREATE TABLE `com_verification` (
  `company` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `otp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otp_verification`
--

CREATE TABLE `otp_verification` (
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `otp` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_verification`
--

INSERT INTO `otp_verification` (`username`, `email`, `password`, `otp`) VALUES
('20B91A0529', 'battadevarshi@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2962');

-- --------------------------------------------------------

--
-- Table structure for table `stu_leaderboard`
--

CREATE TABLE `stu_leaderboard` (
  `Reg_No` varchar(10) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Group` text NOT NULL,
  `Year` smallint(6) NOT NULL,
  `Username_Hackerrank` varchar(100) NOT NULL,
  `Hackerrank` int(10) NOT NULL,
  `Username_Leetcode` varchar(100) NOT NULL,
  `Leetcode` int(10) NOT NULL,
  `Username_Codechef` varchar(100) NOT NULL,
  `Codechef` int(10) NOT NULL,
  `Username_Interviewbit` varchar(100) NOT NULL,
  `Interviewbit` int(10) NOT NULL,
  `TotalScore` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_leaderboard`
--

INSERT INTO `stu_leaderboard` (`Reg_No`, `Name`, `Email`, `Group`, `Year`, `Username_Hackerrank`, `Hackerrank`, `Username_Leetcode`, `Leetcode`, `Username_Codechef`, `Codechef`, `Username_Interviewbit`, `Interviewbit`, `TotalScore`) VALUES
('20B91A0520', 'Bakka Leela Karthik', 'karthikbaka222@gmail.com', 'CSE', 3, 'dharmikbanka23', 2346, 'dharmikbanka23', 3100, 'dharmikbanka23', 70, 'dharmikbanka23', 5503, 11019),
('20B91A0526', 'Banka Dharmik', 'dharmikbanka23@gmail.com', 'CSE', 3, 'dharmikbanka23', 2376, 'dharmikbanka23', 3100, 'dharmikbanka23', 80, 'dharmikbanka23', 5503, 11059);

-- --------------------------------------------------------

--
-- Table structure for table `stu_profile`
--

CREATE TABLE `stu_profile` (
  `Reg_No` varchar(10) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Linkedin` varchar(200) NOT NULL,
  `Career_Objective` varchar(1000) NOT NULL,
  `Tech_Skills` varchar(1000) NOT NULL,
  `Programming_Languages` varchar(1000) NOT NULL,
  `Tools` varchar(1000) NOT NULL,
  `Projects` varchar(1000) NOT NULL,
  `Internships` varchar(1000) NOT NULL,
  `Certificates` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_profile`
--

INSERT INTO `stu_profile` (`Reg_No`, `FullName`, `Email`, `Phone`, `Linkedin`, `Career_Objective`, `Tech_Skills`, `Programming_Languages`, `Tools`, `Projects`, `Internships`, `Certificates`) VALUES
('20B91A0520', 'Bakka Leela Karthik', 'karthikbaka222@gmail.com', 9123456789, 'karthik.com', 'Secure a responsible career opportunity to fully utilize my training and skills, while making a significant contribution to the success of the company', 'Cloud Computing,Block Chain ,IOT,Mobile Apps,DevOps,Automation,', 'Ruby,', 'Google Workspace,', 'SRKR Ready\r\nBuilt a website for our college to make it easier for recruiters to hire college students,Smart India Hackathon\r\nWon internal hackathon in our college for building a tool that uses OCR and OpenCV technologies to fix any errors in photo and sign uploading\r\n', 'Smart Interviews - Data Structures & Algorithms,Black Bucks - Cyber Security', 'Data Structures & Algorithms,Cyber Security'),
('20B91A0526', 'Banka Dharmik', 'dharmikbanka23@gmail.com', 9491484850, 'linkedin.com/dharmikbanka23', 'Seeking a challenging position where I could apply my technical and communication skills toward launching a successful career with an esteemed organization offering opportunities for on going professional growth in exchange for a solid work ethic, integrity, and commitment.', 'Cloud Computing,Cyber Security,Data Science,Machine Learning,Artificial Intelligence,', 'C,C++,Java,Python,R,', 'MS Office,Google Workspace,', 'SRKR Ready\r\nBuilt a website for our college to make it easier for recruiters to hire college students,Smart India Hackathon\r\nWon internal hackathon in our college for building a tool that uses OCR and OpenCV technologies to fix any errors in photo and sign uploading', 'Smart Interviews - Data Structures & Algorithms,Black Bucks - Cyber Security,Black Bucks - Tableau', 'Data Structures & Algorithms,Cyber Security,Tableau,Full Stack');

-- --------------------------------------------------------

--
-- Table structure for table `stu_users`
--

CREATE TABLE `stu_users` (
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_users`
--

INSERT INTO `stu_users` (`username`, `email`, `password`) VALUES
('20B91A0520', 'karthikbaka222@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
('20B91A0526', 'dharmikbanka23@gmail.com', '3d6359e48616288902c4e9cca2090b9e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `com_users`
--
ALTER TABLE `com_users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `com_verification`
--
ALTER TABLE `com_verification`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `otp_verification`
--
ALTER TABLE `otp_verification`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `stu_leaderboard`
--
ALTER TABLE `stu_leaderboard`
  ADD PRIMARY KEY (`Reg_No`);

--
-- Indexes for table `stu_profile`
--
ALTER TABLE `stu_profile`
  ADD PRIMARY KEY (`Reg_No`);

--
-- Indexes for table `stu_users`
--
ALTER TABLE `stu_users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
