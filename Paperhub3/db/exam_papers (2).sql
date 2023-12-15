-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 11:14 AM
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
-- Database: `tejas1`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_papers`
--

CREATE TABLE `exam_papers` (
  `paper_id` int(11) NOT NULL,
  `academic_year_id` varchar(11) NOT NULL,
  `department_id` varchar(11) NOT NULL,
  `semester_id` varchar(11) NOT NULL,
  `exam_type_id` varchar(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `paper_file` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_papers`
--

INSERT INTO `exam_papers` (`paper_id`, `academic_year_id`, `department_id`, `semester_id`, `exam_type_id`, `subject_id`, `paper_file`) VALUES
(2, '22', '1', '5', '1', '1', '0'),
(3, '22', '1', '5', '1', '1', '0'),
(4, '22', '1', '5', '1', '1', '0'),
(5, '22', '1', '5', '1', '1', ''),
(6, '22', '1', '5', '1', '1', ''),
(7, '22-23', 'CSE', '5', 'PT-1', 'se', ''),
(8, '22-23', 'CSE', '5', 'PT-1', 'se', 'srtm (1).pd'),
(9, '22-23', 'CSE', '5', 'PT-1', 'se', 'srtm (1).pd'),
(10, '22-23', 'CSE', '5', 'PT-1', 'se', 'srtm (1).pd'),
(11, '22-23', 'CSE', '5', 'PT-1', 'se', 'srtm (1).pd'),
(12, '22-23', '1', '5', '1', 'se', 'srtm (1).pd'),
(13, '22-23', '1', '5', '1', 'se', 'srtm (1).pd'),
(14, '22-23', 'CSE', '5', 'midsem', 'EM', 'srtm.pdf'),
(15, '22-23', 'CSE', '5', 'midsem', 'DBS', 'srtm.pdf'),
(16, '21-22', 'IT', '2', 'PT-2', 'physics', 'Poster Temp'),
(17, '21-22', 'IT', '5', 'PT-1', 'se', 'C Programmi'),
(18, '21-22', 'IT', '5', 'PT-1', 'se', ''),
(19, '21-22', 'IT', '5', 'PT-1', 'se', 'DBMS .pdf'),
(20, '22-23', '1', '5', '1', 'DBS', 'Unit 1.pdf'),
(21, '21-22', 'civil', '5', 'PT-1', 'so', 'Poster Temp'),
(22, '21-22', 'civil', '5', 'PT-1', 'so', 'Domestic Wa'),
(23, '22-23', 'CSE', '2', 'PT-1', 'DBS', 'exam_papers'),
(24, '22-23', '1', '5', 'PT-1', 'se', 'college id '),
(25, '22-23', '1', '5', 'PT-1', 'se', 'Oracle.pdf'),
(26, '22-23', '1', '5', 'midsem', '1', 'srtm (5).pd'),
(27, '22-23', 'CSE', '5', 'midsem', 'DBS', 'Unit 1 (4).'),
(28, '22-23', 'CSE', '5', 'midsem', 'DBS', 'srtm (5).pd'),
(29, '21-22', 's', '5', '1', 'se', 'Unit 1 (3).'),
(30, '21-22', 's', '5', '1', 'se', 'Unit 1 (3).'),
(31, '22-23', '1', '5', 'PT-1', 'se', 'srtm (2).pd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_papers`
--
ALTER TABLE `exam_papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_papers`
--
ALTER TABLE `exam_papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
