-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2015 at 01:56 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pus`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`a_id` int(11) NOT NULL,
  `a_title` text NOT NULL,
  `a_description` text NOT NULL,
  `a_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Approver_Id` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`a_id`, `a_title`, `a_description`, `a_created`, `Approver_Id`) VALUES
(1, 'SK Ayer Keroh Canteen''s Day 2015', 'SK Ayer Keroh Canteen''s Day 2015 will be held on 13.06.2015(Saturday), at 9am. Parents are ', '2015-06-08 02:00:00', 'A0003'),
(10, 'All School Close on tomorrow.', 'All primary and secondary school in Melaka will close on tommorrow due to haze problem.', '2015-07-11 16:00:00', 'A0001'),
(11, 'Kelas Ganti Sempena Cuti Raya Cina', 'Semua sekolah di sekitar Melaka akan mengadakan kelas ganti sempena Cuti Raya Cina pada Januari 2015.', '2015-12-16 01:34:09', 'A0001'),
(12, 'Cuti Raya Cina', 'Cuti Raya Cina akan diberi selama seminggu bermula 17 March 2016 hingga 23 March 2016.', '2015-12-16 02:17:19', 'A0001'),
(13, 'SK Ayer Keroh Family Day', 'Parents are invited to join our family day this coming Saturday (19 December 2015).', '2015-12-16 02:19:56', 'A0003'),
(14, 'Sekolah di Sekitar Bukit Katil ditutup seminggu', 'Hal berkenaan adalah kerana Bukit Katil kini dalam keadaan kritikal wabak Denggi.', '2015-12-16 02:25:37', 'A0002'),
(15, 'Cuti Berganti Hari Sabtu 28/12', 'Sekolah dibuka sabtu ini', '2015-12-16 03:06:42', 'A0003'),
(16, 'All school in Melaka will clsoe due to haze problem', 'All primary and secondary school in Melaka will close tomorrow (17.12.2015) because of haze problem', '2015-12-16 03:22:15', 'A0001'),
(17, 'Edaran Baucer Buku 1Malaysia', 'Baucer Buku 1Malaysia akan diedarkan kepada sekolah-sekolah sekitar Ayer Keroh bermula minggu depan.', '2015-12-16 05:45:16', 'A0001');

-- --------------------------------------------------------

--
-- Table structure for table `approver`
--

CREATE TABLE IF NOT EXISTS `approver` (
  `Approver_Id` varchar(10) NOT NULL,
  `Approver_Name` varchar(50) NOT NULL,
  `Approver_Position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approver`
--

INSERT INTO `approver` (`Approver_Id`, `Approver_Name`, `Approver_Position`) VALUES
('A0001', 'Haji Muhammad Fairul', 'Pengarah Jabatan Pendidikan Negeri Melaka'),
('A0002', 'Muhamad Hiban bin Ismail', 'Timbalan Pengarah Jabatan Pendidikan Negeri Melaka'),
('A0003', 'Cheong Kok Keong', 'Headmaster SK Ayer Keroh, Melaka'),
('A0004', 'Tang Jia Jun', 'Headmaster SMK Ayer Keroh, Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `area_announcement`
--

CREATE TABLE IF NOT EXISTS `area_announcement` (
`AA_Id` int(11) NOT NULL,
  `Publisher_Id` varchar(15) NOT NULL,
  `a_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `area_announcement`
--

INSERT INTO `area_announcement` (`AA_Id`, `Publisher_Id`, `a_id`) VALUES
(5, 'PA0001', 10),
(6, 'PA0001', 10),
(7, 'PA0001', 11),
(8, 'PA0001', 12),
(9, 'PA0001', 14),
(10, 'PA0001', 14),
(11, 'PA0001', 14),
(12, 'PA0001', 15),
(13, 'PA0001', 16),
(14, 'PA0001', 17);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_record`
--

CREATE TABLE IF NOT EXISTS `disciplinary_record` (
`dr_id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `dr_type` text NOT NULL,
  `dr_description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2012 ;

--
-- Dumping data for table `disciplinary_record`
--

INSERT INTO `disciplinary_record` (`dr_id`, `Student_Id`, `dr_type`, `dr_description`) VALUES
(2001, 1, 'Heavy', 'Did not submit homework'),
(2007, 8, 'Heavy', 'Skip class'),
(2008, 9, 'none', 'none'),
(2009, 1, 'Heavy', 'Skip Class'),
(2010, 8, 'Heavy', 'Skip Class'),
(2011, 8, 'Moderate', 'Skip Class');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`exam_id` int(11) NOT NULL,
  `exam_type` varchar(50) NOT NULL,
  `exam_category` varchar(45) NOT NULL,
  `exam_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_type`, `exam_category`, `exam_date`) VALUES
(1, 'test', 'test1', '2015'),
(2, 'test', 'test2', '2015'),
(3, 'exam', 'mid_year', '2015'),
(4, 'exam', 'end_year', '2015'),
(5, 'Final Exam', 'October Session', '2015-10-07'),
(6, 'Final Exam', 'October Session', '2015-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `gcm_ids`
--

CREATE TABLE IF NOT EXISTS `gcm_ids` (
  `gcm_token` varchar(225) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gcm_ids`
--

INSERT INTO `gcm_ids` (`gcm_token`, `date_creation`) VALUES
('ecnf3mEqrBw:APA91bFBJpW157RTqQeEDmAcTyKIrCXCAeYlUzPRGw4vSDwVaFnbgmEEIj6ImjHLFWpm662HhwI6e7ovKQZBL9iahbWPh0NZB4-S9KhH4l-IYhqlVlEPkEsvvNwsQCaRgLAO-hBobak1', '2015-12-16'),
('eQDgfm42T74:APA91bGfwc5vFZl-J49S7B_HhuyTyfyZTnDr5UaM8H5iYSCj2B-0Tt_awsAZ8xtY5sBiCyj5Tk4jnUTpbwqC9evlFKmwiAnYkpQubFgOsoleDor8qWmfnqJs34fq-ndNqjWswLEcyP_K', '2015-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `head_teacher`
--

CREATE TABLE IF NOT EXISTS `head_teacher` (
`HT_Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `HT_Name` varchar(50) NOT NULL,
  `HT_Username` varchar(50) NOT NULL,
  `HT_Password` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1002 ;

--
-- Dumping data for table `head_teacher`
--

INSERT INTO `head_teacher` (`HT_Id`, `School_Id`, `HT_Name`, `HT_Username`, `HT_Password`) VALUES
(1, 1, 'Amanda Chew', 'amandaZhongChewYan', '1009'),
(2, 2, 'Liew Yuin Kuan', 'loloLiew', '09876'),
(1001, 1, 'Nadia', 'Nadia', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` varchar(15) NOT NULL,
  `parent_password` varchar(20) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_contactNo` text NOT NULL,
  `security_question` text NOT NULL,
  `security_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_password`, `parent_name`, `parent_contactNo`, `security_question`, `security_answer`) VALUES
('610119041234', '3434', 'Chong Kit Shing', '0177673498', 'What language you know?', 'many'),
('610213045213', '1111', 'Angie Haw', '15555215554', 'What is your child favourite?', 'anime'),
('650101125013', '', 'Naim', '0177673488', '', ''),
('670819015433', '', 'Amir', '01987446535', '', ''),
('690815055178', 'mama', 'Haw Poh Eng', '0173360285', 'What is your child favourite?', 'anime');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_admin`
--

CREATE TABLE IF NOT EXISTS `publisher_admin` (
  `Publisher_Id` varchar(10) NOT NULL,
  `Publisher_Name` varchar(50) NOT NULL,
  `Publisher_Password` varchar(20) NOT NULL,
  `Publisher_WorkingDistrict` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher_admin`
--

INSERT INTO `publisher_admin` (`Publisher_Id`, `Publisher_Name`, `Publisher_Password`, `Publisher_WorkingDistrict`) VALUES
('PA0001', 'Tong Xiao Xuan', '12345', 'JPM, Bukit Baru'),
('PA0002', 'Marine Gan', '67890', 'JPM, Bukit Baru');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
`result_id` int(11) NOT NULL,
  `exam_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `result_mark` int(11) NOT NULL,
  `result_grade` varchar(10) NOT NULL,
  `subject_id` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `exam_Id`, `Student_Id`, `result_mark`, `result_grade`, `subject_id`) VALUES
(1, 1, 1, 88, 'A', 'Subject1'),
(2, 1, 1, 80, 'A', 'Subject2'),
(3, 1, 1, 80, 'A', 'Subject3'),
(4, 1, 1, 77, 'B', 'Subject4'),
(5, 1, 1, 70, 'B', 'Subject6'),
(6, 1, 1, 70, 'B', 'Subject7'),
(8, 1, 1, 77, 'B', 'Subject8'),
(9, 5, 1, 90, 'A', 'Subject1'),
(10, 5, 1, 90, 'A', 'Subject1');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
`School_Id` int(11) NOT NULL,
  `School_Name` varchar(100) NOT NULL,
  `School_Type` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`School_Id`, `School_Name`, `School_Type`) VALUES
(1, 'Sekolah Kebangsaan Ayer Keroh, Melaka', 'Primary School'),
(2, 'Sekolah Menengah Kebangsaan Ayer Keroh, Melaka', 'Secondary School');

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE IF NOT EXISTS `school_admin` (
`SA_Id` int(11) NOT NULL,
  `Publisher_Id` varchar(10) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `SA_Name` varchar(50) NOT NULL,
  `SA_Password` varchar(20) NOT NULL,
  `SA_WorkingZone` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`SA_Id`, `Publisher_Id`, `School_Id`, `SA_Name`, `SA_Password`, `SA_WorkingZone`) VALUES
(1, 'PA0001', 1, 'Kenny Onn', '1111', 'SK Ayer Keroh, Melaka'),
(2, 'PA0002', 2, 'Wendy Eng', '2222', 'SMK Ayer Keroh, Melaka');

-- --------------------------------------------------------

--
-- Table structure for table `school_announcement`
--

CREATE TABLE IF NOT EXISTS `school_announcement` (
`SAM_Id` int(11) NOT NULL,
  `SA_Id` int(11) NOT NULL,
  `a_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `school_announcement`
--

INSERT INTO `school_announcement` (`SAM_Id`, `SA_Id`, `a_id`) VALUES
(6, 1, 1),
(7, 1, 10),
(8, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`Student_Id` int(11) NOT NULL,
  `parent_id` varchar(15) NOT NULL,
  `HT_Id` int(11) NOT NULL,
  `Student_Name` varchar(50) NOT NULL,
  `Student_Ic_No` varchar(20) NOT NULL,
  `Student_Class` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `parent_id`, `HT_Id`, `Student_Name`, `Student_Ic_No`, `Student_Class`) VALUES
(1, '690815055178', 1, 'Cheok Li Kuan', '950217055030', '3 Cemerlang'),
(8, '610213045213', 1, 'Cheok Chan Chan', '980123045555', '3 Cemerlang'),
(9, '610119041234', 1, 'Lee Xue Wen', '980321045234', '3 Dinamik'),
(10, '610119041234', 1, 'Osman', '991234041232', '4 Gemilang'),
(11, '670819015433', 1, 'Mohamad Yusri', '940831155011', '5 Amanah'),
(12, '650101125013', 1001, 'Nadia', '940831155012', '4 Amanah');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(15) NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
('Subject1', 'Bahasa Melayu'),
('Subject10', 'Geografi'),
('Subject11', 'Kemahiran Hidup'),
('Subject12', 'Chemistry'),
('Subject13', 'Biology'),
('Subject14', 'Physics'),
('Subject15', 'Additional Mathematics'),
('Subject2', 'English'),
('Subject3', 'Mathematics'),
('Subject4', 'Science'),
('Subject5', 'Pendidikan Islam'),
('Subject6', 'Pendidikan Moral'),
('Subject7', 'Bahasa Cina'),
('Subject8', 'Bahasa Tamil'),
('Subject9', 'Sejarah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`a_id`), ADD KEY `Approver_Id` (`Approver_Id`);

--
-- Indexes for table `approver`
--
ALTER TABLE `approver`
 ADD PRIMARY KEY (`Approver_Id`);

--
-- Indexes for table `area_announcement`
--
ALTER TABLE `area_announcement`
 ADD PRIMARY KEY (`AA_Id`), ADD KEY `Publisher_Id` (`Publisher_Id`), ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `disciplinary_record`
--
ALTER TABLE `disciplinary_record`
 ADD PRIMARY KEY (`dr_id`), ADD KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
 ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `gcm_ids`
--
ALTER TABLE `gcm_ids`
 ADD PRIMARY KEY (`gcm_token`);

--
-- Indexes for table `head_teacher`
--
ALTER TABLE `head_teacher`
 ADD PRIMARY KEY (`HT_Id`), ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `publisher_admin`
--
ALTER TABLE `publisher_admin`
 ADD PRIMARY KEY (`Publisher_Id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
 ADD PRIMARY KEY (`result_id`), ADD KEY `Student_Id` (`Student_Id`), ADD KEY `exam_Id` (`exam_Id`), ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
 ADD PRIMARY KEY (`School_Id`);

--
-- Indexes for table `school_admin`
--
ALTER TABLE `school_admin`
 ADD PRIMARY KEY (`SA_Id`), ADD KEY `Publisher_Id` (`Publisher_Id`), ADD KEY `School_Id` (`School_Id`);

--
-- Indexes for table `school_announcement`
--
ALTER TABLE `school_announcement`
 ADD PRIMARY KEY (`SAM_Id`), ADD KEY `a_id` (`a_id`), ADD KEY `SA_Id` (`SA_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`Student_Id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `HT_Id` (`HT_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `area_announcement`
--
ALTER TABLE `area_announcement`
MODIFY `AA_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `disciplinary_record`
--
ALTER TABLE `disciplinary_record`
MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2012;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `head_teacher`
--
ALTER TABLE `head_teacher`
MODIFY `HT_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
MODIFY `School_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
MODIFY `SA_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `school_announcement`
--
ALTER TABLE `school_announcement`
MODIFY `SAM_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`Approver_Id`) REFERENCES `approver` (`Approver_Id`);

--
-- Constraints for table `area_announcement`
--
ALTER TABLE `area_announcement`
ADD CONSTRAINT `area_announcement_ibfk_1` FOREIGN KEY (`Publisher_Id`) REFERENCES `publisher_admin` (`Publisher_Id`),
ADD CONSTRAINT `area_announcement_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `announcement` (`a_id`);

--
-- Constraints for table `disciplinary_record`
--
ALTER TABLE `disciplinary_record`
ADD CONSTRAINT `disciplinary_record_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`);

--
-- Constraints for table `head_teacher`
--
ALTER TABLE `head_teacher`
ADD CONSTRAINT `head_teacher_ibfk_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`),
ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`exam_Id`) REFERENCES `exam` (`exam_id`),
ADD CONSTRAINT `result_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `school_admin`
--
ALTER TABLE `school_admin`
ADD CONSTRAINT `school_admin_ibfk_1` FOREIGN KEY (`Publisher_Id`) REFERENCES `publisher_admin` (`Publisher_Id`),
ADD CONSTRAINT `school_admin_ibfk_2` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);

--
-- Constraints for table `school_announcement`
--
ALTER TABLE `school_announcement`
ADD CONSTRAINT `school_announcement_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `announcement` (`a_id`),
ADD CONSTRAINT `school_announcement_ibfk_2` FOREIGN KEY (`SA_Id`) REFERENCES `school_admin` (`SA_Id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`),
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`HT_Id`) REFERENCES `head_teacher` (`HT_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
