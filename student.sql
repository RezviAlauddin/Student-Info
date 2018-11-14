
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone="+00:00";

CREATE TABLE IF NOT EXISTS `student_info`(
	`first_name` varchar(20) NOT NULL,
	`last_name` varchar(20) NOT NULL,
	`gender` varchar(10) NOT NULL,
	`student_id` varchar(16) NOT NULL,
	`address` varchar(50) NOT NULL,
	`phone` varchar(20) NOT NULL,
	`gmail` varchar(20) NOT NULL,
	`user_name` varchar(30) NOT NULL,
	`passward` varchar(30) NOT NULL


) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `student_info`(`first_name`,`last_name`,`gender`,`student_id`,`address`,`phone`,`gmail`,`user_name`,`passward`) VALUES
('20150001', 'Hakko Bio Richard', 'man', '1990-09-27', 'Kp. Wangkal Cikarang Barat - Bekas', '0856949848', 'Manager', 'Tetap', 'hakkobio'),
('20150002', 'Dede Rizki ramadhan', 'woman', '1992-05-19','Pilar Timur - Cikarang Utara - Bekasi', '0856737876', 'Leader', 'Kontrak', 'dederizki');



ALTER TABLE `student_info`
ADD PRIMARY KEY (`first_name`);
