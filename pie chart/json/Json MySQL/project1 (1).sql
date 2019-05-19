-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 03:33 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `degree_type` varchar(50) NOT NULL,
  `credit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) NOT NULL,
  `student_id` varchar(150) NOT NULL,
  `subject_id` varchar(150) NOT NULL,
  `teacher_id` varchar(150) NOT NULL,
  `middle_test` int(10) NOT NULL,
  `final_test` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `subject_id`, `teacher_id`, `middle_test`, `final_test`) VALUES
(13, '4', '5', '34', 10, 8),
(14, '4', '6', '35', 7, 9),
(15, '4', '7', '36', 7, 7),
(16, '4', '8', '34', 8, 9),
(17, '5', '5', '34', 9, 6),
(18, '5', '8', '33', 8, 7),
(19, '5', '6', '35', 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birthDay` datetime NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `major` varchar(150) NOT NULL,
  `image` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `parent_contact` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `name`, `birthDay`, `email`, `phone`, `address`, `major`, `image`, `year`, `parent_contact`) VALUES
(4, '20158134', 'Nguyễn Quốc Trung', '2018-12-10 16:28:00', 'trungnq16091997@gmail.com', '946611295', '14/41 Tương Mai Street, Hoàng Mai District', 'Công Nghệ Thông Tin', 'ưada', 5, 98789211),
(5, '20158001', 'Đỗ Đức An ', '2018-12-10 16:33:00', 'an.d@gmail.com', '098767512', '14/41 Tương Mai Street, Hoàng Mai District', 'Công Nghệ Thông Tin', 'image2.png', 4, 987654112),
(6, '20158117', 'Lê Đình Hải', '2018-12-10 16:34:00', 'hai.ld20158117@gmail.com', '23456879809', '14/41 Tương Mai Street, Hoàng Mai District', 'Mạng Máy Tính Và Truyền Thông ', 'image2.png', 3, 98765412),
(7, '20158002', 'Mai Thị Thu Huyền ', '2018-12-11 03:14:00', 'huyen@gmail.com', '037121231', '14/41 Giải Phóng Street, Hoàng Mai District', 'Mạng Máy Tính Và Truyền Thông ', 'image2.png', 2, 946611234);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `subject_code` varchar(150) NOT NULL,
  `subjectName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subjectName`) VALUES
(5, 'IT3055', 'Cấu trúc dữ liệu và giải thuật (Tiếng Pháp)'),
(6, 'IT3054', '    Lập trình ngôn ngữ C'),
(7, 'IT3056', 'Lập trình hướng đối tượng'),
(8, 'IT3057', ' Phát triển phần mềm phân tán'),
(9, 'IT3047', 'Công nghệ phần mềm hướng tác tử'),
(10, 'IT3000', 'Web ngữ nghĩa (cao học)'),
(11, 'IT3001', 'Kiến trúc phần mềm – các chủ đề nâng cao (cao học)'),
(13, 'IT3057', ' Phát triển phần mềm phân tán');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_teachers`
--

CREATE TABLE `subjects_teachers` (
  `teacher_id` varchar(150) NOT NULL,
  `subject_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects_teachers`
--

INSERT INTO `subjects_teachers` (`teacher_id`, `subject_id`) VALUES
('34', '5'),
('34', '8'),
('35', '13'),
('35', '6'),
('36', '7'),
('37', '9'),
('38', '10'),
('39', '11');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `teacher_code` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `birthDay` datetime DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `major` varchar(150) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `startDay` datetime DEFAULT NULL,
  `teacherDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_code`, `name`, `birthDay`, `phone`, `email`, `address`, `major`, `image`, `startDay`, `teacherDescription`) VALUES
(33, 'NV01', 'Thịnh Văn Nam ', '2018-12-10 15:10:00', '098112012', 'nam.nt@gmail.com', 'Số 10 Đặng Thai Mai, Hà Nội ', 'Khoa Học Máy Tính ', '', NULL, 'Có đam mê dạy học và đam mê nghiên cứu các công nghệ mới từ thế giới '),
(34, 'NV02', 'GS. TS. Nguyễn Văn Tiến', '2018-12-10 15:20:00', '0912 11 22 30', 'tiennv@hvnh.edu.vn', 'Số 11 Lê Thanh Nghị ', 'Khoa Học Máy Tính ', '2015_0_22_14_48_161.png', NULL, '	Cao học:\r\n–          Các kỹ thuật hiện đại trong CNTT\r\n–          Các phương pháp tiên tiến quản trị dự án CNTT\r\n–          Quản trị dự án CNTT và quản lý thay đổi\r\n–          Nguyên lý và mô thức phát triển hệ phân tánĐại học:\r\n–          Phát triển phần mềm phân tán\r\n–          Giao diện người dùng\r\n–          Kỹ thuật lập trình\r\n–          Kỹ nghệ Phần mềm hướng dịch vụ\r\n–          Lập trình cấu trúc\r\n–          Tiếng Anh chuyên ngành CNTT\r\n–          An toàn thông tin\r\n–          Cấu trúc dữ liệu và giải thuật\r\n–          Tin học đại cương'),
(35, 'NV03', 'TS. Nguyễn Thị Cẩm Thủy', '2018-12-10 15:37:00', '0985.586.691 ', 'thuyntc@hvnh.edu.vn', 'Số 10 Đặng Thai Mai, Hà Nội ', 'Khoa Học Máy Tính ', '2015_0_22_14_48_402.png', NULL, '–          Các hệ thống hướng dịch vụ\r\n–          Các khía cạnh ngoài chức năng của phần mềm: đảm bảo an toàn thông tin, quản lý rủi ro, dung lỗi\r\n–          Các phương pháp phát triển phần mềm tiên tiến và ứng dụng: phần mềm đám mây, nghiệp vụ thông minh'),
(36, 'NV04', 'TS. Nguyễn Thị Hồng Hải', '2018-12-10 15:43:00', '091231231', 'hainth@hvnh.edu.vn', 'số 14 Trúc Bạch Hồ Tây Hà Nội ', 'Khoa Học Máy Tính ', '2015_0_22_14_49_03.png', NULL, '–          Các hệ thống hướng dịch vụ\r\n–          Các khía cạnh ngoài chức năng của phần mềm: đảm bảo an toàn thông tin, quản lý rủi ro, dung lỗi\r\n–          Các phương pháp phát triển phần mềm tiên tiến và ứng dụng: phần mềm đám mây, nghiệp vụ thông minh'),
(37, 'NV05', 'TS. Trần Nguyễn Hợp Châu', '2018-12-10 15:45:00', '0991212312', 'chautnh@hvnh.edu.vn', 'Số 16 ngõ 24 Đường Tương Mai ', 'Khoa Học Máy Tính ', '2015_0_22_14_52_527.png', NULL, '–          Cấu trúc dữ liệu và giải thuật (Tiếng Pháp)\r\n–          Lập trình ngôn ngữ C\r\n\r\n–          Lập trình hướng đối tượng\r\n\r\n–          Phát triển phần mềm phân tán\r\n\r\n–          Công nghệ phần mềm hướng tác tử\r\n\r\n–          Web ngữ nghĩa (cao học)\r\n\r\n–          Kiến trúc phần mềm – các chủ đề nâng cao (cao học)\r\n\r\n–          Phân tích thiết kế giải thuật\r\n\r\n–          Nguyên lý các ngôn ngữ lập trình\r\n\r\nHướng nghiên cứu:	–          Web ngữ nghĩa & Quản lý tri thức\r\n–          Công nghệ phần mềm\r\n\r\n–          Hệ thống đa tác tử\r\n\r\n–          Tính toán mọi nơi, phát triển phần mềm trên nền tảng di động'),
(38, 'NV06', 'ThS. Đinh Thị Thanh Long', '2018-12-10 15:49:00', '0912122112', 'longdtt@hvnh.edu.vn', '09 Lò Đúc ', 'Khoa Học Máy Tính ', '2015_0_22_14_53_1510.png', NULL, 'Dung Cao Tuan , Dat Trinh Tuan, Semantic Software Maintenance and Reuse System – Java Tools for Collaborative Teams. Proceeding of Japan-Vietnam Workshop on Software Engineering (JVSE) 12-2010\r\nDung Cao Tuan , Dat Trinh Tuan, Semantic Software Maintenance and Reuse System – Java Tools for Collaborative Teams. Proceeding of Japan-Vietnam Workshop on Software Engineering (JVSE) 12-2010\r\nTuan Dung Cao, Nguyen Thi Thu Trang ,Trinh Tuan Dat, Nguyen Tu Hoan and Ngo Tuan Phong. Method and tool for semantic web query construction and graphical result presentation. VNU Journal of Science, Natural Sciences and Technology Hanoi 2009\r\nTuan Dung Cao, Nguyen Thi Thu Trang, Nguyen Duc Dat, Kieu Quang Thien, Do Dinh Thang. An approach based on web services and ontology for improving the interoperability in an E-Health System. VNU Journal of Science, Natural Sciences and Technology Hanoi 2009'),
(39, 'NV07', 'ThS. Phan Hoài Trang', '2018-12-10 15:54:00', '0983200685', 'trangph@hvnh.edu.vn', 'Cổ Nhuế , Hà Nội ', 'Hệ Thống Thông Tin ', '', NULL, 'Cao Tuấn Dũng, Lê Tấn Hùng, Đặng Văn Chuyết, Đại học Bách Khoa Hà nội. Phát triển dịch vụ Web truy vấn và thao tác Ontology trong xây dựng hệ thống tư vấn y tế từ xa. Kỷ yếu Hội thảo khoa học quốc gia lần thứ tư về nghiên cứu, phát triển và ứng dụng CNTT và Truyền thông ICT Rda 2008.\r\nTuan Dung Cao, Thu Trang Nguyen, Canh Toan Tran, Manh Tuan Nguyen and Takenobu Aoshima. An experience in developing embedded software using JNI.  In Proceedings of the ICT Research and Development Workshop (ICT’07), pp. 42-49. December 05-07, 2007, Hanoi, Vietnam.\r\nCao T-D., Dieng-Kuntz R., Fiès B. Bourdeau M. Vers un système d’aide à la veille technologique guidé par une ontologie RFIA’2006, Tours, January 25-27, 2006.\r\nTuan-Dung Cao, Rose Dieng-Kuntz, Bruno Fiès An Ontology-Guided Annotation System for Technology Monitoring, IADIS International WWW/Internet 2004 Conference, Madrid, Spain, 6-9 October 2004.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects_teachers`
--
ALTER TABLE `subjects_teachers`
  ADD PRIMARY KEY (`teacher_id`,`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
