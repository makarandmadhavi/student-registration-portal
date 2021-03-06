-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2019 at 04:02 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_type`
--

CREATE TABLE `admission_type` (
  `roll` varchar(40) NOT NULL,
  `receipt_type` varchar(30) NOT NULL,
  `applysch` varchar(3) DEFAULT '',
  `appid` varchar(30) DEFAULT NULL,
  `appstatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_type`
--

INSERT INTO `admission_type` (`roll`, `receipt_type`, `applysch`, `appid`, `appstatus`) VALUES
('17IT1012', 'Regular', 'No', '', ''),
('17IT1020', 'Regular', 'Yes', '21554564', 'Aproved'),
('sdfsd', 'sdsds', 'No', 'sdsds', 'sdsd');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `roll` varchar(40) NOT NULL,
  `hod` text DEFAULT NULL,
  `CC` text DEFAULT NULL,
  `stud_section` text DEFAULT NULL,
  `final_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`roll`, `hod`, `CC`, `stud_section`, `final_status`) VALUES
('17IT1012', 'Ashish', 'Varsha', 'ss', 'approved'),
('17IT1020', 'Ashish', 'Varsha', 'ss', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `division` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`id`, `name`, `department`, `division`) VALUES
(1, 'Varsha', 'IT', 'A'),
(2, 'Sunita', 'CS', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents_submitted`
--

CREATE TABLE `documents_submitted` (
  `roll` varchar(40) NOT NULL,
  `name` text NOT NULL,
  `doc_url` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents_submitted`
--

INSERT INTO `documents_submitted` (`roll`, `name`, `doc_url`) VALUES
('17IT1012', 'Marksheet-Sem 2', '../uploadedfiles/17IT1012+254110_mrok_drzewa_tory_kolejowe_mgla.jpg'),
('17IT1012', 'Marksheet-Sem 1', '../uploadedfiles/17IT1012+7.jpg'),
('17IT1020', 'Marksheet-Sem 2', '../uploadedfiles/17IT1020+254110_mrok_drzewa_tory_kolejowe_mgla.jpg'),
('17IT1020', 'Marksheet-Sem 1', '../uploadedfiles/17IT1020+7.jpg'),
('17IT1020', 'Hall Ticket', '../uploadedfiles/17IT1020+bd75aeb10ee4c1d1767758aabd76853f.jpg'),
('17IT1020', 'Caste Validity Certificate', '../uploadedfiles/17IT1020+belle-gold-dress-emma-watson-beauty-and-the-beast-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` varchar(50) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `seat_no` varchar(30) NOT NULL,
  `month_year` varchar(30) NOT NULL,
  `pointer` decimal(10,0) NOT NULL,
  `kt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `roll`, `sem`, `seat_no`, `month_year`, `pointer`, `kt`) VALUES
('17IT1012+1001', '17IT1012', '1', '1001', '2018-01', '9', 0),
('17IT1012+1002', '17IT1012', '2', '1002', '2018-05', '8', 0),
('17IT1012+1003', '17IT1012', '3', '1003', '2019-01', '8', 0),
('17IT1012+1004', '17IT1012', '4', '1004', '2019-05', '8', 0),
('17IT1020+2001', '17IT1020', '1', '2001', '2018-01', '9', 0),
('17IT1020+2002', '17IT1020', '2', '2002', '2018-11', '8', 0),
('17IT1020+2003', '17IT1020', '3', '2003', '2019-09', '8', 0),
('17IT1020+2004', '17IT1020', '4', '2004', '2019-12', '7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `username` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`username`, `department`) VALUES
('Leena', 'CS'),
('Ashish', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('17IT1012', '123', 'STUDENT'),
('17IT1020', '123', 'STUDENT'),
('Ashish', '123', 'HOD'),
('Leena', '123', 'HOD'),
('ss', '123', 'SS'),
('Sunita', '123', 'CC'),
('Varsha', '123', 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sem` int(10) NOT NULL,
  `year` varchar(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `division` varchar(1) NOT NULL,
  `batch` varchar(2) NOT NULL,
  `department` varchar(30) NOT NULL,
  `caste` varchar(30) NOT NULL,
  `admission_type` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`, `sem`, `year`, `email`, `division`, `batch`, `department`, `caste`, `admission_type`, `photo`) VALUES
('17IT1012', 'Kaushal Chande', 5, 'TE', 'chandekaushal@gmail.com', 'A', 'A2', 'IT', 'OPEN', 'Regular', 'kaushal.jpg'),
('17IT1020', 'Makarand Madhavi', 5, 'TE', 'makarandmadhavi99@gmail.com', 'A', 'A2', 'IT', 'OBC', 'Regular', 'makarand.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `id` varchar(40) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_type`
--
ALTER TABLE `admission_type`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents_submitted`
--
ALTER TABLE `documents_submitted`
  ADD UNIQUE KEY `doc_url` (`doc_url`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`department`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc`
--
ALTER TABLE `cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
