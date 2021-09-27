-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: b26lseq4krzcvzzrah9q-mysql.services.clever-cloud.com:3306
-- Generation Time: Sep 27, 2021 at 01:50 AM
-- Server version: 8.0.22-13
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b26lseq4krzcvzzrah9q`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `zipcode` varchar(9) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `number` int DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `complement` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `people_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analyzer`
--

CREATE TABLE `analyzer` (
  `id` int NOT NULL,
  `polling_time` int DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `last_datetime` datetime DEFAULT NULL,
  `installation_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `analyzer_has_rule`
--

CREATE TABLE `analyzer_has_rule` (
  `analyzer_id` int NOT NULL,
  `rule_id` int NOT NULL,
  `notification_id` int DEFAULT NULL,
  `resolution_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `contacttype_id` int NOT NULL,
  `value` varchar(100) NOT NULL,
  `people_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE `contact_type` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `part_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `elderly`
--

CREATE TABLE `elderly` (
  `id` int NOT NULL,
  `people_id` int NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `id` int NOT NULL,
  `relative_degree` int DEFAULT NULL,
  `people_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_has_elderly`
--

CREATE TABLE `guardian_has_elderly` (
  `elderly_id` int NOT NULL,
  `guardian_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `installation`
--

CREATE TABLE `installation` (
  `id` int NOT NULL,
  `date_service_start` date DEFAULT NULL,
  `date_service_end` date DEFAULT NULL,
  `status` int DEFAULT NULL,
  `elderly_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `installation_device`
--

CREATE TABLE `installation_device` (
  `installation_id` int NOT NULL,
  `device_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `installation_has_device_sensor`
--

CREATE TABLE `installation_has_device_sensor` (
  `installation_id` int NOT NULL,
  `device_id` int NOT NULL,
  `sensor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `birth_date`) VALUES
(2, 'Maria', '1970-07-10'),
(3, 'Karol', '1980-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `recorder`
--

CREATE TABLE `recorder` (
  `id` int NOT NULL,
  `date_time` datetime NOT NULL,
  `patient_id` int DEFAULT NULL,
  `origin` varchar(45) DEFAULT NULL,
  `device_id` int DEFAULT NULL,
  `sensor_id` int DEFAULT NULL,
  `type` int DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `observation` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
  `id` int NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id` int NOT NULL,
  `rule` blob NOT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `capability` varchar(500) DEFAULT NULL,
  `part_number` varchar(45) DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `data_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id` int NOT NULL,
  `type` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_has_device`
--

CREATE TABLE `sensor_has_device` (
  `sensor_id` int NOT NULL,
  `device_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_people1_idx` (`people_id`);

--
-- Indexes for table `analyzer`
--
ALTER TABLE `analyzer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_installation_id_idx` (`installation_id`);

--
-- Indexes for table `analyzer_has_rule`
--
ALTER TABLE `analyzer_has_rule`
  ADD PRIMARY KEY (`analyzer_id`,`rule_id`),
  ADD KEY `fk_analyzer_has_rule_rule1_idx` (`rule_id`),
  ADD KEY `fk_analyzer_has_rule_analyzer1_idx` (`analyzer_id`),
  ADD KEY `fk_notification_idx` (`notification_id`),
  ADD KEY `fk_resolution_idx` (`resolution_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`,`people_id`),
  ADD KEY `fk_contat_type_idx` (`contacttype_id`),
  ADD KEY `fk_contact_people1_idx` (`people_id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elderly`
--
ALTER TABLE `elderly`
  ADD PRIMARY KEY (`id`,`people_id`),
  ADD KEY `fk_patient_people` (`people_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`,`people_id`),
  ADD KEY `fk_customer_people1_idx` (`people_id`);

--
-- Indexes for table `guardian_has_elderly`
--
ALTER TABLE `guardian_has_elderly`
  ADD PRIMARY KEY (`elderly_id`,`guardian_id`),
  ADD KEY `fk_consumer_customer_idx` (`guardian_id`);

--
-- Indexes for table `installation`
--
ALTER TABLE `installation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_installation_consumer1_idx` (`elderly_id`);

--
-- Indexes for table `installation_device`
--
ALTER TABLE `installation_device`
  ADD PRIMARY KEY (`installation_id`,`device_id`),
  ADD KEY `fk_device_idx` (`device_id`);

--
-- Indexes for table `installation_has_device_sensor`
--
ALTER TABLE `installation_has_device_sensor`
  ADD PRIMARY KEY (`installation_id`,`device_id`,`sensor_id`),
  ADD KEY `fk_device_id_idx` (`device_id`),
  ADD KEY `fk_sensor_id_idx` (`sensor_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recorder`
--
ALTER TABLE `recorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_record_patient_idx` (`patient_id`),
  ADD KEY `fk_recorder_device_idx` (`device_id`),
  ADD KEY `fk_recorder_sensor_idx` (`sensor_id`);

--
-- Indexes for table `resolution`
--
ALTER TABLE `resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor_supplier_fk_idx` (`supplier_id`),
  ADD KEY `data_fk_idx` (`data_id`);

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor_has_device`
--
ALTER TABLE `sensor_has_device`
  ADD PRIMARY KEY (`sensor_id`,`device_id`),
  ADD KEY `fk_sensor_has_device_device1_idx` (`device_id`),
  ADD KEY `fk_sensor_has_device_sensor1_idx` (`sensor_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analyzer`
--
ALTER TABLE `analyzer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elderly`
--
ALTER TABLE `elderly`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installation`
--
ALTER TABLE `installation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recorder`
--
ALTER TABLE `recorder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `analyzer`
--
ALTER TABLE `analyzer`
  ADD CONSTRAINT `fk_analyzer_installation_id` FOREIGN KEY (`installation_id`) REFERENCES `installation` (`id`);

--
-- Constraints for table `analyzer_has_rule`
--
ALTER TABLE `analyzer_has_rule`
  ADD CONSTRAINT `fk_analyzer_has_rule_analyzer1` FOREIGN KEY (`analyzer_id`) REFERENCES `analyzer` (`id`),
  ADD CONSTRAINT `fk_analyzer_has_rule_rule1` FOREIGN KEY (`rule_id`) REFERENCES `rule` (`id`),
  ADD CONSTRAINT `fk_notification` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`),
  ADD CONSTRAINT `fk_resolution` FOREIGN KEY (`resolution_id`) REFERENCES `resolution` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `fk_contat_type` FOREIGN KEY (`contacttype_id`) REFERENCES `contact_type` (`id`);

--
-- Constraints for table `elderly`
--
ALTER TABLE `elderly`
  ADD CONSTRAINT `fk_patient_people` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `guardian`
--
ALTER TABLE `guardian`
  ADD CONSTRAINT `fk_customer_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `guardian_has_elderly`
--
ALTER TABLE `guardian_has_elderly`
  ADD CONSTRAINT `fk_consumer_customer` FOREIGN KEY (`guardian_id`) REFERENCES `guardian` (`id`),
  ADD CONSTRAINT `fk_costumer_consumer` FOREIGN KEY (`elderly_id`) REFERENCES `elderly` (`id`);

--
-- Constraints for table `installation`
--
ALTER TABLE `installation`
  ADD CONSTRAINT `fk_installation_consumer1` FOREIGN KEY (`elderly_id`) REFERENCES `elderly` (`id`);

--
-- Constraints for table `installation_device`
--
ALTER TABLE `installation_device`
  ADD CONSTRAINT `fk_device` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  ADD CONSTRAINT `fk_installation` FOREIGN KEY (`installation_id`) REFERENCES `installation` (`id`);

--
-- Constraints for table `installation_has_device_sensor`
--
ALTER TABLE `installation_has_device_sensor`
  ADD CONSTRAINT `fk_device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  ADD CONSTRAINT `fk_installation_id` FOREIGN KEY (`installation_id`) REFERENCES `installation` (`id`),
  ADD CONSTRAINT `fk_sensor_id` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`);

--
-- Constraints for table `recorder`
--
ALTER TABLE `recorder`
  ADD CONSTRAINT `fk_recorder_device` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  ADD CONSTRAINT `fk_recorder_patient` FOREIGN KEY (`patient_id`) REFERENCES `elderly` (`id`),
  ADD CONSTRAINT `fk_recorder_sensor` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`);

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `data_fk` FOREIGN KEY (`data_id`) REFERENCES `sensor_data` (`id`),
  ADD CONSTRAINT `sensor_supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `sensor_has_device`
--
ALTER TABLE `sensor_has_device`
  ADD CONSTRAINT `fk_sensor_has_device_device1` FOREIGN KEY (`device_id`) REFERENCES `device` (`id`),
  ADD CONSTRAINT `fk_sensor_has_device_sensor1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
