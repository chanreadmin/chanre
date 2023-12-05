-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 07:34 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lmddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `id` int(11) NOT NULL,
  `hb` varchar(10) DEFAULT NULL,
  `crp` varchar(10) DEFAULT NULL,
  `rbs` varchar(10) DEFAULT NULL,
  `hba1c` varchar(10) DEFAULT NULL,
  `lipid_profile` varchar(10) DEFAULT NULL,
  `t3` varchar(10) DEFAULT NULL,
  `t4` varchar(10) DEFAULT NULL,
  `tsh` varchar(10) DEFAULT NULL,
  `lft` varchar(10) DEFAULT NULL,
  `creatinine` varchar(10) DEFAULT NULL,
  `electrolyte` varchar(10) DEFAULT NULL,
  `echo` varchar(10) DEFAULT NULL,
  `ecg` varchar(10) DEFAULT NULL,
  `xray` varchar(10) DEFAULT NULL,
  `tmt` varchar(10) DEFAULT NULL,
  `other` varchar(10) DEFAULT NULL,
  `adminName` varchar(55) DEFAULT NULL,
  `visit` varchar(10) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`id`, `hb`, `crp`, `rbs`, `hba1c`, `lipid_profile`, `t3`, `t4`, `tsh`, `lft`, `creatinine`, `electrolyte`, `echo`, `ecg`, `xray`, `tmt`, `other`, `adminName`, `visit`, `patient_name`, `patient_id`, `created_at`) VALUES
(4, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', 'shamim', '1', 'shamim', 2, '2022-11-21 10:00:13'),
(5, '3', '3', '3', '4', '4', '4', '4', '4', '1', '1', '13', '3', '3', '3', '3', '4', 'shamim', '1', 'Rohit', 3, '2022-11-21 10:01:16'),
(6, '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'shamim', '2', 'Rohit', 3, '2022-11-23 06:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `preliminarytest`
--

CREATE TABLE `preliminarytest` (
  `id` int(11) NOT NULL,
  `pdate` varchar(40) DEFAULT NULL,
  `grbps` varchar(20) DEFAULT NULL,
  `bp` int(10) DEFAULT NULL,
  `pulse` int(10) DEFAULT NULL,
  `spo2` int(10) DEFAULT NULL,
  `pweight` int(10) DEFAULT NULL,
  `pheight` int(10) DEFAULT NULL,
  `bodyfat` int(10) DEFAULT NULL,
  `visceralfat` int(10) DEFAULT NULL,
  `musclefat` int(10) DEFAULT NULL,
  `bodyage` int(10) DEFAULT NULL,
  `rm` int(10) DEFAULT NULL,
  `bmi` int(10) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `admin_name` varchar(55) DEFAULT NULL,
  `createdat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visit` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preliminarytest`
--

INSERT INTO `preliminarytest` (`id`, `pdate`, `grbps`, `bp`, `pulse`, `spo2`, `pweight`, `pheight`, `bodyfat`, `visceralfat`, `musclefat`, `bodyage`, `rm`, `bmi`, `patient_name`, `patient_id`, `admin_name`, `createdat`, `visit`) VALUES
(1, '19/11/2022', '2', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'shamim', 2, 'shamim', '2022-11-19 09:15:10', '1'),
(2, '19/11/2022', '2', 3, 4, 5, 5, 5, 5, 5, 5, 5, 55, 5, 'shamim', 2, 'shamim', '2022-11-19 09:20:02', '2'),
(3, '19/11/2022', '8', 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 'shamim', 2, 'shamim', '2022-11-19 09:33:41', '3'),
(4, '19/11/2022', '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'shamim', 2, 'shamim', '2022-11-19 11:44:42', '4'),
(5, '19/11/2022', '21', 21, 21, 21, 12, 121, 21, 21, 21, 21, 21, 21, 'Rohit', 3, 'shamim', '2022-11-19 11:45:17', '1'),
(6, '19/11/2022', '4', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Rohit', 3, 'shamim', '2022-11-19 11:45:32', '2'),
(7, '23/11/2022', '4', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Rohit', 3, 'shamim', '2022-11-23 06:22:48', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assigndiet`
--

CREATE TABLE `tbl_assigndiet` (
  `id` int(11) NOT NULL,
  `type` varchar(55) NOT NULL,
  `item` varchar(55) NOT NULL,
  `quantity` varchar(55) NOT NULL,
  `admin_name` varchar(55) NOT NULL,
  `patient_name` varchar(55) NOT NULL,
  `patient_id` varchar(55) NOT NULL,
  `craetedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assigndiet`
--

INSERT INTO `tbl_assigndiet` (`id`, `type`, `item`, `quantity`, `admin_name`, `patient_name`, `patient_id`, `craetedAt`) VALUES
(8, 'Breakfast', 'Chappathi', '2', 'shamim', 'shamim', '2', '2023-02-08 06:15:03'),
(9, 'Breakfast', 'Chappathi', '2', 'shamim', 'Rohit', '3', '2023-02-22 11:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cardiac`
--

CREATE TABLE `tbl_cardiac` (
  `id` int(11) NOT NULL,
  `ihd` varchar(10) DEFAULT NULL,
  `ihd_duration` int(11) DEFAULT NULL,
  `ihd_treatment` mediumtext,
  `valv` varchar(10) DEFAULT NULL,
  `valv_duration` int(10) DEFAULT NULL,
  `valv_treatment` mediumtext,
  `hf` varchar(10) DEFAULT NULL,
  `hf_duration` int(10) DEFAULT NULL,
  `hf_treatment` mediumtext,
  `cardother` varchar(10) DEFAULT NULL,
  `cardother_duration` int(10) DEFAULT NULL,
  `cardother_treatment` mediumtext,
  `copd` varchar(10) DEFAULT NULL,
  `copd_duration` int(10) DEFAULT NULL,
  `copd_treatment` mediumtext,
  `ba` varchar(10) DEFAULT NULL,
  `ba_duration` int(10) DEFAULT NULL,
  `ba_treatment` mediumtext,
  `ild` varchar(10) DEFAULT NULL,
  `ild_duration` int(10) DEFAULT NULL,
  `ild_treatment` mediumtext,
  `tb` varchar(10) DEFAULT NULL,
  `tb_duration` int(10) DEFAULT NULL,
  `tb_treatment` mediumtext,
  `riother` varchar(10) DEFAULT NULL,
  `riother_duration` int(10) DEFAULT NULL,
  `riother_treatment` mediumtext,
  `ibd` varchar(10) DEFAULT NULL,
  `ibd_duration` int(10) DEFAULT NULL,
  `ibd_treatment` mediumtext,
  `ibs` varchar(10) DEFAULT NULL,
  `ibs_duration` int(10) DEFAULT NULL,
  `ibs_treatment` mediumtext,
  `gerd` varchar(10) DEFAULT NULL,
  `gerd_duration` int(10) DEFAULT NULL,
  `gerd_treatment` mediumtext,
  `giother` varchar(10) DEFAULT NULL,
  `giother_duration` int(10) DEFAULT NULL,
  `giother_treatment` mediumtext,
  `stroke` varchar(10) DEFAULT NULL,
  `stroke_duration` int(10) DEFAULT NULL,
  `stroke_treatment` mediumtext,
  `parkinson` varchar(10) DEFAULT NULL,
  `parkinson_duration` int(10) DEFAULT NULL,
  `parkinson_treatment` mediumtext,
  `perin` varchar(10) DEFAULT NULL,
  `perin_duration` int(10) DEFAULT NULL,
  `perin_treatment` mediumtext,
  `sezdis` varchar(10) DEFAULT NULL,
  `sezdis_duration` int(10) DEFAULT NULL,
  `sezdis_treatment` text,
  `ckd` varchar(10) DEFAULT NULL,
  `ckd_duration` int(10) DEFAULT NULL,
  `ckd_treatment` mediumtext,
  `rcalculi` varchar(10) DEFAULT NULL,
  `rcalculi_duration` int(10) DEFAULT NULL,
  `rcalculi_treatment` mediumtext,
  `renaloth` varchar(10) DEFAULT NULL,
  `renaloth_duration` int(10) DEFAULT NULL,
  `renaloth_treatment` mediumtext,
  `pain` varchar(10) DEFAULT NULL,
  `pain_duration` int(10) DEFAULT NULL,
  `pain_treatment` mediumtext,
  `stiffness` varchar(10) DEFAULT NULL,
  `stiffness_duration` int(10) DEFAULT NULL,
  `stiffness_treatment` mediumtext,
  `deformity` varchar(10) DEFAULT NULL,
  `deformity_duration` int(10) DEFAULT NULL,
  `deformity_treatment` mediumtext,
  `mobility` varchar(10) DEFAULT NULL,
  `mobility_duration` int(10) DEFAULT NULL,
  `mobility_treatment` mediumtext,
  `admin_name` varchar(55) NOT NULL,
  `patient_name` varchar(55) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `createrAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cardiac`
--

INSERT INTO `tbl_cardiac` (`id`, `ihd`, `ihd_duration`, `ihd_treatment`, `valv`, `valv_duration`, `valv_treatment`, `hf`, `hf_duration`, `hf_treatment`, `cardother`, `cardother_duration`, `cardother_treatment`, `copd`, `copd_duration`, `copd_treatment`, `ba`, `ba_duration`, `ba_treatment`, `ild`, `ild_duration`, `ild_treatment`, `tb`, `tb_duration`, `tb_treatment`, `riother`, `riother_duration`, `riother_treatment`, `ibd`, `ibd_duration`, `ibd_treatment`, `ibs`, `ibs_duration`, `ibs_treatment`, `gerd`, `gerd_duration`, `gerd_treatment`, `giother`, `giother_duration`, `giother_treatment`, `stroke`, `stroke_duration`, `stroke_treatment`, `parkinson`, `parkinson_duration`, `parkinson_treatment`, `perin`, `perin_duration`, `perin_treatment`, `sezdis`, `sezdis_duration`, `sezdis_treatment`, `ckd`, `ckd_duration`, `ckd_treatment`, `rcalculi`, `rcalculi_duration`, `rcalculi_treatment`, `renaloth`, `renaloth_duration`, `renaloth_treatment`, `pain`, `pain_duration`, `pain_treatment`, `stiffness`, `stiffness_duration`, `stiffness_treatment`, `deformity`, `deformity_duration`, `deformity_treatment`, `mobility`, `mobility_duration`, `mobility_treatment`, `admin_name`, `patient_name`, `patient_id`, `createrAt`) VALUES
(3, 'Yes', 1, 'test', 'No', 1, 'test', 'Yes', 1, 'test', 'No', 1, 'test', 'Yes', 1, 'test', 'Yes', 1, 'test', 'Yes', 1, 'test', 'Yes', 1, 'test', 'Yes', 1, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, '0', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 2, 'test', 'Yes', 1, 'test', 'Yes', 2, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'shamim', 'shamim', 2, '2022-12-16 09:56:35'),
(4, 'No', 1, 'test ihd', 'Yes', 2, 'test valvular', 'Yes', 3, 'test hf', 'Yes', 4, 'test other', 'Yes', 8, 'test copd', 'Yes', 2, 'test ba', 'Yes', 5, 'test ild', 'Yes', 4, 'test tb', 'Yes', 5, 'test other', 'Yes', 1, 'test', 'No', 2, 'test', 'Yes', 3, 'test', 'Yes', 4, 'test', 'Yes', 1, 'test 1', 'Yes', 2, 'test 2', 'Yes', 3, 'test 3', 'Yes', 4, 'test 4', 'Yes', 1, 'test', 'Yes', 2, 'test', 'Yes', 3, 'test', 'Yes', 1, 'test', 'No', 2, 'test', 'Yes', 3, 'test', 'Yes', 4, 'test', 'shamim', 'Rohit', 3, '2022-12-20 08:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diet`
--

CREATE TABLE `tbl_diet` (
  `id` int(11) NOT NULL,
  `activity` varchar(55) DEFAULT NULL,
  `bmi` varchar(55) DEFAULT NULL,
  `ibw` varchar(55) DEFAULT NULL,
  `eat_outside` varchar(55) DEFAULT NULL,
  `pfeo` varchar(55) DEFAULT NULL,
  `cdiet` varchar(55) DEFAULT NULL,
  `dietpref` varchar(55) DEFAULT NULL,
  `allergic` varchar(55) DEFAULT NULL,
  `gutissue` varchar(55) DEFAULT NULL,
  `alcohol` varchar(55) DEFAULT NULL,
  `alcotime` varchar(55) DEFAULT NULL,
  `alcoquantity` varchar(55) DEFAULT NULL,
  `alco_beverage` varchar(55) DEFAULT NULL,
  `snacksbeverage` varchar(100) DEFAULT NULL,
  `bftiming` varchar(100) DEFAULT NULL,
  `bfmenu` text,
  `bfquantity` text,
  `mmsnacks` varchar(100) DEFAULT NULL,
  `mmsnacksmenu` text,
  `mmsnacksquantity` text,
  `lunch` varchar(100) DEFAULT NULL,
  `lunch_menu` text,
  `lunch_quantity` text,
  `me_timing` varchar(100) DEFAULT NULL,
  `memenu` text,
  `mequantity` text,
  `dinner` varchar(100) DEFAULT NULL,
  `dinner_menu` text,
  `dinner_quatinty` text,
  `before_bed` varchar(1000) DEFAULT NULL,
  `bbmenu` text,
  `bbquantity` text,
  `admin_name` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diet`
--

INSERT INTO `tbl_diet` (`id`, `activity`, `bmi`, `ibw`, `eat_outside`, `pfeo`, `cdiet`, `dietpref`, `allergic`, `gutissue`, `alcohol`, `alcotime`, `alcoquantity`, `alco_beverage`, `snacksbeverage`, `bftiming`, `bfmenu`, `bfquantity`, `mmsnacks`, `mmsnacksmenu`, `mmsnacksquantity`, `lunch`, `lunch_menu`, `lunch_quantity`, `me_timing`, `memenu`, `mequantity`, `dinner`, `dinner_menu`, `dinner_quatinty`, `before_bed`, `bbmenu`, `bbquantity`, `admin_name`, `patient_name`, `patient_id`, `createdAt`) VALUES
(1, 'Not Active', '12', '12', 'Occasionally', 'North Indian', 'no', 'Vegetarian', 'Egg', 'Heartburn', 'Yes', 'Never', '1 or 2', 'Beer', 'nothing', '9:00', 'rice', '1 plate', '11:00', 'Tea', '1 cup', '', '', '', '', '', '', '', '', '', '', '', '', 'shamim', 'Rohit', '3', '2023-01-18 06:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dietlist`
--

CREATE TABLE `tbl_dietlist` (
  `id` int(11) NOT NULL,
  `item` varchar(100) DEFAULT NULL,
  `calories` varchar(25) DEFAULT NULL,
  `protien` varchar(25) DEFAULT NULL,
  `carbohydrate` varchar(25) DEFAULT NULL,
  `fat` varchar(25) DEFAULT NULL,
  `fibre` varchar(25) DEFAULT NULL,
  `quantity` varchar(34) DEFAULT NULL,
  `isActive` varchar(25) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dietlist`
--

INSERT INTO `tbl_dietlist` (`id`, `item`, `calories`, `protien`, `carbohydrate`, `fat`, `fibre`, `quantity`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'Chappathi', '85', '3', '17.4', '0.4', '2.7', '1 medium', NULL, '2023-01-20 11:43:22', '2023-01-23 06:59:17'),
(2, 'Dosa', '147', '3.9', '18.8', '6.2', '1.5', '1 medium', NULL, '2023-01-23 06:28:26', '0000-00-00 00:00:00'),
(3, 'Ragi idli', '69', '2.3', '13.8', '0.5', '1.9', '1 regular', NULL, '2023-01-23 06:38:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctors`
--

CREATE TABLE `tbl_doctors` (
  `id` int(12) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `user_name` varchar(55) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_contact` varchar(12) DEFAULT NULL,
  `user_email` varchar(70) DEFAULT NULL,
  `user_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_dept` varchar(50) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctors`
--

INSERT INTO `tbl_doctors` (`id`, `name`, `user_name`, `user_password`, `user_contact`, `user_email`, `user_date`, `user_dept`, `user_role`, `end_date`) VALUES
(7, 'admin', 'admin', '$2y$10$MNwYZ2SmqZ2JpY2oepB1B..DX3RK7Rt0nL.ZmEehfJUH1uB0IR9EG', '9856876212', 'chandrashekara_s@yahoo.com', '2021-09-08 08:45:48', 'Research Assist', '3', '0000-00-00 00:00:00'),
(9, 'Shamim Akhtar Sheikh', 'Shamim', '$2y$10$KdozSn8O3xLPuvcsv6tPpuW3NVNJIpJl3w6Nqvc7KrKISw5Tw6kRq', '9856876212', 'webdesigner@chanrejournals.com', '2021-09-17 07:19:54', 'Information Technology', '1', '2022-06-02 10:03:06'),
(11, 'admin', 'admin', '$2y$10$MNwYZ2SmqZ2JpY2oepB1B..DX3RK7Rt0nL.ZmEehfJUH1uB0IR9EG', '9845071151', 'dept2@gmail.com', '2021-09-08 03:15:48', 'Research Assist', '3', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drugs`
--

CREATE TABLE `tbl_drugs` (
  `id` int(10) NOT NULL,
  `drug` varchar(100) DEFAULT NULL,
  `dosage` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `createrAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_drugs`
--

INSERT INTO `tbl_drugs` (`id`, `drug`, `dosage`, `duration`, `admin_name`, `patient_name`, `patient_id`, `createrAt`) VALUES
(1, 'test', '3', 'test', 'shamim', 'Rohit', 3, '2022-12-24 09:03:04'),
(2, 'test2', '2', '2', 'shamim', 'Rohit', 3, '2022-12-24 09:06:03'),
(3, 'test1', '2', '12', 'shamim', 'shamim', 2, '2022-12-24 10:07:28'),
(4, 'test', '2', '2', 'shamim', 'Alex', 4, '2022-12-27 06:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exerciselist`
--

CREATE TABLE `tbl_exerciselist` (
  `id` int(11) NOT NULL,
  `exercisename` varchar(55) DEFAULT NULL,
  `category` varchar(55) DEFAULT NULL,
  `description` longtext,
  `set1` int(23) DEFAULT NULL,
  `set2` int(23) DEFAULT NULL,
  `set3` int(23) DEFAULT NULL,
  `demo` text NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exerciselist`
--

INSERT INTO `tbl_exerciselist` (`id`, `exercisename`, `category`, `description`, `set1`, `set2`, `set3`, `demo`, `createAt`) VALUES
(4, 'Back Squat', 'Back', 'Back Squat', 12, 10, 8, '57ff46592f559532094071785680157b.gif', '2023-02-22 08:23:27'),
(5, 'Basic Core Leg', 'Core', 'Basic Core Leg', 12, 10, 8, '0b53395f916d7ddf16cf20fa8931c1b6.gif', '2023-02-22 08:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jointassesment`
--

CREATE TABLE `tbl_jointassesment` (
  `id` int(11) NOT NULL,
  `cetender` varchar(11) DEFAULT NULL,
  `ceswell` varchar(11) DEFAULT NULL,
  `cearom` text,
  `ceprom` text,
  `shrttender` varchar(11) DEFAULT NULL,
  `shrtswell` varchar(11) DEFAULT NULL,
  `shrtarom` text,
  `shrtprom` text,
  `shlttender` varchar(11) DEFAULT NULL,
  `shltsell` varchar(11) DEFAULT NULL,
  `shltarom` text,
  `shltprom` text,
  `elrttender` varchar(11) DEFAULT NULL,
  `elrtswell` varchar(11) DEFAULT NULL,
  `elrtarom` text,
  `elrtprom` text,
  `ellttender` varchar(11) DEFAULT NULL,
  `elltswell` varchar(11) DEFAULT NULL,
  `elltarom` text,
  `elltprom` text,
  `wrttender` varchar(11) DEFAULT NULL,
  `wrtswell` varchar(11) DEFAULT NULL,
  `wrtarom` text,
  `wrtprom` text,
  `wrlttender` varchar(11) DEFAULT NULL,
  `wrltswell` varchar(11) DEFAULT NULL,
  `wrltarom` text,
  `wrltprom` text,
  `harttender` varchar(11) DEFAULT NULL,
  `hartswell` varchar(11) DEFAULT NULL,
  `hartarom` text,
  `hartprom` text,
  `halttender` varchar(11) DEFAULT NULL,
  `haltswell` varchar(11) DEFAULT NULL,
  `haltarom` text,
  `haltprom` text,
  `hiptender` varchar(11) DEFAULT NULL,
  `hipswell` varchar(11) DEFAULT NULL,
  `hiparom` text,
  `hipprom` text,
  `kneetender` varchar(11) DEFAULT NULL,
  `kneeswell` varchar(11) DEFAULT NULL,
  `kneearom` text,
  `kneeprom` text,
  `ankletender` varchar(11) DEFAULT NULL,
  `ankleswell` varchar(11) DEFAULT NULL,
  `anklearom` text,
  `ankleprom` text,
  `admin_name` varchar(55) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `asses_date` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jointassesment`
--

INSERT INTO `tbl_jointassesment` (`id`, `cetender`, `ceswell`, `cearom`, `ceprom`, `shrttender`, `shrtswell`, `shrtarom`, `shrtprom`, `shlttender`, `shltsell`, `shltarom`, `shltprom`, `elrttender`, `elrtswell`, `elrtarom`, `elrtprom`, `ellttender`, `elltswell`, `elltarom`, `elltprom`, `wrttender`, `wrtswell`, `wrtarom`, `wrtprom`, `wrlttender`, `wrltswell`, `wrltarom`, `wrltprom`, `harttender`, `hartswell`, `hartarom`, `hartprom`, `halttender`, `haltswell`, `haltarom`, `haltprom`, `hiptender`, `hipswell`, `hiparom`, `hipprom`, `kneetender`, `kneeswell`, `kneearom`, `kneeprom`, `ankletender`, `ankleswell`, `anklearom`, `ankleprom`, `admin_name`, `patient_name`, `patient_id`, `createdAt`, `asses_date`) VALUES
(2, 'Yes', 'Yes', '5', '2', 'Yes', 'No', '3', '3', 'Yes', 'Yes', '3', '3', 'Yes', 'Yes', '2', '2', 'Yes', 'Yes', '2', '2', 'Yes', 'Yes', '1', '1', 'Yes', 'Yes', '2', '3', 'Yes', 'Yes', '4', '4', 'Yes', 'Yes', '4', '5', 'Yes', 'Yes', '5', '6', 'Yes', 'Yes', '6', '7', 'Yes', 'No', '3', '4', 'shamim', 'Rohit', 3, '2023-01-09 10:02:57', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_measurements`
--

CREATE TABLE `tbl_measurements` (
  `id` int(11) NOT NULL,
  `mdate` varchar(25) DEFAULT NULL,
  `midarm` varchar(55) DEFAULT NULL,
  `midforearm` varchar(55) DEFAULT NULL,
  `chest` varchar(55) DEFAULT NULL,
  `abdomen` varchar(55) DEFAULT NULL,
  `waist` varchar(55) DEFAULT NULL,
  `midthigh` varchar(55) DEFAULT NULL,
  `midcalf` varchar(55) DEFAULT NULL,
  `admin_name` varchar(55) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` varchar(55) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_measurements`
--

INSERT INTO `tbl_measurements` (`id`, `mdate`, `midarm`, `midforearm`, `chest`, `abdomen`, `waist`, `midthigh`, `midcalf`, `admin_name`, `patient_name`, `patient_id`, `createdAt`) VALUES
(1, '2023-01-05', '5', '4', '4', '4', '4', '4', '4', 'shamim', 'Rohit', '3', '2023-01-04 07:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metabolic`
--

CREATE TABLE `tbl_metabolic` (
  `id` int(11) NOT NULL,
  `dm` varchar(10) DEFAULT NULL,
  `dm_duration` int(10) DEFAULT NULL,
  `dm_treatment` text,
  `htn` varchar(10) DEFAULT NULL,
  `htn_duration` int(10) DEFAULT NULL,
  `htn_treatment` text,
  `hypothyroidism` varchar(10) DEFAULT NULL,
  `hypothyroidism_duration` int(10) DEFAULT NULL,
  `hypothyroidism_treatment` text,
  `hypercholestero` varchar(10) DEFAULT NULL,
  `hypercholestero_duration` int(10) DEFAULT NULL,
  `hypercholestero_treatment` text,
  `mbdothers` varchar(10) DEFAULT NULL,
  `mbdothers_duration` int(10) DEFAULT NULL,
  `mbdother_treatment` text,
  `admin_name` varchar(55) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_metabolic`
--

INSERT INTO `tbl_metabolic` (`id`, `dm`, `dm_duration`, `dm_treatment`, `htn`, `htn_duration`, `htn_treatment`, `hypothyroidism`, `hypothyroidism_duration`, `hypothyroidism_treatment`, `hypercholestero`, `hypercholestero_duration`, `hypercholestero_treatment`, `mbdothers`, `mbdothers_duration`, `mbdother_treatment`, `admin_name`, `patient_name`, `patient_id`, `created_at`) VALUES
(1, 'Yes', 6, 'test', 'Yes', 5, 'test', 'Yes', 4, 'test', 'Yes', 3, 'test', 'Yes', 2, 'test', 'shamim', 'shamim', 2, '2022-12-06 09:02:08'),
(2, 'Yes', 2, 'test dm', 'Yes', 3, 'test htn', 'Yes', 4, 'test hypothroidism', 'Yes', 5, 'test hypothroidism', 'Yes', 6, 'test other', 'shamim', 'Rohit', 3, '2022-12-20 08:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_muscle`
--

CREATE TABLE `tbl_muscle` (
  `id` int(11) NOT NULL,
  `sfpower` varchar(20) DEFAULT NULL,
  `sftone` varchar(20) DEFAULT NULL,
  `sfcord` varchar(20) DEFAULT NULL,
  `sepower` varchar(20) DEFAULT NULL,
  `setone` varchar(20) DEFAULT NULL,
  `secord` varchar(20) DEFAULT NULL,
  `saddpower` varchar(20) DEFAULT NULL,
  `saddtone` varchar(20) DEFAULT NULL,
  `saddcord` varchar(20) DEFAULT NULL,
  `sabdpower` varchar(20) DEFAULT NULL,
  `sabdtone` varchar(20) DEFAULT NULL,
  `sabdcord` varchar(20) DEFAULT NULL,
  `efpower` varchar(20) DEFAULT NULL,
  `eftone` varchar(20) DEFAULT NULL,
  `efcord` varchar(20) DEFAULT NULL,
  `wfpower` varchar(20) DEFAULT NULL,
  `wftone` varchar(20) DEFAULT NULL,
  `wfcord` varchar(20) DEFAULT NULL,
  `wepower` varchar(20) DEFAULT NULL,
  `wetone` varchar(20) DEFAULT NULL,
  `wecord` varchar(20) DEFAULT NULL,
  `hepower` varchar(20) DEFAULT NULL,
  `hetone` varchar(20) DEFAULT NULL,
  `hecord` varchar(20) DEFAULT NULL,
  `hipflexorpower` varchar(20) DEFAULT NULL,
  `hipflexortone` varchar(20) DEFAULT NULL,
  `hipflexorcord` varchar(20) DEFAULT NULL,
  `hipabdpower` varchar(20) DEFAULT NULL,
  `hipabdtone` varchar(20) DEFAULT NULL,
  `hipabdcord` varchar(20) DEFAULT NULL,
  `hipaddpower` varchar(20) DEFAULT NULL,
  `hipaddtone` varchar(20) DEFAULT NULL,
  `hipaddcord` varchar(20) DEFAULT NULL,
  `kepower` varchar(20) DEFAULT NULL,
  `ketone` varchar(20) DEFAULT NULL,
  `kecord` varchar(20) DEFAULT NULL,
  `kfpower` varchar(20) DEFAULT NULL,
  `kftone` varchar(20) DEFAULT NULL,
  `kfcord` varchar(20) DEFAULT NULL,
  `adpower` varchar(20) DEFAULT NULL,
  `adtone` varchar(20) DEFAULT NULL,
  `adcord` varchar(20) DEFAULT NULL,
  `apfpower` varchar(20) DEFAULT NULL,
  `apftone` varchar(20) DEFAULT NULL,
  `apfcord` varchar(20) DEFAULT NULL,
  `eepower` varchar(20) DEFAULT NULL,
  `eetone` varchar(20) DEFAULT NULL,
  `eecord` varchar(20) DEFAULT NULL,
  `admin_name` varchar(55) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(20) DEFAULT NULL,
  `createrAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_muscle`
--

INSERT INTO `tbl_muscle` (`id`, `sfpower`, `sftone`, `sfcord`, `sepower`, `setone`, `secord`, `saddpower`, `saddtone`, `saddcord`, `sabdpower`, `sabdtone`, `sabdcord`, `efpower`, `eftone`, `efcord`, `wfpower`, `wftone`, `wfcord`, `wepower`, `wetone`, `wecord`, `hepower`, `hetone`, `hecord`, `hipflexorpower`, `hipflexortone`, `hipflexorcord`, `hipabdpower`, `hipabdtone`, `hipabdcord`, `hipaddpower`, `hipaddtone`, `hipaddcord`, `kepower`, `ketone`, `kecord`, `kfpower`, `kftone`, `kfcord`, `adpower`, `adtone`, `adcord`, `apfpower`, `apftone`, `apfcord`, `eepower`, `eetone`, `eecord`, `admin_name`, `patient_name`, `patient_id`, `createrAt`) VALUES
(1, '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', '1', 'Normal', 'Normal', 'shamim', 'Rohit', 3, '2022-12-30 11:28:31'),
(2, '1', 'Normal', 'Normal', '0', 'Normal', 'Normal', '1', 'Spasticity', 'Abnormal', '0', 'Spasticity', 'Normal', '1', 'Spasticity', 'Abnormal', '4', 'Flaccidity', 'Normal', '1', 'Flaccidity', 'Abnormal', '2', 'Spasticity', 'Abnormal', '1', 'Spasticity', 'Normal', '2', 'Spasticity', 'Normal', '1', 'Spasticity', 'Normal', '0', 'Normal', 'Normal', '0', 'Normal', 'Normal', '2', 'Spasticity', 'Normal', '2', 'Flaccidity', 'Normal', '2', 'Normal', 'Normal', 'shamim', 'Alex', 4, '2023-01-23 08:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgos`
--

CREATE TABLE `tbl_pgos` (
  `id` int(11) NOT NULL,
  `smoker` varchar(10) DEFAULT NULL,
  `sduration` varchar(100) DEFAULT NULL,
  `scurrent_status` varchar(30) DEFAULT NULL,
  `squantity` varchar(55) DEFAULT NULL,
  `alcoholic` varchar(10) DEFAULT NULL,
  `aduration` varchar(50) DEFAULT NULL,
  `acurrent_status` varchar(50) DEFAULT NULL,
  `aquantity` varchar(55) DEFAULT NULL,
  `sleep` varchar(10) DEFAULT NULL,
  `mensural_cycle` varchar(55) DEFAULT NULL,
  `flow` varchar(100) DEFAULT NULL,
  `pcos` varchar(10) DEFAULT NULL,
  `pcostreatment` text,
  `children` int(10) DEFAULT NULL,
  `miscariage` varchar(55) DEFAULT NULL,
  `menopause` varchar(55) DEFAULT NULL,
  `menopause_duration` varchar(55) DEFAULT NULL,
  `latrogenic` varchar(10) DEFAULT NULL,
  `hysterectomy` varchar(55) DEFAULT NULL,
  `cvsnormal` varchar(10) DEFAULT NULL,
  `cvsfinding` varchar(100) DEFAULT NULL,
  `rsnormal` varchar(10) DEFAULT NULL,
  `rsfinding` varchar(100) DEFAULT NULL,
  `panormal` varchar(10) DEFAULT NULL,
  `pafinding` varchar(100) DEFAULT NULL,
  `neuronormal` varchar(10) DEFAULT NULL,
  `neurofinding` varchar(100) DEFAULT NULL,
  `inspatient` text,
  `insphysiotherapy` text,
  `insdiet` text,
  `inspsycho` text,
  `summary` text,
  `admin_name` varchar(55) DEFAULT NULL,
  `patient_name` varchar(55) DEFAULT NULL,
  `patient_id` int(10) DEFAULT NULL,
  `createrAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pgos`
--

INSERT INTO `tbl_pgos` (`id`, `smoker`, `sduration`, `scurrent_status`, `squantity`, `alcoholic`, `aduration`, `acurrent_status`, `aquantity`, `sleep`, `mensural_cycle`, `flow`, `pcos`, `pcostreatment`, `children`, `miscariage`, `menopause`, `menopause_duration`, `latrogenic`, `hysterectomy`, `cvsnormal`, `cvsfinding`, `rsnormal`, `rsfinding`, `panormal`, `pafinding`, `neuronormal`, `neurofinding`, `inspatient`, `insphysiotherapy`, `insdiet`, `inspsycho`, `summary`, `admin_name`, `patient_name`, `patient_id`, `createrAt`) VALUES
(1, 'Yes', '2', 'Active', '2', 'Yes', '3', 'Inactive', '3', 'Sound', 'Regular', 'Normal', 'Yes', 'no', 5, 'No', 'Yes', '5', 'Yes', 'No', 'Yes', '1', 'No', '2', 'Yes', '3', 'No', '4', 'test 1', 'test 2', 'test 3', 'test 4', 'test 5', 'shamim', 'Rohit', 3, '2022-12-23 06:20:29'),
(4, 'Yes', '2', 'Active', '3', 'Yes', '2', 'Active', '3', 'Sound', 'Regular', 'Normal', 'Yes', 'no', 1, 'No', 'Yes', '1 year', 'Yes', 'Yes', 'Yes', 'no', 'Yes', 'no', 'Yes', 'no', 'No', 'no', 'test patient', 'test patient', 'test patient', 'test patient', 'test summary', 'shamim', 'shamim', 2, '2022-12-24 10:06:58'),
(5, 'No', '', 'Inactive', '', 'No', '', '', '', 'Disturbed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hello this is for patient', 'hello this is for Physiotherapist', 'hello this is for Dietician', 'hello this is for Psychologist', 'smmary', 'shamim', 'Alex', 4, '2022-12-27 06:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rc`
--

CREATE TABLE `tbl_rc` (
  `id` int(10) NOT NULL,
  `ra` varchar(10) DEFAULT NULL,
  `ra_duration` int(10) DEFAULT NULL,
  `ra_treatment` varchar(255) DEFAULT NULL,
  `oa` varchar(10) DEFAULT NULL,
  `oa_duration` int(10) DEFAULT NULL,
  `oa_treatment` varchar(255) DEFAULT NULL,
  `osteoprosis` varchar(10) DEFAULT NULL,
  `osteoprosis_duration` int(10) DEFAULT NULL,
  `osteoprosis_treatment` varchar(255) DEFAULT NULL,
  `psa` varchar(10) DEFAULT NULL,
  `psa_duration` int(10) DEFAULT NULL,
  `psa_treatment` varchar(255) DEFAULT NULL,
  `spa` varchar(10) DEFAULT NULL,
  `spa_duration` int(10) DEFAULT NULL,
  `spa_treatment` varchar(255) DEFAULT NULL,
  `sle` varchar(10) DEFAULT NULL,
  `sle_duration` int(10) DEFAULT NULL,
  `sle_treatment` varchar(255) DEFAULT NULL,
  `myositis` varchar(10) DEFAULT NULL,
  `myositis_duration` int(10) DEFAULT NULL,
  `myositis_treatment` varchar(255) DEFAULT NULL,
  `scleroderma` varchar(10) DEFAULT NULL,
  `scleroderma_duration` int(10) DEFAULT NULL,
  `scleroderma_treatment` varchar(255) DEFAULT NULL,
  `sjogren` varchar(10) DEFAULT NULL,
  `sjogren_duration` int(10) DEFAULT NULL,
  `sjogren_treatment` text,
  `uctd` varchar(10) DEFAULT NULL,
  `uctd_duration` int(10) DEFAULT NULL,
  `uctd_treatment` text,
  `mctd` varchar(10) DEFAULT NULL,
  `mctd_duration` int(10) DEFAULT NULL,
  `mctd_treatment` text,
  `gout` varchar(10) DEFAULT NULL,
  `gout_duration` int(10) DEFAULT NULL,
  `gout_treatment` text,
  `vasculitis` varchar(10) DEFAULT NULL,
  `vasculitis_duration` int(10) DEFAULT NULL,
  `vasculitis_treatment` text,
  `rcother` varchar(10) DEFAULT NULL,
  `rcother_duration` int(10) DEFAULT NULL,
  `rcother_treatment` text,
  `admin_name` varchar(50) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rc`
--

INSERT INTO `tbl_rc` (`id`, `ra`, `ra_duration`, `ra_treatment`, `oa`, `oa_duration`, `oa_treatment`, `osteoprosis`, `osteoprosis_duration`, `osteoprosis_treatment`, `psa`, `psa_duration`, `psa_treatment`, `spa`, `spa_duration`, `spa_treatment`, `sle`, `sle_duration`, `sle_treatment`, `myositis`, `myositis_duration`, `myositis_treatment`, `scleroderma`, `scleroderma_duration`, `scleroderma_treatment`, `sjogren`, `sjogren_duration`, `sjogren_treatment`, `uctd`, `uctd_duration`, `uctd_treatment`, `mctd`, `mctd_duration`, `mctd_treatment`, `gout`, `gout_duration`, `gout_treatment`, `vasculitis`, `vasculitis_duration`, `vasculitis_treatment`, `rcother`, `rcother_duration`, `rcother_treatment`, `admin_name`, `patient_name`, `patient_id`, `created_at`) VALUES
(3, 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'shamim', 'shamim', 2, '2022-12-02 09:26:11'),
(4, 'Yes', 8, 'test', 'No', 87, 'test', 'Yes', 6, 'test', 'No', 6, 'test', 'No', 5, 'test', 'No', 4, 'test', 'Yes', 4, 'test', 'Yes', 3, 'test', 'Yes', 3, 'test', 'Yes', 2, 'test', 'Yes', 3, 'test', 'Yes', 4, 'test', 'Yes', 5, 'test', 'Yes', 6, 'test', 'shamim', 'Rohit', 3, '2022-12-06 09:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `useraddress` varchar(255) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `registrar` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `isUser` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `lname`, `dob`, `mobile`, `username`, `userpassword`, `useremail`, `useraddress`, `occupation`, `registrar`, `createdAt`, `updatedAt`, `isUser`) VALUES
(2, 'shamim', 'sheikh', '1992-12-10', 2147483647, 'shamim12345', '12345', 'shamim@gmail.com', 'bangalore', 'Web Developer', '', '2022-09-26 06:41:47', '0000-00-00 00:00:00', 0),
(3, 'Rohit', 'Sarkar', '1992-12-10', 2147483647, 'shamim123', '12345', 'test@gmail.com', 'Bangalore', 'Developer', 'shamim', '2022-09-26 06:47:36', '0000-00-00 00:00:00', 0),
(4, 'Alex', 'Alex', '2002-12-01', 1234567890, 'alex', '12345', 'alex@test.com', 'Bangalore', 'student', 'shamim', '2022-12-21 09:17:18', '0000-00-00 00:00:00', 0),
(5, 'Andrew', 'Andrew', '1998-12-01', 987643210, 'andrew', '12345', 'andrew@gmail.com', 'bangalore', 'Teacher', 'shamim', '2022-12-21 09:20:13', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preliminarytest`
--
ALTER TABLE `preliminarytest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assigndiet`
--
ALTER TABLE `tbl_assigndiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cardiac`
--
ALTER TABLE `tbl_cardiac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_diet`
--
ALTER TABLE `tbl_diet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dietlist`
--
ALTER TABLE `tbl_dietlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exerciselist`
--
ALTER TABLE `tbl_exerciselist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jointassesment`
--
ALTER TABLE `tbl_jointassesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_measurements`
--
ALTER TABLE `tbl_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_metabolic`
--
ALTER TABLE `tbl_metabolic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_muscle`
--
ALTER TABLE `tbl_muscle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pgos`
--
ALTER TABLE `tbl_pgos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rc`
--
ALTER TABLE `tbl_rc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `preliminarytest`
--
ALTER TABLE `preliminarytest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_assigndiet`
--
ALTER TABLE `tbl_assigndiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cardiac`
--
ALTER TABLE `tbl_cardiac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_diet`
--
ALTER TABLE `tbl_diet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dietlist`
--
ALTER TABLE `tbl_dietlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctors`
--
ALTER TABLE `tbl_doctors`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_drugs`
--
ALTER TABLE `tbl_drugs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_exerciselist`
--
ALTER TABLE `tbl_exerciselist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jointassesment`
--
ALTER TABLE `tbl_jointassesment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_measurements`
--
ALTER TABLE `tbl_measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_metabolic`
--
ALTER TABLE `tbl_metabolic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_muscle`
--
ALTER TABLE `tbl_muscle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pgos`
--
ALTER TABLE `tbl_pgos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rc`
--
ALTER TABLE `tbl_rc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
