-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 09:26 PM
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
-- Table structure for table `asn_tsk`
--

DROP TABLE IF EXISTS `asn_tsk`;
CREATE TABLE `asn_tsk` (
  `rec_id` int(12) NOT NULL,
  `stf_id` int(12) NOT NULL,
  `off_id` int(12) NOT NULL,
  `tsk_id` int(12) NOT NULL,
  `tsk_desc` varchar(200) NOT NULL,
  `sub_tsk` varchar(200) NOT NULL,
  `tsk_stp` longtext NOT NULL,
  `tsk_tline` varchar(9) NOT NULL,
  `tsk_stat` varchar(15) NOT NULL,
  `dt_asn` date NOT NULL,
  `img_evd` varchar(300) NOT NULL,
  `pdf_evd` varchar(300) NOT NULL,
  `vid_evd` varchar(300) NOT NULL,
  `dt_upl` date NOT NULL,
  `asn_by` int(12) NOT NULL,
  `evl_scr` int(3) NOT NULL,
  `idf_gap` varchar(500) NOT NULL,
  `sug_imp` varchar(500) NOT NULL,
  `qa_adm` int(12) NOT NULL,
  `dt_evl` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Staff Assigned Task where evidence is uploaded';

--
-- Dumping data for table `asn_tsk`
--

INSERT INTO `asn_tsk` (`rec_id`, `stf_id`, `off_id`, `tsk_id`, `tsk_desc`, `sub_tsk`, `tsk_stp`, `tsk_tline`, `tsk_stat`, `dt_asn`, `img_evd`, `pdf_evd`, `vid_evd`, `dt_upl`, `asn_by`, `evl_scr`, `idf_gap`, `sug_imp`, `qa_adm`, `dt_evl`) VALUES
(1, 12, 24, 17, 'POP/SSS - Generate Envelop for Designated Study Center', '', 'Step 1: Login on NOUONLINE.NET\r\nStep 2: Click Generate 2024/2 Envelopes\r\nStep 3: Select Designated Study Center from dropdown and Click Generate\r\nStep 4: Click on the Envelop button on each course code listed for the Study Center\r\nStep 5: When done click \"View Server Info\" to ensure all envelopes generated tally with the number of courses offered in that center.\r\nStep 6: Return to Step 2 to select another Study center and complete the process for all Sudy centers.\r\nStep 7: (Show evidence of Study Center server info showing the generated envelop before and after the task is completed)', '3 days', 'Completed', '2024-03-26', 'img_evd/7/4bf7710b568e07058a7ae8989526a2a2.jpg', 'pdf_evd/24/26aa9a46c0a087f70a25200bbcb61f93.pdf', '', '2024-03-26', 0, 50, 'sdfdsfdsfsdfs', 'sdfdsfdsfdsfd', 0, '2024-04-01 12:19:41'),
(2, 12, 24, 18, 'POP/SSS - Update Study Center Users (Normal Users and Admin)', '', 'Step1: Login on NOUONLINE.NET\r\nStep2: Click Update Users on the Menu bar\r\nStep3: Select Designated Study Center from dropdown and Click Generate\r\nStep4: Click on the UPDATE USERS for the Study Center (If returned message is there are no users selected for the study center, contact Admin/DEA to supply staff details for the Study Center Users\r\nStep5: When done click \"View Users\" to ensure all Users are activated for that center.\r\nStep6: Return to Step 2 to select another Study center and complete the process for all Study centers.\r\nStep7: (Show evidence of Study Center server info showing the Updated Users for each Study Center before and after the task is completed)', '1 Days', '', '2024-03-26', '', '', '', '0000-00-00', 0, 0, '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `off_cate`
--

DROP TABLE IF EXISTS `off_cate`;
CREATE TABLE `off_cate` (
  `off_cate_id` int(12) NOT NULL,
  `off_cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `off_cate`
--

INSERT INTO `off_cate` (`off_cate_id`, `off_cate_name`) VALUES
(1, 'Academic Directorates'),
(2, 'Non-Academic Directorates'),
(3, 'Units'),
(4, 'Research Centers'),
(5, ' Faculties'),
(6, 'Study Centres');

-- --------------------------------------------------------

--
-- Table structure for table `off_lst`
--

DROP TABLE IF EXISTS `off_lst`;
CREATE TABLE `off_lst` (
  `off_lst_id` int(12) NOT NULL,
  `off_cate_id` int(12) NOT NULL,
  `off_nm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `off_lst`
--

INSERT INTO `off_lst` (`off_lst_id`, `off_cate_id`, `off_nm`) VALUES
(1, 1, 'Directorate for Entrepreneurship and General Studies (DEAGS)'),
(2, 1, 'Directorate of Academic Planning (DAP)'),
(3, 1, 'The Regional Training and Research Institute for Distance and Open Learning (RETRIDOL)'),
(4, 1, 'Student Industrial Work Experience Scheme (SIWES)'),
(5, 1, 'Directorate of Research Administration'),
(6, 2, 'Directorate of Advancement and Linkages'),
(7, 2, 'Directorate of Learner?s Support Services (DLSS)'),
(8, 2, 'Directorate of Academic Registry'),
(9, 2, 'Directorate of Information & Communications Technology'),
(10, 2, 'Directorate of Examination & Assessment'),
(11, 2, 'Directorate of Management Information System (DMIS)'),
(12, 2, 'Directorate of Learning Content Management System'),
(13, 2, 'Directorate of Human Resources'),
(14, 2, 'Directorate of Physical Development, Work & Services'),
(15, 2, 'Directorate of Security Services'),
(16, 2, 'Directorate of Media and Publicity'),
(17, 2, 'Directorate Of Staff Training And Development'),
(18, 2, 'Directorate of Internal Audit'),
(19, 2, 'Directorate of Procurement'),
(20, 2, 'Directorate of Quality Assurance'),
(21, 2, 'Directorate of Protocol & General Services'),
(22, 3, 'Course Material Development Unit'),
(23, 3, 'SERVICOM Unit'),
(24, 3, 'Anti-Corruption And Transparency Unit'),
(25, 3, 'NOUN Information and Call Centre (NICC)'),
(26, 3, 'Manpower Development Unit'),
(27, 3, 'Legal Services'),
(28, 3, 'Deputy Registrar(Council)'),
(29, 3, 'Transport and Logistics'),
(30, 3, 'University Clinic'),
(31, 3, 'Medical Diagnostic Laboratory'),
(32, 4, 'Africa Centre of Excellence on Technology Enhanced Learning (ACETEL)'),
(33, 4, 'Centre of Excellence in Migration and Global Studies (CEMGS)'),
(34, 4, 'Olusegun Obasanjo Centre For African Studies (OOCAS)'),
(35, 4, 'Centre for Human Resource Development (CHRD)'),
(36, 5, 'Agricultural Science'),
(37, 5, 'Arts'),
(38, 5, 'Education'),
(39, 5, 'Health Science'),
(40, 5, 'Law'),
(41, 5, 'Management Sciences'),
(42, 5, 'Science'),
(43, 5, 'Social Sciences'),
(44, 6, 'North Central'),
(45, 6, 'North East'),
(46, 6, 'North West'),
(47, 6, 'South East'),
(48, 6, 'South South'),
(49, 6, 'South West');

-- --------------------------------------------------------

--
-- Table structure for table `stf_subm_evid_tsk`
--

DROP TABLE IF EXISTS `stf_subm_evid_tsk`;
CREATE TABLE `stf_subm_evid_tsk` (
  `evid_subm_id` int(12) NOT NULL,
  `stf_id` int(12) NOT NULL,
  `off_lst` int(12) NOT NULL,
  `tsk_id` int(12) NOT NULL,
  `tsk_desc` varchar(200) NOT NULL,
  `tsk_timel` varchar(10) NOT NULL,
  `tsk_stat` char(13) NOT NULL,
  `asn_date` date NOT NULL,
  `date_subm` date NOT NULL DEFAULT current_timestamp(),
  `img_evid` varchar(300) NOT NULL,
  `pdf_evid` varchar(300) NOT NULL,
  `vid_evid` varchar(300) NOT NULL,
  `comp_sco` int(3) NOT NULL,
  `idt_gap` varchar(300) NOT NULL,
  `sug_improv` varchar(500) NOT NULL,
  `usr_dev_info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asn_tsk`
--
ALTER TABLE `asn_tsk`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `off_cate`
--
ALTER TABLE `off_cate`
  ADD PRIMARY KEY (`off_cate_id`);

--
-- Indexes for table `off_lst`
--
ALTER TABLE `off_lst`
  ADD PRIMARY KEY (`off_lst_id`);

--
-- Indexes for table `stf_subm_evid_tsk`
--
ALTER TABLE `stf_subm_evid_tsk`
  ADD PRIMARY KEY (`evid_subm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asn_tsk`
--
ALTER TABLE `asn_tsk`
  MODIFY `rec_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `off_cate`
--
ALTER TABLE `off_cate`
  MODIFY `off_cate_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `off_lst`
--
ALTER TABLE `off_lst`
  MODIFY `off_lst_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `stf_subm_evid_tsk`
--
ALTER TABLE `stf_subm_evid_tsk`
  MODIFY `evid_subm_id` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
