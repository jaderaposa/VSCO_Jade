-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 07:44 PM
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
-- Database: `ddsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` int(11) NOT NULL,
  `mun_id` int(11) NOT NULL,
  `brgy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `mun_id`, `brgy_name`) VALUES
(1, 15, 'Alimsog'),
(2, 15, 'Bagong San Roque'),
(3, 15, 'Buhatan'),
(4, 15, 'Calayucay'),
(5, 15, 'Del Rosario Poblacion'),
(6, 15, 'Fidel Surtida	'),
(7, 15, 'Lidong'),
(8, 15, 'Market Site'),
(9, 15, 'Nagsiya'),
(10, 15, 'Pandayan'),
(11, 15, 'Salvacion'),
(12, 15, 'San Andres'),
(13, 15, 'San Fernando'),
(14, 15, 'San Isidro'),
(15, 15, 'San Pedro'),
(16, 15, 'San Rafael'),
(17, 15, 'San Roque'),
(18, 15, 'San Vicente '),
(19, 15, 'Santa Misericordia'),
(20, 15, 'Santo Domingo'),
(21, 15, 'Santo Niño');

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `mun_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `region_id`, `mun_name`) VALUES
(1, 1, 'Bacacay'),
(2, 1, 'Camalig'),
(3, 1, 'Daraga'),
(4, 1, 'Guinobatan'),
(5, 1, 'Legazpi'),
(6, 1, 'Libon'),
(7, 1, 'Ligao'),
(8, 1, 'Malilipot'),
(9, 1, 'Malinao'),
(10, 1, 'Manito'),
(11, 1, 'Oas'),
(12, 1, 'Pio Duran'),
(13, 1, 'Polangui'),
(14, 1, 'Rapu-Rapu'),
(15, 1, 'Santo Domingo'),
(16, 1, 'Tabaco'),
(17, 1, 'Tiwi'),
(18, 1, 'Jovellar');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region_name`) VALUES
(1, 'Albay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mun_id` (`mun_id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangays`
--
ALTER TABLE `barangays`
  ADD CONSTRAINT `barangays_ibfk_1` FOREIGN KEY (`mun_id`) REFERENCES `municipalities` (`id`);

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
