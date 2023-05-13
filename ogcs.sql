-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `Admission_ID` int(10) NOT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Staff_ID` int(10) DEFAULT NULL,
  `Preferred_Method` varchar(255) DEFAULT NULL,
  `Date_Admissioned` date DEFAULT NULL,
  `Admission_Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`Admission_ID`, `User_ID`, `Staff_ID`, `Preferred_Method`, `Date_Admissioned`, `Admission_Description`) VALUES
(1, 1, 4, 'Anonymous', '1998-02-19', 'Anxiety Disorder'),
(2, 2, 5, 'Introduce', '1998-01-19', 'Behavioural and Emotional Disorder'),
(3, 3, 4, 'Anonymous', '1998-03-19', 'Bipolar Affective Disorder'),
(4, 3, 3, 'Introduce', '1998-04-19', 'Depression'),
(5, 5, 2, 'Anonymous', '1998-05-19', 'Dissociation Disorder');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appointment_ID` int(10) NOT NULL,
  `Referral_ID` int(10) DEFAULT NULL,
  `Staff_ID` int(10) DEFAULT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Counselor_ID` int(10) DEFAULT NULL,
  `Date_Start` date DEFAULT NULL,
  `Date_End` date DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

CREATE TABLE `counselors` (
  `Counselor_ID` int(10) NOT NULL,
  `Counselor_Name` varchar(255) DEFAULT NULL,
  `Counselor_Address` varchar(255) DEFAULT NULL,
  `Counselor_PhoneNo` bigint(11) DEFAULT NULL,
  `Counselor_Specialty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counselors`
--

INSERT INTO `counselors` (`Counselor_ID`, `Counselor_Name`, `Counselor_Address`, `Counselor_PhoneNo`, `Counselor_Specialty`) VALUES
(1, 'René Descartes', 'Taga Rawis', 9471918324, 'Grief Counseling'),
(7, 'Socrates', 'Taga Bukid', 9471918324, 'Career Counseling'),
(8, 'Plato', 'Taga Dagat', 9471918324, 'Family Therapy'),
(9, 'Aristotle', 'Taga Siyudad', 9471918324, 'Mental Health Counseling'),
(10, 'Nietzsche', 'Taga Probinsya', 9471918324, 'Counseling Psychology'),
(11, 'Immanuel Kant', 'Sto. Domingo Jail', 9471918324, 'Cognitive Behavioral Therapy');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(10) NOT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Appointment_ID` int(10) DEFAULT NULL,
  `Amount` decimal(7,2) DEFAULT NULL,
  `MOP` tinyint(5) DEFAULT NULL,
  `DOP` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `Referral_ID` int(10) NOT NULL,
  `Staff_ID` int(10) DEFAULT NULL,
  `User_ID` int(10) DEFAULT NULL,
  `Counselor_ID` int(10) DEFAULT NULL,
  `Referral_Date` date DEFAULT NULL,
  `Situation` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `Staff_ID` int(10) NOT NULL,
  `Staff_Name` varchar(255) DEFAULT NULL,
  `Staff_Address` varchar(255) DEFAULT NULL,
  `Staff_PhoneNo` bigint(11) DEFAULT NULL,
  `Staff_Position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`Staff_ID`, `Staff_Name`, `Staff_Address`, `Staff_PhoneNo`, `Staff_Position`) VALUES
(1, 'Julius Randle', 'Polangui', 9663969556, 'Staff I'),
(2, 'Luka Doncic', 'Sorsogon', 9163969556, 'Staff II'),
(3, 'Lebron James', 'Camarines Sur', 9263969556, 'Staff III'),
(4, 'Stephen Curry', 'Camarines Norte', 9363969556, 'Staff IV'),
(5, 'Trae Young', 'Daraga', 9463969556, 'Staff V'),
(6, 'Jayson Tatum', 'Old Albay', 9563969556, 'Staff VI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(10) NOT NULL,
  `User_Name` varchar(255) DEFAULT NULL,
  `User_Pronoun` varchar(5) DEFAULT NULL,
  `User_Address` varchar(255) DEFAULT NULL,
  `User_PhoneNo` bigint(12) DEFAULT NULL,
  `User_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `User_Name`, `User_Pronoun`, `User_Address`, `User_PhoneNo`, `User_Img`) VALUES
(1, 'Jaded', 'Him', 'SDA', 9663969556, 'tulipfruit.jfif'),
(2, 'Glaiza', 'Her', 'Rawis, San Joaquin', 9526484894, ''),
(3, 'Stephen', 'It', 'San Francisco, California', 9526484814, ''),
(5, 'Andrea', 'Her', 'Rawis, San Joaquin', 9667539538, ''),
(6, 'Klay', 'Him', 'San Francisco, California', 9667247538, ''),
(9, 'asdsadsa', 'asdas', '21321321321321', 123213213, 'F.png'),
(10, 'jade', 'asdas', 'adasdasdasd', 12321321, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`Admission_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appointment_ID`),
  ADD KEY `Referral_ID` (`Referral_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Counselor_ID` (`Counselor_ID`);

--
-- Indexes for table `counselors`
--
ALTER TABLE `counselors`
  ADD PRIMARY KEY (`Counselor_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Appointment_ID` (`Appointment_ID`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`Referral_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `Admission_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appointment_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counselors`
--
ALTER TABLE `counselors`
  MODIFY `Counselor_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `Referral_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `Staff_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `admissions_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `admissions_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staffs` (`Staff_ID`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Referral_ID`) REFERENCES `referrals` (`Referral_ID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staffs` (`Staff_ID`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `appointments_ibfk_4` FOREIGN KEY (`Counselor_ID`) REFERENCES `counselors` (`Counselor_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`Appointment_ID`) REFERENCES `appointments` (`Appointment_ID`);

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `staffs` (`Staff_ID`),
  ADD CONSTRAINT `referrals_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
