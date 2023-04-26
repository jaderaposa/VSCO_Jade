-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 04:55 AM
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
(21, 15, 'Santo Niño'),
(22, 5, 'Sabang'),
(23, 5, 'Pigcale'),
(24, 5, 'Centro-Baybay'),
(25, 5, 'San Roque'),
(26, 5, 'Oro Site-Magallanes Street'),
(27, 5, 'Tinago'),
(28, 5, 'Kapantawan'),
(29, 5, 'Bitano'),
(30, 5, 'Gogon'),
(31, 5, 'Bonot'),
(32, 5, 'Bogtong'),
(33, 5, 'Rawis'),
(34, 5, 'Tamaoyan'),
(35, 5, 'Pawa'),
(36, 5, 'Dita'),
(37, 5, 'San Joaquin'),
(38, 5, 'Arimbay'),
(39, 19, 'Agdangan Poblacion, Baao'),
(40, 19, 'Antipolo, Baao'),
(41, 20, 'Cabanbanan, Balatan'),
(42, 20, 'Cayogcog, Balatan'),
(43, 21, 'Agos, Bato'),
(44, 21, 'Bacolod, Bato'),
(45, 22, 'Pagao, Bombon'),
(46, 22, 'San Antonio, Bombon'),
(47, 23, 'Amlongan, Buhi'),
(48, 23, 'Antipolo, Buhi'),
(49, 24, 'Bagoladio, Bula'),
(50, 24, 'Bagumbayan, Bula'),
(51, 25, 'Barcelonita, Cabusao'),
(52, 25, 'Biong, Cabusao'),
(53, 26, 'Balatasan, Calabanga'),
(54, 26, 'Balombon, Calabanga'),
(55, 27, 'Baras, Canaman'),
(56, 27, 'Del Rosario, Canaman'),
(57, 28, 'Bacgong, Caramoan'),
(58, 28, 'Antolon, Caramoan'),
(59, 29, 'Angas, Basud'),
(60, 29, 'Bactas, Basud'),
(61, 30, 'Alayao, Capalonga'),
(62, 30, 'Binawangan, Capalonga'),
(63, 31, 'Alawihao, Daet'),
(64, 31, 'Awitan, Daet'),
(65, 32, 'Bagong Bayan, Jose Panganibant'),
(66, 32, 'Calero, Jose Panganiban'),
(67, 33, 'Anahaw, Labo'),
(68, 33, 'Anameam, Labo'),
(69, 34, 'Apuao, Mercedes'),
(70, 34, 'Barangay I, Mercedes'),
(71, 35, 'Awitan, Paracale'),
(72, 35, 'Bagumbayan, Paracale'),
(73, 35, 'Calaburnay, Paracale'),
(74, 34, 'San Roque, Mercedes'),
(75, 33, 'San Francisco, Labo'),
(76, 32, 'Santa Elena, Jose Panganiban'),
(77, 31, 'Barangay II, Daet'),
(78, 30, 'Ubang, Capalonga'),
(79, 29, 'Binatagan, Basud'),
(80, 28, 'Daraga, Caramoan'),
(81, 27, 'Santa Teresita, Canaman'),
(82, 26, 'Tomagodtod, Calabanga'),
(83, 25, 'Pandan, Cabusao'),
(84, 24, 'La Victoria, Bula'),
(85, 23, 'San Ramon, Buhi'),
(86, 22, 'Santo Domingo, Bombon'),
(87, 21, 'Palo, Bato'),
(88, 20, 'Tapayas, Balatan'),
(89, 19, 'Pugay, Baao');

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
(18, 1, 'Jovellar'),
(19, 3, 'Baao'),
(20, 3, 'Balatan'),
(21, 3, 'Bato'),
(22, 3, 'Bombon'),
(23, 3, 'Buhi'),
(24, 3, 'Bula'),
(25, 3, 'Cabusao'),
(26, 3, 'Calabanga'),
(27, 3, 'Canaman'),
(28, 3, 'Caramoan'),
(29, 2, 'Basud'),
(30, 2, 'Capalonga'),
(31, 2, 'Daet'),
(32, 2, 'Jose Panganiban'),
(33, 2, 'Labo'),
(34, 2, 'Mercedes'),
(35, 2, 'Paracale');

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
(1, 'Albay'),
(2, 'Camarines Norte'),
(3, 'Camarines Sur');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `municipalities`
--
ALTER TABLE `municipalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
