-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2014 at 04:00 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ustadridwan`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_full_name`, `user_description`, `user_freeze`, `user_role`) VALUES
(1, 'admin', '10d0b55e0ce96e1ad711adaac266c9200cbc27e4', 'Admin', 'Administrator', 0, '1'),
(2, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'Demo', 'Demo', 0, '2');

INSERT INTO  `profile` (
`profile_id` ,
`profile_full_name` ,
`profile_address` ,
`profile_study` ,
`profile_activity` ,
`profile_description` ,
`profile_organisation` ,
`profile_image`
)
VALUES 
('1',  'Ahmad Ridwan', NULL , NULL , NULL , NULL , NULL , NULL
);


--
-- Dumping data for table `posting_category`
--

INSERT INTO `posting_category` (`post_cat_id`, `post_cat_name`) VALUES
(1, 'Alqur''an'),
(2, 'Hadits'),
(3, 'Aqidah'),
(4, 'Akhlaq'),
(5, 'Fiqh'),
(6, 'Tazkiyyatun Nufus'),
(7, 'Cahaya Islam'),
(8, 'Sejarah Orang Besar'),
(9, 'Muslimah'),
(10, 'Keluarga Islami'),
(11, 'Tsaqofah'),
(12, 'Informasi Umum');



--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`event_category_id`, `event_category_name`) VALUES
(1, 'Sekali'),
(2, 'Harian'),
(3, 'Pekanan'),
(4, 'Bulanan');
