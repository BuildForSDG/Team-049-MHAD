-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 05:29 PM
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
  `fullName` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mhad_admin_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mhad_patients`
--

INSERT INTO `mhad_patients` (`id`, `pregNo`, `fullName`, `emailAddress`, `phoneNumber`, `age`, `gender`, `username`, `password`, `dateRegistered_at`, `require_treatment`, `treatmentStatus`, `assignedDoctorID`, `created_at`, `updated_at`) VALUES
(1, '2005032405', 'james', 'contact@nodal.genicsolutions.com.ng', '04749347343463493843743', '25', 'Female', 'contact@nodal.genicsolutions.com.ng', '$2y$10$Ac8mBLUsGB/MXaDIOA4LReY861HhjEl6Yqn4zn.2omZ9phnuC9FQG', '2020-05-24 15:24:05', '1', '0', 2005033844, '2020-05-24 14:24:05', '2020-05-24 14:24:05'),
(2, '2005032890', 'Babs Godwin', 'babs@yahoo.com', '047493473434634938437445', '56', 'Male', 'babs@yahoo.com', '$2y$10$Ac8mBLUsGB/MXaDIOA4LReY861HhjEl6Yqn4zn.2omZ9phnuC9FQG', '2020-05-24 15:24:05', '1', '0', 2005033844, '2020-05-29 16:59:37', '2020-05-29 16:59:37'),
(3, '20050328905', 'Abey Philips', 'abe@yahoo.com', '047493473434634938437445', '56', 'Male', 'abe@yahoo.com', '$2y$10$Ac8mBLUsGB/MXaDIOA4LReY861HhjEl6Yqn4zn.2omZ9phnuC9FQG', '2020-05-24 15:24:05', '1', '0', 2005033844, '2020-05-29 17:07:13', '2020-05-29 17:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_patient_complaints`
--

CREATE TABLE IF NOT EXISTS `mhad_patient_complaints` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pregNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docRegNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainTitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainBody` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `complainDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complainStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_complaints_pregno_index` (`pregNo`),
  KEY `mhad_patient_complaints_docregno_index` (`docRegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mhad_patient_diagnoses`
--

INSERT INTO `mhad_patient_diagnoses` (`id`, `pregNo`, `phqResult`, `diagnosisLevel`, `diagnoseSuggest`, `dateDaignosed`, `created_at`, `updated_at`) VALUES
(1, '2005032405', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-24 14:24:05', '2020-05-24 14:24:05'),
(2, '2005032890', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-29 17:07:56', '2020-05-29 17:07:56'),
(3, '20050328905', '9', 'Mild Depression', 'Require only watchful waiting and repeated PHQ-9 at followup', '2020-05-24 15:24:05', '2020-05-29 17:08:11', '2020-05-29 17:08:11');

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
  `schStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_schedules_pregno_index` (`pregNo`),
  KEY `mhad_patient_schedules_docregno_index` (`docRegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

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
  `patientFeedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_patient_treatments_pregno_index` (`pregNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

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
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activationStatus` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mhad_specialists_docregno_unique` (`docRegNo`),
  UNIQUE KEY `mhad_specialists_emailaddress_unique` (`emailAddress`),
  KEY `mhad_specialists_gender_index` (`gender`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mhad_specialists`
--

INSERT INTO `mhad_specialists` (`id`, `docRegNo`, `fullName`, `emailAddress`, `password`, `occupation`, `specialty`, `gender`, `address`, `state`, `country`, `zip_code`, `phoneNumber`, `age`, `dateRegistered`, `activationStatus`, `status`) VALUES
(1, '2005033844', 'Emmanuel John', 'chinoskeshi@yahoo.com', '$2y$10$3gCi4lta9FiNEv1AZOHu3ec0H/4ivpl8l.rh8kcU/yMmJJabMZVXG', 'Engineer', 'Psychiatry', 'Male', 'Shagari Village', 'Ondo State', 'Nigeria', '234', '2345678', '35', '2020-05-28 15:38:45', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mhad_syslogs`
--

CREATE TABLE IF NOT EXISTS `mhad_syslogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resources_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_status` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mhad_syslogs_access_by_index` (`access_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

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
