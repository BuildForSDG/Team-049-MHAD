-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 06:20 PM
-- Server version: 5.6.29
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mhad`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mhad_admin`
--

CREATE TABLE IF NOT EXISTS `mhad_admin` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admRegNo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mhad_admin_email_unique` (`email`),
  UNIQUE KEY `admRegNo` (`admRegNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mhad_admin`
--

INSERT INTO `mhad_admin` (`id`, `admRegNo`, `fullName`, `email`, `phoneNumber`, `email_verified_at`, `password`, `role`, `address`, `state`, `country`, `zip_code`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, '200001', 'Emmanuel John', 'chinoskeshi@yahoo.com', '033823623277', '2020-05-31 23:00:00', '$2y$10$iN8cSjnBh7w5ByTlsrjKf.tAhbzVNFB4ijEf7yJBTEnDNi7DY5Gti', 'Supper Admin', 'Akure', 'Ondo State', 'Nigeria', '1234', NULL, '2020-05-31 23:00:00', '2020-05-31 23:00:00', '1'),
(4, '200601345353', 'Godwing Samuel', 'samuel@yahoo.com', '047434347', NULL, '$2y$10$tY1H7xswRCmCd31AVry2IOjOJjPdksXIltyDqtvbogCq7Bz.n5oJC', 'Executive Admin', 'Abuja', 'Abuja', 'Nigeria', '234', NULL, NULL, NULL, '0'),
(5, '200602481414', 'John Paul', 'paul@yahoo.com', '080474834636', NULL, '$2y$10$vrr6uH249AmrSa1/LQb3Mum45JZC1AP0EXqIm0K4gUeyJTFyDO1m.', 'Executive Admin', 'Ikeja', 'Lagos', 'Nigeria', '234', NULL, NULL, NULL, '1'),
(6, '200602253535', 'Philip Austing', 'austing@sdg.com', '070434634', NULL, '$2y$10$V3pq4EoFvirN002WHqwVe.uR2Mi.h2XjnmrFDVRn0YsQk0qsmkMMW', 'Supper Admin', 'Abaji', 'Abuja', 'Nigeria', '234', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patients`
--

CREATE TABLE IF NOT EXISTS `mhad_patients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAddress` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRegistered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `require_treatment` char(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `treatmentStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignedDoctorID` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mhad_patients_pregno_unique` (`pregNo`),
  UNIQUE KEY `emailAddress` (`emailAddress`),
  KEY `mhad_patients_emailaddress_unique` (`emailAddress`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mhad_patients`
--

INSERT INTO `mhad_patients` (`id`, `pregNo`, `fullName`, `emailAddress`, `phoneNumber`, `age`, `gender`, `address`, `state`, `country`, `zip_code`, `username`, `password`, `dateRegistered_at`, `require_treatment`, `treatmentStatus`, `assignedDoctorID`, `created_at`, `updated_at`) VALUES
(1, '2005032405', 'james', 'contact@nodal.genicsolutions.com.ng', '04749347343463493843743', '25', 'Female', 'Ak', 'Ondo State', 'Nigeria', '234', 'contact@nodal.genicsolutions.com.ng', '$2y$10$Ac8mBLUsGB/MXaDIOA4LReY861HhjEl6Yqn4zn.2omZ9phnuC9FQG', '2020-05-24 15:24:05', '1', '1', 2005033844, '2020-05-24 14:24:05', '2020-05-24 14:24:05'),
(2, '2005032890', 'Babs Godwin', 'babs@yahoo.com', '047493473434634938437445', '56', 'Male', 'Berger er', 'Lagos', 'Nigeria', '234', 'babs@yahoo.com', '$2y$10$.mvMXlv1fHXdtkFLI/u3KOhuZUjvhuQ7SM5aji4aMOPTO5G6KTNCS', '2020-05-24 15:24:05', '1', '0', 2005125227, '2020-05-29 16:59:37', '2020-05-29 16:59:37'),
(3, '20050328905', 'Abey Philips', 'abe@yahoo.com', '047493473434634938437445', '56', 'Male', '', '', '', '', 'abe@yahoo.com', '$2y$10$mhPNWCRCDdg5lzycubTcN.elTar70rmxvQuWnb8SCmsPinxs1Vb5u', '2020-05-24 15:24:05', '1', '0', 2005033844, '2020-05-29 17:07:13', '2020-05-29 17:07:13'),
(4, '2006014607', 'Adekunle Boluwarin', 'adekunle@ty.com', '038923627326', '55', 'Male', 'Akure', 'Ondo STate', 'Bigeria', '234', 'adekunle@ty.com', '$2y$10$3OlKO2DB4YoPY82zeCPq9uHpQvsxfKLV2GqtaNpAG7k.HCAklNtX6', '2020-06-01 13:46:08', '1', '0', 2005125227, '2020-06-01 12:46:08', '2020-06-01 12:46:08'),
(5, '2006015513', 'Philip Ogha', 'ogha@sdg.com', '080839478783', '38', 'Male', NULL, NULL, NULL, NULL, 'ogha@sdg.com', '$2y$10$bKJN.vUZCnawotegHcyp0.L2heVHY2SaVVpwYLxBBpL/RxsJ9et4S', '2020-06-09 13:55:13', '1', '0', NULL, '2020-06-09 12:55:13', '2020-06-09 12:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patient_complaints`
--

CREATE TABLE IF NOT EXISTS `mhad_patient_complaints` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docRegNo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainTitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainBody` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complainStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mhad_patient_complaints_pregno_index` (`pregNo`),
  KEY `mhad_patient_complaints_docregno_index` (`docRegNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mhad_patient_complaints`
--

INSERT INTO `mhad_patient_complaints` (`id`, `pregNo`, `docRegNo`, `complainTitle`, `complainBody`, `complainDate`, `complainStatus`) VALUES
(1, '2005032890', NULL, 'There is new development', 'Testing testing', '2020-06-07 15:18:41', '0'),
(2, '2005032890', NULL, 'Another complaint', 'Testinnfdhifhslf oi', '2020-06-07 15:20:20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patient_diagnoses`
--

CREATE TABLE IF NOT EXISTS `mhad_patient_diagnoses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phqResult` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosisLevel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnoseSuggest` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDaignosed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_diagnoses_pregno_index` (`pregNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mhad_patient_diagnoses`
--

INSERT INTO `mhad_patient_diagnoses` (`id`, `pregNo`, `phqResult`, `diagnosisLevel`, `diagnoseSuggest`, `dateDaignosed`, `created_at`, `updated_at`) VALUES
(1, '2005032405', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-24 14:24:05', '2020-05-24 14:24:05'),
(2, '2005032890', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-29 17:07:56', '2020-05-29 17:07:56'),
(3, '20050328905', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-29 17:08:11', '2020-05-29 17:08:11'),
(4, '2006014607', '22', 'Severe Depression', 'Patients typically should have immediate initiation of pharmacotherapy and expedited referral to mental health specialist.', '2020-06-01 13:46:08', '2020-06-01 12:46:08', '2020-06-01 12:46:08'),
(5, '2006015513', '18', 'Moderately Severe Depression', 'Patients typically should have immediate initiation of pharmacotherapy and/or psychotherapy', '2020-06-09 13:55:13', '2020-06-09 12:55:13', '2020-06-09 12:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patient_schedules`
--

CREATE TABLE IF NOT EXISTS `mhad_patient_schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docRegNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schDate` date NOT NULL,
  `schVenue` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `schPurpose` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `docComment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `schStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_schedules_pregno_index` (`pregNo`),
  KEY `mhad_patient_schedules_docregno_index` (`docRegNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mhad_patient_schedules`
--

INSERT INTO `mhad_patient_schedules` (`id`, `pregNo`, `docRegNo`, `schDate`, `schVenue`, `schPurpose`, `docComment`, `updated_at`, `created_at`, `schStatus`) VALUES
(1, '2005032405', '2005033844', '2020-06-06', 'Office', 'Visitation', 'irereu', '2020-06-06 14:03:08', '2020-06-06 14:03:08', '0'),
(2, '20050328905', '2005033844', '2020-06-06', 'Hospital Premises', 'Evaluation', 'Treatment', '2020-06-06 14:17:10', '2020-06-06 14:17:10', '0'),
(3, '2005032890', '2005033844', '2020-06-08', 'Clinic', 'Checkup', 'Waiting', '2020-06-06 16:25:03', '2020-06-06 16:25:03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patient_treatments`
--

CREATE TABLE IF NOT EXISTS `mhad_patient_treatments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `targetSymptom` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prescDesc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateTreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientFeedback` longtext COLLATE utf8mb4_unicode_ci,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_treatments_pregno_index` (`pregNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mhad_patient_treatments`
--

INSERT INTO `mhad_patient_treatments` (`id`, `pregNo`, `targetSymptom`, `prescDesc`, `dateTreated`, `comment`, `patientFeedback`, `updated_at`, `created_at`, `status`) VALUES
(1, '2005032890', 'Cough', 'Tutolin', '2020-06-05 18:50:13', 'done', 'The drug was very effective and I have been OK since taken it', '2020-06-05 18:50:13', '2020-06-05 18:50:13', '0'),
(2, '2005032890', 'Fever', 'Chloroquine', '2020-06-06 14:14:42', '2/day', 'There was body itching after taken the drugs and I could not sleep very well', '2020-06-06 14:14:42', '2020-06-06 14:14:42', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_phq_answers`
--

CREATE TABLE IF NOT EXISTS `mhad_phq_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qid` int(10) unsigned NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scorevalue` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_phq_answers_qid_index` (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mhad_phq_tests`
--

CREATE TABLE IF NOT EXISTS `mhad_phq_tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `test_question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mhad_phq_tests`
--

INSERT INTO `mhad_phq_tests` (`id`, `test_question`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Little interest or pleasure in doing things?', '1', '2020-05-20 18:20:09', '2020-05-20 18:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_role`
--

CREATE TABLE IF NOT EXISTS `mhad_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roleName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mhad_role`
--

INSERT INTO `mhad_role` (`id`, `roleID`, `roleName`, `status`) VALUES
(1, '001', 'Supper Admin', '01'),
(2, '002', 'Executive Admin', '01');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_specialists`
--

CREATE TABLE IF NOT EXISTS `mhad_specialists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `docRegNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAddress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activationStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mhad_specialists_docregno_unique` (`docRegNo`),
  UNIQUE KEY `mhad_specialists_emailaddress_unique` (`emailAddress`),
  KEY `mhad_specialists_gender_index` (`gender`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mhad_specialists`
--

INSERT INTO `mhad_specialists` (`id`, `docRegNo`, `fullName`, `emailAddress`, `password`, `occupation`, `specialty`, `gender`, `address`, `state`, `country`, `zip_code`, `phoneNumber`, `age`, `dateRegistered`, `activationStatus`, `status`) VALUES
(1, '2005033844', 'Emmanuel John', 'chinoskeshi@yahoo.com', '$2y$10$PNKvdcBGo.s3KdNJfcu45O5YhwllmCxd2SGXLJdAzb2m6dHO.2CE.', 'Engineer', 'Psychiatry', 'Male', 'Shagari Village', 'Ondo State', 'Nigeria', '234', '2345678', '35', '2020-05-28 15:38:45', '0', '1'),
(2, '2005125227', 'Godwing james', 'godwin@yahoo.com', '$2y$10$SI62ugzl94QELrkDhzAZ/ulExZRwJU/gW17TYGSqG3NYm3fmbmJn2', 'Physician', 'Pathology', 'Female', 'ogba', 'Lagos', 'Nigeria', '234', '82032832328', '34', '2020-05-31 12:52:27', '0', '1'),
(3, '2006020227', 'Stanley Mark', 'mark@sdg.com', '$2y$10$lBFV.oqS6EYN1HA2Nv/kze1mKb7tfM20rRKdISB5wZQtbk1tyU2lG', 'Doctor', 'Psychiatry', 'Male', 'Onitsha', 'Anambra', 'Nigeria', '234', '0906383583535', '65', '2020-06-09 14:02:28', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_syslogs`
--

CREATE TABLE IF NOT EXISTS `mhad_syslogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resources_url` text COLLATE utf8mb4_unicode_ci,
  `response_status` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_syslogs_access_by_index` (`access_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `mhad_syslogs`
--

INSERT INTO `mhad_syslogs` (`id`, `method`, `resources_url`, `response_status`, `response_time`, `access_date`, `access_by`) VALUES
(1, 'GET', '/Team-049-MHAD/src/public/patient', '200', '9179', '2020-06-09 16:09:58', 'Admin'),
(2, 'GET', '/Team-049-MHAD/src/public/editpatient/2006015513', '200', '2527', '2020-06-09 16:10:41', 'Admin'),
(3, 'GET', '/Team-049-MHAD/src/public/adminrecord', '200', '681', '2020-06-09 16:14:11', 'Admin'),
(4, 'GET', '/Team-049-MHAD/src/public/complaint', '200', '2330', '2020-06-09 16:14:21', 'Admin'),
(5, 'GET', '/Team-049-MHAD/src/public/patient', '200', '316', '2020-06-09 16:14:25', 'Admin'),
(6, 'GET', '/Team-049-MHAD/src/public/phq9', '200', '215', '2020-06-09 16:14:30', 'Admin'),
(7, 'GET', '/Team-049-MHAD/src/public/phq9', '200', '361', '2020-06-09 16:21:44', 'Admin'),
(8, 'GET', '/Team-049-MHAD/src/public/logs', '200', '2003', '2020-06-09 16:21:51', 'Admin'),
(9, 'GET', '/Team-049-MHAD/src/public/logs', '200', '316', '2020-06-09 16:22:37', 'Admin'),
(10, 'GET', '/Team-049-MHAD/src/public/logs', '200', '537', '2020-06-09 16:26:12', 'Admin'),
(11, 'GET', '/Team-049-MHAD/src/public/logs', '200', '744', '2020-06-09 16:26:20', 'Admin'),
(12, 'GET', '/Team-049-MHAD/src/public/logs', '200', '368', '2020-06-09 16:27:06', 'Admin'),
(13, 'GET', '/Team-049-MHAD/src/public/logs', '200', '539', '2020-06-09 16:27:18', 'Admin'),
(14, 'GET', '/Team-049-MHAD/src/public/logs', '200', '265', '2020-06-09 16:27:46', 'Admin'),
(15, 'GET', '/Team-049-MHAD/src/public/logs', '200', '231', '2020-06-09 16:28:01', 'Admin'),
(16, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '323', '2020-06-09 16:28:05', 'Admin'),
(17, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '436', '2020-06-09 16:28:15', 'Admin'),
(18, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '217', '2020-06-09 16:28:22', 'Admin'),
(19, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '224', '2020-06-09 16:28:32', 'Admin'),
(20, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '241', '2020-06-09 16:29:26', 'Admin'),
(21, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '484', '2020-06-09 16:30:15', 'Admin'),
(22, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '285', '2020-06-09 16:30:43', 'Admin'),
(23, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '521', '2020-06-09 16:31:22', 'Admin'),
(24, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '424', '2020-06-09 16:32:20', 'Admin'),
(25, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '219', '2020-06-09 16:32:27', 'Admin'),
(26, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '221', '2020-06-09 16:32:31', 'Admin'),
(27, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '289', '2020-06-09 16:32:51', 'Admin'),
(28, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '1226', '2020-06-09 16:32:58', 'Admin'),
(29, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '333', '2020-06-09 16:33:02', 'Admin'),
(30, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '237', '2020-06-09 16:33:42', 'Admin'),
(31, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '1764', '2020-06-09 16:33:59', 'Admin'),
(32, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '396', '2020-06-09 16:34:42', 'Admin'),
(33, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '222', '2020-06-09 16:34:46', 'Admin'),
(34, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '216', '2020-06-09 16:35:25', 'Admin'),
(35, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '277', '2020-06-09 16:38:46', 'Admin'),
(36, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '265', '2020-06-09 16:39:02', 'Admin'),
(37, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '462', '2020-06-09 16:39:10', 'Admin'),
(38, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '343', '2020-06-09 16:42:56', 'Admin'),
(39, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '345', '2020-06-09 16:43:25', 'Admin'),
(40, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '323', '2020-06-09 16:43:35', 'Admin'),
(41, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '257', '2020-06-09 16:43:46', 'Admin'),
(42, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '413', '2020-06-09 16:43:49', 'Admin'),
(43, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '243', '2020-06-09 16:43:53', 'Admin'),
(44, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '247', '2020-06-09 16:43:56', 'Admin'),
(45, 'GET', '/Team-049-MHAD/src/public/logs?page=4', '200', '223', '2020-06-09 16:43:59', 'Admin'),
(46, 'GET', '/Team-049-MHAD/src/public/logs?page=5', '200', '237', '2020-06-09 16:44:02', 'Admin'),
(47, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '224', '2020-06-09 16:44:12', 'Admin'),
(48, 'GET', '/Team-049-MHAD/src/public/adminrecord', '200', '226', '2020-06-09 16:44:30', 'Admin'),
(49, 'GET', '/Team-049-MHAD/src/public/logs', '200', '226', '2020-06-09 16:44:41', 'Admin'),
(50, 'GET', '/Team-049-MHAD/src/public/logs', '200', '331', '2020-06-09 16:45:11', 'Admin'),
(51, 'GET', '/Team-049-MHAD/src/public/logs', '200', '320', '2020-06-09 16:47:25', 'Admin'),
(52, 'GET', '/Team-049-MHAD/src/public/logs', '200', '245', '2020-06-09 16:48:30', 'Admin'),
(53, 'GET', '/Team-049-MHAD/src/public/logs', '200', '346', '2020-06-09 16:49:45', 'Admin'),
(54, 'GET', '/Team-049-MHAD/src/public/logs', '200', '289', '2020-06-09 16:49:59', 'Admin'),
(55, 'GET', '/Team-049-MHAD/src/public/logs', '200', '297', '2020-06-09 16:50:42', 'Admin'),
(56, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '329', '2020-06-09 16:50:47', 'Admin'),
(57, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '269', '2020-06-09 16:50:51', 'Admin'),
(58, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '246', '2020-06-09 16:52:41', 'Admin'),
(59, 'GET', '/Team-049-MHAD/src/public/adminrecord', '200', '434', '2020-06-09 16:52:48', 'Admin'),
(60, 'GET', '/Team-049-MHAD/src/public/logs', '200', '217', '2020-06-09 16:53:27', 'Admin'),
(61, 'GET', '/Team-049-MHAD/src/public/logs?page=2', '200', '226', '2020-06-09 16:53:32', 'Admin'),
(62, 'GET', '/Team-049-MHAD/src/public/logs?page=3', '200', '216', '2020-06-09 16:53:36', 'Admin'),
(63, 'GET', '/Team-049-MHAD/src/public/logs?page=4', '200', '226', '2020-06-09 16:53:39', 'Admin'),
(64, 'GET', '/Team-049-MHAD/src/public/logs?page=1', '200', '214', '2020-06-09 16:53:42', 'Admin'),
(65, 'GET', '/Team-049-MHAD/src/public/adminrecord', '200', '215', '2020-06-09 16:54:02', 'Admin'),
(66, 'GET', '/Team-049-MHAD/src/public/logs', '200', '220', '2020-06-09 16:54:07', 'Admin'),
(67, 'GET', '/Team-049-MHAD/src/public/logs?page=7', '200', '216', '2020-06-09 16:54:11', 'Admin'),
(68, 'GET', '/Team-049-MHAD/src/public/adminrecord', '200', '348', '2020-06-09 16:59:03', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_17_151906_create_mhad_patients_table', 1),
(4, '2020_05_17_151944_create_mhad_patient_diagnoses_table', 1),
(5, '2020_05_17_152018_create_mhad_patient_treatments_table', 1),
(6, '2020_05_17_152056_create_mhad_patient_schedules_table', 1),
(7, '2020_05_17_152131_create_mhad_patient_complaints_table', 1),
(8, '2020_05_17_152220_create_mhad_specialists_table', 1),
(9, '2020_05_17_152337_create_mhad_phq_tests_table', 1),
(10, '2020_05_17_152412_create_mhad_phq_answers_table', 1),
(11, '2020_05_17_152451_create_mhad_syslogs_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 2),
(13, '2020_05_14_022458_create_specialists__table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE IF NOT EXISTS `specialists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
