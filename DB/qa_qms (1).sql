-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 04:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa_qms`
--

-- --------------------------------------------------------

--
-- Table structure for table `stf_mas_tbl`
--

DROP TABLE IF EXISTS `stf_mas_tbl`;
CREATE TABLE `stf_mas_tbl` (
  `rec_id` int(12) NOT NULL,
  `Stf_fname` varchar(30) DEFAULT NULL,
  `Stf_oname` varchar(30) DEFAULT NULL,
  `Stf_lname` varchar(40) DEFAULT NULL,
  `stf_ID` varchar(6) DEFAULT NULL,
  `Stf_email` varchar(50) DEFAULT NULL,
  `stf_posn` varchar(80) DEFAULT NULL,
  `stf_off` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stf_mas_tbl`
--

INSERT INTO `stf_mas_tbl` (`rec_id`, `Stf_fname`, `Stf_oname`, `Stf_lname`, `stf_ID`, `Stf_email`, `stf_posn`, `stf_off`) VALUES
(1, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'DMIS'),
(2, 'U.', 'Blessing', 'OZUKWE', '1296', 'uozukwe@noun.edu.ng', 'Principal Confidential secretary I', 'Registry'),
(3, 'Patience', 'Lawani', 'SADO', '1608', 'plawani@noun.edu.ng', 'Chief Secretarial Assistant', 'Registry'),
(4, 'E.', 'Anekwe', 'NWANDO', '2094', 'nanekwe@noun.edu.ng', 'Chief Database Administrator', 'DMIS'),
(5, 'Chinwendu', 'Monica', 'ANIOBI', '4318', 'chinweaniobi@yahoo.com', 'Database Administrator I', 'QA'),
(6, 'Hamza', 'Yusuf', 'ABDULLAHI', '4360', 'hyusuf@noun.edu.ng', 'Senior System Analyst', 'ICT'),
(7, 'Muhammad', 'Garba', 'ZAKARI', '4373', 'mgarba@noun.edu.ng', 'Web Administrator I', ''),
(8, 'Idris', 'Dele', 'BABA', '4645', 'dbaba@noun.edu.ng', 'Higher Executive Officer', ''),
(9, 'Salihu', 'Adamu', 'GIDADO', '5089', 'smgidado@noun.edu.ng', 'Database Administrator I', ''),
(10, 'Mahmud', NULL, 'TURAKI', '5100', 'tmahmud@noun.edu.ng', 'System Analyst I', ''),
(11, 'Idris', 'M.', 'ABUBAKAR', '5112', 'midris@noun.edu.ng', 'Senior System Analyst', ''),
(12, 'Ande', 'A.', 'ANDEKIN', '5120', 'aandekin@gmail.com', 'Database Administrator I', ''),
(13, 'Halima', 'N.', 'BAMALLI', '5123', 'hbamalli@noun.edu.ng', 'System Analyst I', ''),
(14, 'Suleiman', NULL, 'ADAMU', '5125', 'suleimanadamu62@gmail.com', 'Database Administrator I', ''),
(15, 'Hadiza', NULL, 'IBRAHIM', '5134', 'hadibrahim@noun.edu.ng', 'Database Administrator I', ''),
(16, 'Muftahu', 'Baba', 'ABUBAKAR', '5140', 'mabubakar@noun.edu.ng', 'Senior Database Administrator', ''),
(17, 'Tijani', NULL, 'SULEIMAN', '5158', 'tsuleiman@noun.edu.ng', 'Database Administrator I', ''),
(18, 'Ikechukwu', 'N.', 'AKUJOBI', '5161', 'iakujobi@noun.edu.ng', 'Hardware Engineer I', ''),
(19, 'Hadiza', 'B.', 'GUJBAWU', '5188', 'gujbawunana@ymail.com', 'Hardware Engineer I', ''),
(20, 'Nazeer', 'I.', 'BELLO', '5231', 'nibello@noun.edu.ng', 'Senior Network Administrator', ''),
(21, 'Umar', 'Muhammad', 'MUKHTAR', '5233', 'umukhtar@noun.edu.ng', 'Hardware Engineer I', ''),
(22, 'Ayodele', 'E.', 'OKA', '5274', 'eoka@noun.edu.ng', 'Senior Database Administrator', ''),
(23, 'Aliyu', NULL, 'ADAMU', '5391', 'aadamu2@noun.edu.ng', 'Administrative Officer I', ''),
(24, 'David', NULL, 'PAUL', '5481', 'dpaul@noun.edu.ng', 'Senior Executive Officer', ''),
(25, 'Abldullahi', 'Abubakar', 'ABBAS', '5569', 'aabbas@noun.edu.ng', 'System Analyst II', ''),
(26, 'Ikechukwu', NULL, 'ONYIA', '5635', 'ionyia@noun.edu.ng', 'Administrative Officer I', ''),
(27, 'Musa ', 'Yusuf', 'ALIYU', '5733', 'myaliyu@noun.edu.ng', 'Database Administrator I', ''),
(28, 'Aminu', 'Aliyu', 'HAIDO', '5834', 'aminuhaido@yahoo.com', 'Senior Network Administrator', ''),
(29, 'Aminu', 'Ibrahim', 'IBRAHIM', '5836', 'iaminu@noun.edu.ng', 'System Analyst I', ''),
(30, 'Anthony', 'Adakole', 'OCHIGBO', '5850', 'aochigbo@noun.edu.ng', 'Network Administrator I', ''),
(31, 'Auwal', NULL, 'USMAN ', '5861', 'auwusman@noun.edu.ng', 'System Analyst I', ''),
(32, 'Victor', 'Abayomi', 'AKINNIBOSUN', '5877', 'vakinnibosun@noun.edu.ng', 'System Analyst I', ''),
(33, 'Toyin', 'Mercy', 'OWORU', '6088', 'toworu@noun.edu.ng', 'Chief Clerical Officer', ''),
(34, 'Endurance', NULL, 'JOHN', '6357', 'ejohn@noun.edu.ng', 'Database Administrator II', ''),
(35, 'Ike', 'tim', 'Aku', '0', 'ike@gmail.com', 'Garndener', 'Logistics'),
(36, 'Ike', 'tim', 'Aku', '0', 'ike@gmail.com', 'Garndener', 'Logistics'),
(37, 'Tim', 'Lanre', 'Ogua', '90772', 'tim@yahoo.com', 'Senior Security Officer', 'Security Department'),
(38, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'Directorate Of Management Information Systems'),
(39, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'Directorate Of Management Information Systems'),
(40, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'DMIS'),
(41, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'Dmis'),
(42, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 'Dmis'),
(43, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', '');

-- --------------------------------------------------------

--
-- Table structure for table `stf_reg`
--

DROP TABLE IF EXISTS `stf_reg`;
CREATE TABLE `stf_reg` (
  `reg_id` int(12) NOT NULL,
  `stf_fname` varchar(30) DEFAULT NULL,
  `stf_oname` varchar(30) DEFAULT NULL,
  `stf_lname` varchar(30) DEFAULT NULL,
  `stf_id` varchar(6) DEFAULT NULL,
  `stf_email` varchar(50) DEFAULT NULL,
  `stf_desgn` varchar(50) DEFAULT NULL,
  `stf_off` int(12) DEFAULT NULL,
  `stf_passw` varchar(20) DEFAULT NULL,
  `reg_token` varchar(100) DEFAULT NULL,
  `reg_date` datetime DEFAULT current_timestamp(),
  `stf_ip` varchar(18) DEFAULT NULL,
  `stf_dev_info` varchar(150) DEFAULT NULL,
  `v_stat` int(1) NOT NULL DEFAULT 0,
  `usr_cate` int(12) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stf_reg`
--

INSERT INTO `stf_reg` (`reg_id`, `stf_fname`, `stf_oname`, `stf_lname`, `stf_id`, `stf_email`, `stf_desgn`, `stf_off`, `stf_passw`, `reg_token`, `reg_date`, `stf_ip`, `stf_dev_info`, `v_stat`, `usr_cate`) VALUES
(1, ' Adeyinka  ', 'Moses', 'ADEBOYEJO', '62', 'aadeboyejo@noun.edu.ng', 'Deputy Director', 0, '2112', '36d3452bba2ca7a7323ea80a6461c28a', '2024-04-06 16:25:55', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:124.0) Gecko/20100101 Firefox/124.0', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usr_acc`
--

DROP TABLE IF EXISTS `usr_acc`;
CREATE TABLE `usr_acc` (
  `acc_id` int(12) NOT NULL,
  `stf_reg_id` int(12) NOT NULL,
  `stf_id_no` int(7) NOT NULL,
  `stf_mail` varchar(50) NOT NULL,
  `usr_pwd` varchar(20) NOT NULL,
  `acc_stat` int(1) DEFAULT 1,
  `usr_grp` int(12) DEFAULT 9
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usr_acc`
--

INSERT INTO `usr_acc` (`acc_id`, `stf_reg_id`, `stf_id_no`, `stf_mail`, `usr_pwd`, `acc_stat`, `usr_grp`) VALUES
(1, 1, 62, 'aadeboyejo@noun.edu.ng', '2112', 1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stf_mas_tbl`
--
ALTER TABLE `stf_mas_tbl`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `stf_reg`
--
ALTER TABLE `stf_reg`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `usr_acc`
--
ALTER TABLE `usr_acc`
  ADD PRIMARY KEY (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stf_mas_tbl`
--
ALTER TABLE `stf_mas_tbl`
  MODIFY `rec_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `stf_reg`
--
ALTER TABLE `stf_reg`
  MODIFY `reg_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usr_acc`
--
ALTER TABLE `usr_acc`
  MODIFY `acc_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
