-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 09:21 AM
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
-- Database: `smart_student_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `designation`, `phone`, `email`, `room_number`) VALUES
(1, 'admin', 'Md. Taufik Hasan', 'MBBS', '01720530253', 'taufik.cse.bd@gmail.com', '1005');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `accession_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `issued_to` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`accession_id`, `name`, `author`, `issued_to`) VALUES
(10001, 'Algorithm ', 'Horowitz', 194089),
(10002, 'Database Management System', 'Mr. X', 194105),
(10003, 'Programing In C', 'Balagurushami', NULL),
(10004, 'Data Structure', 'Mr.Y', NULL),
(20001, 'Digital Design', 'M. Morris Meno', 194095);

-- --------------------------------------------------------

--
-- Table structure for table `cafeteria`
--

CREATE TABLE `cafeteria` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafeteria`
--

INSERT INTO `cafeteria` (`id`, `username`, `name`, `designation`, `phone`, `email`, `room_number`) VALUES
(2, 'liberian', 'Mr. XYZ', 'Liberian', '0172054546', 'xyz.bd@gmail.com', '3005'),
(4, 'liberian_user', 'Mr.Y', 'Liberian Staff', '01720530453', 'iberian.staff@student.duet.ac.bd', '3005');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doc_username` varchar(20) NOT NULL,
  `doc_name` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doc_username`, `doc_name`, `designation`, `phone`, `email`, `room_number`) VALUES
(1, 'taufik', 'Md. Taufik Hasan', 'MBBS', '01720530253', 'taufik.cse.bd@gmail.com', '1005'),
(2, 'doctor', 'Dr.X', 'FCPS', '01720530253', '194095@student.duet.ac.bd', '1006');

-- --------------------------------------------------------

--
-- Table structure for table `liberian`
--

CREATE TABLE `liberian` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(40) NOT NULL,
  `room_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `liberian`
--

INSERT INTO `liberian` (`id`, `username`, `name`, `designation`, `phone`, `email`, `room_number`) VALUES
(5, 'liberian', 'Mr. XYZ', 'Liberian', '0172054546', 'xyz.bd@gmail.com', '3005'),
(6, 'liberian_user', 'Mr. X', 'Liberian', '01720530253', 'xyz.bd@gmail.com', '305'),
(7, 'cafe_1', 'Mr. XYZ', 'Employee', '0172054546', 'xyz.bd@gmail.com', '105');

-- --------------------------------------------------------

--
-- Table structure for table `library_service`
--

CREATE TABLE `library_service` (
  `id` int(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `accession_id` varchar(20) NOT NULL,
  `service_date` varchar(30) NOT NULL,
  `issuer` varchar(20) NOT NULL,
  `return_date` varchar(30) NOT NULL,
  `fine` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_service`
--

INSERT INTO `library_service` (`id`, `student_id`, `accession_id`, `service_date`, `issuer`, `return_date`, `fine`, `status`) VALUES
(12, 194105, '10001', '2022-09-16', 'liberian', '2022-09-22', 0, 0),
(13, 194105, '10002', '2022-09-22', 'liberian', '', 0, 1),
(14, 194089, '10001', '2022-09-05', 'liberian', '', 0, 1),
(15, 194095, '20001', '2022-08-25', 'liberian', '', 0, 1),
(16, 194094, '10004', '2022-09-07', 'liberian', '2022-09-22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medical_services`
--

CREATE TABLE `medical_services` (
  `id` int(11) NOT NULL,
  `student_id` int(10) NOT NULL,
  `service_date` date NOT NULL,
  `service_descp` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_services`
--

INSERT INTO `medical_services` (`id`, `student_id`, `service_date`, `service_descp`) VALUES
(1, 194089, '2022-09-15', 'headache'),
(2, 194105, '2022-09-17', 'fevor'),
(3, 194095, '2022-09-08', 'fevor'),
(32, 194089, '2022-09-21', 'headache'),
(33, 194095, '2022-09-21', 'feveor'),
(35, 194095, '2022-09-21', 'fevor'),
(36, 194089, '2022-09-21', 'headache'),
(37, 194089, '2022-09-22', 'fevor'),
(38, 194105, '2022-09-22', 'headache'),
(39, 194089, '2022-09-26', 'feveor');

-- --------------------------------------------------------

--
-- Table structure for table `rfid522`
--

CREATE TABLE `rfid522` (
  `id` varchar(100) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(5) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rfid522`
--

INSERT INTO `rfid522` (`id`, `student_id`, `department`, `year`, `semester`, `name`, `gender`, `email`, `mobile`) VALUES
('202561', 194095, '', '', '', 'MD. Taufik Hasan', 'Male', '194095@student.duet.ac.bd', '01720530253'),
('219584', 194089, '', '', '', 'MD. Monjurul Islam', 'Male', '194089@student.duet.ac.bd', '01717184898'),
('90933', 194105, '', '', '', 'Humayra Farjana ', 'Female', '194105@student.duet.ac.bd', '01719598014');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(6) NOT NULL,
  `card_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `department` varchar(20) NOT NULL,
  `year` varchar(6) NOT NULL,
  `semester` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `card_id`, `name`, `gender`, `email`, `mobile`, `department`, `year`, `semester`) VALUES
(194089, 219584, 'MD. Monjurul Islam', 'Male', '194089@student.duet.ac.bd', '01717184898', 'CSE', '3', '1'),
(194094, 212595, 'Yeasin Mizi', 'volvo', '194094@student.duet.ac.bd', '0172045447', 'CSE', '3', '1'),
(194095, 202561, 'MD. Taufik Hasan', 'Male', '194095@student.duet.ac.bd', '01720530253', 'CSE', '3', '1'),
(194105, 90933, 'Humayra Farjana ', 'Female', '194105@student.duet.ac.bd', '0174564878', 'CSE', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `swip_card_table`
--

CREATE TABLE `swip_card_table` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `card_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `swip_card_table`
--

INSERT INTO `swip_card_table` (`id`, `username`, `card_id`) VALUES
(1, 'taufik', '202561'),
(2, 'liberian', '202561'),
(6, 'admin', '202561'),
(7, 'liberian_user', '202561'),
(8, 'cafe_1', '202561');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(4, 'admin', 'admin', 0),
(9, 'cafe_1', 'cafe_1', 3),
(5, 'doctor', 'doctor', 1),
(1, 'liberian', 'liberian', 2),
(7, 'liberian_user', 'liberian_user', 2),
(2, 'taufik', 'taufik', 1);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `tr_user` AFTER INSERT ON `users` FOR EACH ROW Begin
    insert into swip_card_table values ('',NEW.username,'');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_user_delete` AFTER DELETE ON `users` FOR EACH ROW Begin
    DELETE FROM swip_card_table WHERE username=old.username; 
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`accession_id`),
  ADD KEY `issued_to_student` (`issued_to`);

--
-- Indexes for table `cafeteria`
--
ALTER TABLE `cafeteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doc_username` (`doc_username`);

--
-- Indexes for table `liberian`
--
ALTER TABLE `liberian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liberian_username` (`username`);

--
-- Indexes for table `library_service`
--
ALTER TABLE `library_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liberian_service_student_id` (`student_id`);

--
-- Indexes for table `medical_services`
--
ALTER TABLE `medical_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id_doc_service` (`student_id`);

--
-- Indexes for table `rfid522`
--
ALTER TABLE `rfid522`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `unique` (`card_id`);

--
-- Indexes for table `swip_card_table`
--
ALTER TABLE `swip_card_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cafeteria`
--
ALTER TABLE `cafeteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `liberian`
--
ALTER TABLE `liberian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `library_service`
--
ALTER TABLE `library_service`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medical_services`
--
ALTER TABLE `medical_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `swip_card_table`
--
ALTER TABLE `swip_card_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `issued_to_student` FOREIGN KEY (`issued_to`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doc_username` FOREIGN KEY (`doc_username`) REFERENCES `users` (`username`);

--
-- Constraints for table `liberian`
--
ALTER TABLE `liberian`
  ADD CONSTRAINT `liberian_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `library_service`
--
ALTER TABLE `library_service`
  ADD CONSTRAINT `liberian_service_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `medical_services`
--
ALTER TABLE `medical_services`
  ADD CONSTRAINT `student_id_doc_service` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `swip_card_table`
--
ALTER TABLE `swip_card_table`
  ADD CONSTRAINT `username_swipe_table` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
