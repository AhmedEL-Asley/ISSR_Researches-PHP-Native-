-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 05:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issr_researches`
--

-- --------------------------------------------------------

--
-- Table structure for table `issr_departments`
--

CREATE TABLE `issr_departments` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_departments`
--

INSERT INTO `issr_departments` (`id`, `code`, `name`, `created_time`, `updated_time`) VALUES
(1, '', 'Professional Diploma: Statistical Quality Control & Quality Assurance', '2021-02-05 11:04:19', '2021-05-16 03:25:35'),
(2, '', 'Professional Diploma: Econometric Analysis of Time Series', '2021-02-05 11:04:19', '2021-05-16 03:25:38'),
(3, '', 'Professional Diploma: Applied Statistics', '2021-02-05 11:04:38', '2021-05-16 03:25:43'),
(4, '', 'Professional Diploma: Statistical Computing', '2021-02-09 18:09:59', '2021-05-16 03:25:46'),
(5, '', 'Professional Diploma: Life Testing and Reliability Analysis', '2021-02-09 18:11:13', '2021-05-16 03:25:49'),
(6, '', 'Professional Diploma: Human Development & Resources', '2021-02-09 18:11:13', '2021-05-16 03:25:55'),
(7, '', 'Professional Diploma: Data Analysis', '2021-02-09 18:11:13', '2021-05-16 03:26:00'),
(8, '', 'Professional Diploma: Measuring Public Opinion Polls', '2021-02-09 18:11:13', '2021-05-16 03:26:04'),
(9, '', 'Professional Diploma: Population Policies and Data Analysis', '0000-00-00 00:00:00', '2021-05-16 03:26:47'),
(10, '', 'Professional Diploma: Survey Analysis and Reporting', '0000-00-00 00:00:00', '2021-05-16 03:26:40'),
(11, '', 'Professional Diploma: Software Engineering', '0000-00-00 00:00:00', '2021-05-16 03:26:34'),
(12, '', 'Professional Diploma: Operations Research and Decision Support', '0000-00-00 00:00:00', '2021-05-16 03:26:27'),
(13, '', 'Professional Diploma: Project Management', '0000-00-00 00:00:00', '2021-05-16 03:25:27'),
(14, '', 'Professional Diploma: Web Design', '0000-00-00 00:00:00', '2021-05-16 03:26:07'),
(15, '', 'Professional Diploma: Supply Chain and Operations Management', '0000-00-00 00:00:00', '2021-05-16 03:26:10'),
(16, '', 'Professional Diploma: Research and Development', '0000-00-00 00:00:00', '2021-05-16 03:26:14'),
(17, '', 'Professional Diploma: Human Resource Management', '0000-00-00 00:00:00', '2021-05-16 03:26:17'),
(18, '', 'Professional Diploma: Crisis and Risk Management', '0000-00-00 00:00:00', '2021-05-16 03:26:20'),
(19, '', 'Professional Master: Statistical Quality Control and Quality Assurance', '0000-00-00 00:00:00', '2021-05-16 03:27:02'),
(20, '', 'Professional Master: Econometric Analysis of Time Series', '0000-00-00 00:00:00', '2021-05-16 03:30:15'),
(21, '', 'Professional Master: Data Analysis ', '0000-00-00 00:00:00', '2021-05-16 03:30:17'),
(22, '', 'Professional Master: Software Engineering', '0000-00-00 00:00:00', '2021-05-16 03:30:24'),
(23, '', 'Professional Master: Operations Research & Decision Support', '0000-00-00 00:00:00', '2021-05-16 03:30:30'),
(24, '', 'Professional Master: Project Management', '0000-00-00 00:00:00', '2021-05-16 03:30:41'),
(25, '', 'Professional Master: Supply Chain and Operations Management', '0000-00-00 00:00:00', '2021-05-16 03:30:43'),
(26, '', 'Professional Master: Statistical Computing', '0000-00-00 00:00:00', '2021-05-16 03:30:48'),
(27, '', 'Professional Master: Human Resource Management ', '0000-00-00 00:00:00', '2021-05-16 03:30:54'),
(28, '', 'Professional Master: Crisis and Risks Management', '0000-00-00 00:00:00', '2021-05-16 03:31:01'),
(29, '', 'Professional Ph.D.: Statistical Quality Control and Quality Assurance ', '0000-00-00 00:00:00', '2021-05-16 03:31:08'),
(30, '', 'Professional Ph.D.: Data Analysis ', '0000-00-00 00:00:00', '2021-05-16 03:31:20'),
(31, '', 'Professional Ph.D.: Software Engineering', '0000-00-00 00:00:00', '2021-05-16 03:31:25'),
(32, '', 'Professional Ph.D.: Operations Research and Decision Support ', '0000-00-00 00:00:00', '2021-05-16 03:31:27'),
(33, '', 'Professional Ph.D.: Project Management', '0000-00-00 00:00:00', '2021-05-16 03:31:33'),
(34, '', 'Professional Ph.D.: Supply Chain & Operations Management', '0000-00-00 00:00:00', '2021-05-16 03:31:39'),
(35, '', 'Professional Ph.D.: Statistical Computing', '0000-00-00 00:00:00', '2021-05-16 03:31:45'),
(36, '', 'Professional Ph.D.: Human Resource Management ', '0000-00-00 00:00:00', '2021-05-16 03:31:50'),
(37, '', 'Professional Ph.D.: Crisis and Risks Management', '0000-00-00 00:00:00', '2021-05-16 03:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `issr_subjects`
--

CREATE TABLE `issr_subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `notes` text DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '2020-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_subjects`
--

INSERT INTO `issr_subjects` (`id`, `code`, `name`, `department`, `active`, `notes`, `created_time`, `updated_time`) VALUES
(1, '1', 'Fundamentals of Quality Control', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(2, '2', 'Information Systems & Knowledge Management', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(3, '3', 'Control Charts', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(4, '4', 'Data Analysis', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(5, '5', 'Quality Systems', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(6, '6', 'Project Management', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(7, '7', 'Acceptance Sampling', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(8, '8', 'Reliability & Replacement', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(9, '9', 'Continuous Improvement', 1, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(10, '10', 'Project', 1, 1, NULL, '2021-05-16 00:07:55', '2021-07-17 10:49:38'),
(11, '1', 'Statistical Analysis', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(12, '2', 'Box Jenkins Models', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(13, '3', 'Econometric Methods', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(14, '4', 'Mathematical Methods of Time Series', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(15, '5', 'Statistical & Econometric Computer Packages', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(16, '6', 'Forecasting and Goodness of Fit of The Model', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(17, '7', 'Econometrics Based Time Series', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(18, '8', 'Application of Time Series in Various Fields', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(19, '9', 'Panel Data Analysis', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(20, '10', 'Project', 2, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(21, '1', 'Introduction to Applied Statistics', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(22, '2', 'Introduction to Sampling Techniques', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(23, '3', 'Introduction to Categorical Data Analysis', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(24, '4', 'Time Series and its Applications', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(25, '5', 'Data Analysis Using SPSS (1)', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(26, '6', 'Index Numbers', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(27, '7', 'Regression Analysis', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(28, '8', 'Introduction to Quantitative Data Analysis', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(29, '9', 'Data Analysis Using SPSS (2)', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(30, '10', 'Project', 3, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(31, '1', 'Statistical Analysis', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(32, '2', 'Statistical Methods and Simulation', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(33, '3', 'Introduction to Mathematical Statistics', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(34, '4', 'Internet Technologies and Programming', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(35, '5', 'Statistical Packages', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(36, '6', 'Stochastic Models and its Applications', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(37, '7', 'Evolutionary & Natural Computations', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(38, '8', 'Time Series and Forecasting', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(39, '9', 'Mathematical Modeling and Decision Analysis', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(40, '10', 'Project', 4, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(41, '1', 'Statistics and Probability', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(42, '2', 'Introduction to Life Testing', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(43, '3', 'Statistical Reliability Analysis', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(44, '4', 'Applied Statistics', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(45, '5', 'Statistical Packages', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(46, '6', 'Prediction and Tolerance Intervals: Measurement and Reliability', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(47, '7', 'Survival Analysis', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(48, '8', 'Statistical Methods in Life Testing', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(49, '9', 'Applications of Life Testing ', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(50, '10', 'Project', 5, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(51, '1', 'Basics of Human Development', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(52, '2', 'Health, Education and Labor Force and Human Development', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(53, '3', 'Methods of Estimating Human Resources', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(54, '4', 'Population Fundamentals', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(55, '5', 'Statistical Methods', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(56, '6', 'Basic Management Skills', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(57, '7', 'Forecasting of Human Resources', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(58, '8', 'Human Development Economics', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(59, '9', 'Population Projections Using Computer Packages', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(60, '10', 'Project', 6, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(61, '1', 'Introduction to Statistics', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(62, '2', 'Data Sources and Evaluation', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(63, '3', 'Introduction to Sampling Techniques', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(64, '4', 'Regression Analysis', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(65, '5', 'Data analysis using SPSS', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(66, '6', 'Introduction to Categorical Data Analysis', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(67, '7', 'Introduction to Quantitative Data Analysis', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(68, '8', 'Introduction to Multilevel Data Analysis', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(69, '9', 'Introduction to Multivariate Analysis', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(70, '10', 'Project', 7, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(71, '1', 'Guide to Public Opinion Polls', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(72, '2', 'Design of Public Opinion Questionnaires', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(73, '3', 'Code of Conduct and Professional Practice for Surveyors', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(74, '4', 'Analysis of Survey Data', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(75, '5', 'Fields of Public Opinion Polls', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(76, '6', 'Survey Data Analysis Using SPSS', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(77, '7', 'Trend and Content Analysis / Content and In-Depth Analysis', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(78, '8', 'Preparing Reports for Polls and Publishing the Findings', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(79, '9', 'Practical Examples of Public Opinion Polls, Performance Evaluation, and Quality Assurance', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(80, '10', 'Project', 8, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(81, '1', 'Population Policies and Projections', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(82, '2', 'Population Data Sources and Evaluation', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(83, '3', 'Population and Development', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(84, '4', 'Analysis of Survey Data Using SPSS', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(85, '5', 'Using Spectrum for Population Projection', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(86, '6', 'Labor Force Projections and Labor Market Indicators', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(87, '7', 'Multilevel Analysis', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(88, '8', 'Structural Equations and Path Analysis by AMOS', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(89, '9', ' Applications of Multivariate Analysis', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(90, '10', 'Project', 9, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(91, '1', 'Overview of Surveys and its Types', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(92, '2', 'Sampling', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(93, '3', 'Data Entry Using CSPRO', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(94, '4', 'Analysis of Qualitative Data', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(95, '5', 'Fertility Analysis', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(96, '6', 'Family Planning and Unmet Need (Reproductive Health)', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(97, '7', 'Mortality and Morbidity', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(98, '8', 'Application of Multivariate Analysis', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(99, '9', 'Conducting Surveys Reports and Publishing its Results', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(100, '10', 'Project', 10, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(101, '1', 'Programming in the Large Systems', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(102, '2', 'Principles of Computer Systems and Programming ', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(103, '3', 'Relational Database Systems', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(104, '4', 'Object-Oriented Software Development using UML', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(105, '5', 'Software Project Management', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(106, '6', 'The User Interface Design', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(107, '7', 'Web Design and Architecture', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(108, '8', 'The Software Process', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(109, '9', 'Agile Software Development', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(110, '10', 'Project', 11, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(111, '1', 'Operation Research Models and its Applications', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(112, '2', 'Decision Support Systems', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(113, '3', 'Business Statistical Analysis', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(114, '4', 'Project Management and Networks', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(115, '5', 'Inventory Management', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(116, '6', 'Operations Management', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(117, '7', 'Modeling and Simulation', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(118, '8', 'Quality Control', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(119, '9', 'Operations Research Software', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(120, '10', 'Project', 12, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(121, '1', 'Fundamentals of Project Management', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(122, '2', 'Data Analysis', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(123, '3', 'Planning and Scheduling', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(124, '4', 'Organization Structure and commination', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(125, '5', 'Decision Making', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(126, '6', 'Budgeting and Cost', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(127, '7', 'Crises and Risk Management', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(128, '8', 'Project Control', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(129, '9', 'Total Quality Management', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(130, '10', 'Project', 13, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(131, '1', 'Introduction to Computer Science', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(132, '2', 'Object Oriented Programming', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(133, '3', 'HTML 5 and CSS3', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(134, '4', 'Adobe Photoshop for Web', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(135, '5', 'Java Script and ASP.NET', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(136, '6', 'Web Programming', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(137, '7', 'SQL Database Server', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(138, '8', 'Bootstrap for Web Design', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(139, '9', 'Searching Engine Optimization for Web Development', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(140, '10', 'Project', 14, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(141, '1', 'Project Management; Tools and Techniques', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(142, '2', 'Tools of Quantitative Analysis in Decision Making', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(143, '3', 'Operations Management', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(144, '4', 'Operations Management Software', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(145, '5', 'Supply Chain Management', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(146, '6', 'Business Statistical Analysis', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(147, '7', 'Information Systems in Supply Chains', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(148, '8', 'Production Management', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(149, '9', 'Quality Management', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(150, '10', 'Project', 15, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(151, '1', 'Basics of Research and Development (R & D)', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(152, '2', 'Data Mining', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(153, '3', 'Continuous Improvement', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(154, '4', 'Decision Making', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(155, '5', 'Simulation', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(156, '6', 'Value Engineering', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(157, '7', 'Reengineering and Change Management', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(158, '8', 'Creativity and Innovation', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(159, '9', 'Forecasting and Early Warning', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(160, '10', 'Project', 16, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(161, '1', 'Fundamentals and Functions of Human Resource Management', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(162, '2', 'Oracle Application in Modern Human Resources', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(163, '3', 'Demography Applications', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(164, '4', 'Managing Replacements', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(165, '5', 'Human Resource Development within the Framework of Total Quality', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(166, '6', 'Labor Laws and Effects on Employment', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(167, '7', 'Employees Performance Evaluations', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(168, '8', 'Introduction to Statistical Analysis', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(169, '9', 'Human Renounces and Job Satisfaction', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(170, '10', 'Project', 17, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(171, '1', 'Crisis and Risk Management (1)', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(172, '2', 'Introduction to Public Administration', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(173, '3', 'Crisis and Risk Management Systems in Egypt', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(174, '4', 'Role of Leadership in Crisis Management', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(175, '5', 'Crisis Management Planning', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(176, '6', 'Role of Media in Crisis Management', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(177, '7', 'Operations Research', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(178, '8', 'Crisis and Risk Management (2)', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(179, '9', 'Crisis Scientific Analysis', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00'),
(180, '10', 'Project', 18, 1, NULL, '2021-05-16 00:07:55', '2020-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `issr_subjects_doctors_registration`
--

CREATE TABLE `issr_subjects_doctors_registration` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL DEFAULT 0,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_subjects_doctors_registration`
--

INSERT INTO `issr_subjects_doctors_registration` (`id`, `subject`, `doctor`, `created_time`, `updated_time`) VALUES
(1, 101, 6, '0000-00-00 00:00:00', '2021-05-16 04:16:10'),
(2, 102, 5, '0000-00-00 00:00:00', '2021-05-16 04:16:14'),
(3, 103, 8, '0000-00-00 00:00:00', '2021-05-16 04:16:17'),
(4, 104, 4, '0000-00-00 00:00:00', '2021-05-16 04:16:20'),
(5, 105, 7, '0000-00-00 00:00:00', '2021-05-16 04:16:24'),
(6, 106, 6, '0000-00-00 00:00:00', '2021-05-16 04:16:27'),
(7, 107, 7, '0000-00-00 00:00:00', '2021-05-16 04:16:32'),
(8, 108, 8, '0000-00-00 00:00:00', '2021-05-16 04:16:36'),
(9, 109, 4, '0000-00-00 00:00:00', '2021-05-16 04:16:39'),
(10, 110, 4, '0000-00-00 00:00:00', '2021-05-16 04:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `issr_subjects_students_registration`
--

CREATE TABLE `issr_subjects_students_registration` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL DEFAULT 0,
  `student` int(11) NOT NULL DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_subjects_students_registration`
--

INSERT INTO `issr_subjects_students_registration` (`id`, `subject`, `student`, `created_time`, `updated_time`) VALUES
(1, 101, 9, '2021-05-16 00:28:55', '2021-07-19 10:10:20'),
(2, 102, 9, '2021-05-16 00:29:12', '2021-07-19 10:10:17'),
(3, 103, 9, '2021-05-16 00:29:15', '2021-07-19 10:10:16'),
(4, 104, 9, '2021-05-16 00:29:18', '2021-07-19 10:09:47'),
(5, 105, 9, '2021-05-16 00:29:21', '1970-01-01 00:00:00'),
(6, 106, 9, '2021-05-16 00:29:24', '1970-01-01 00:00:00'),
(7, 107, 9, '2021-05-16 00:29:27', '1970-01-01 00:00:00'),
(8, 108, 9, '2021-05-16 00:29:31', '1970-01-01 00:00:00'),
(19, 109, 9, '2021-07-17 15:51:39', '1970-01-01 00:00:00'),
(10, 110, 9, '2021-05-16 00:29:39', '1970-01-01 00:00:00'),
(11, 101, 10, '2021-05-17 03:27:35', '1970-01-01 00:00:00'),
(12, 110, 12, '2021-05-19 09:55:20', '1970-01-01 00:00:00'),
(13, 106, 12, '2021-05-19 09:55:39', '1970-01-01 00:00:00'),
(14, 107, 12, '2021-05-19 09:55:54', '1970-01-01 00:00:00'),
(15, 109, 12, '2021-05-19 09:56:02', '1970-01-01 00:00:00'),
(16, 109, 12, '2021-05-19 09:56:03', '1970-01-01 00:00:00'),
(20, 102, 10, '2021-07-19 05:52:17', '1970-01-01 00:00:00'),
(21, 103, 10, '2021-07-19 05:52:21', '1970-01-01 00:00:00'),
(22, 104, 10, '2021-07-19 05:52:24', '1970-01-01 00:00:00'),
(23, 105, 10, '2021-07-19 05:52:28', '1970-01-01 00:00:00'),
(24, 106, 10, '2021-07-19 05:52:30', '1970-01-01 00:00:00'),
(25, 107, 10, '2021-07-19 05:52:32', '1970-01-01 00:00:00'),
(26, 108, 10, '2021-07-19 05:52:35', '1970-01-01 00:00:00'),
(27, 109, 10, '2021-07-19 05:52:37', '1970-01-01 00:00:00'),
(28, 110, 10, '2021-07-19 05:52:40', '1970-01-01 00:00:00'),
(29, 101, 11, '2021-07-19 05:57:27', '1970-01-01 00:00:00'),
(30, 102, 11, '2021-07-19 05:57:29', '1970-01-01 00:00:00'),
(31, 103, 11, '2021-07-19 05:57:31', '1970-01-01 00:00:00'),
(32, 104, 11, '2021-07-19 05:57:33', '1970-01-01 00:00:00'),
(33, 105, 11, '2021-07-19 05:57:36', '1970-01-01 00:00:00'),
(34, 106, 11, '2021-07-19 05:57:40', '1970-01-01 00:00:00'),
(35, 107, 11, '2021-07-19 05:57:42', '1970-01-01 00:00:00'),
(36, 108, 11, '2021-07-19 05:57:45', '1970-01-01 00:00:00'),
(37, 109, 11, '2021-07-19 05:57:47', '1970-01-01 00:00:00'),
(38, 110, 11, '2021-07-19 05:57:50', '1970-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `issr_upload_researches`
--

CREATE TABLE `issr_upload_researches` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `subject` int(11) NOT NULL DEFAULT 0,
  `student` int(11) NOT NULL DEFAULT 0,
  `doctor` int(11) NOT NULL DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_upload_researches`
--

INSERT INTO `issr_upload_researches` (`id`, `date`, `code`, `name`, `file`, `status`, `notes`, `subject`, `student`, `doctor`, `created_time`, `updated_time`) VALUES
(1, '2021-05-17 09:41:31', '202001098-1-9331', '', '202001098-1-9331فوري.pdf', 1, '', 101, 10, 6, '2021-05-17 03:41:31', '2021-05-17 08:12:33'),
(2, '2021-05-23 10:58:22', '202001304-10-8832', '', '202001304-10-8832Project Idea.pdf', 1, '', 110, 9, 4, '2021-05-23 16:58:22', '2021-07-17 07:50:25'),
(3, '2021-07-19 09:46:13', '202001304-1-4419', '', '202001304-1-4419Programming in the Large.pdf', 0, '', 101, 9, 6, '2021-07-19 05:46:13', '1970-01-01 00:00:00'),
(4, '2021-07-19 09:46:37', '202001304-2-4594', '', '202001304-2-4594Computer Systems Principles and Programming.pdf', 0, '', 102, 9, 5, '2021-07-19 05:46:37', '1970-01-01 00:00:00'),
(5, '2021-07-19 09:46:50', '202001304-3-2515', '', '202001304-3-2515Relational Database Systems.pdf', 0, '', 103, 9, 8, '2021-07-19 05:46:50', '1970-01-01 00:00:00'),
(6, '2021-07-19 09:47:01', '202001304-4-3486', '', '202001304-4-3486Object-Oriented Software Development using UML.pdf', 2, '', 104, 9, 4, '2021-07-19 05:47:01', '2021-07-19 09:51:17'),
(7, '2021-07-19 09:47:20', '202001304-5-4869', '', '202001304-5-4869Software Project Management.pdf', 0, '', 105, 9, 7, '2021-07-19 05:47:20', '1970-01-01 00:00:00'),
(8, '2021-07-19 09:47:44', '202001304-6-7831', '', '202001304-6-7831Programming in the Large.docx', 0, '', 106, 9, 6, '2021-07-19 05:47:44', '1970-01-01 00:00:00'),
(9, '2021-07-19 09:48:06', '202001304-7-6531', '', '202001304-7-6531Software Project Management.docx', 0, '', 107, 9, 7, '2021-07-19 05:48:06', '1970-01-01 00:00:00'),
(10, '2021-07-19 09:48:15', '202001304-8-2076', '', '202001304-8-2076Relational Database Systems.docx', 0, '', 108, 9, 8, '2021-07-19 05:48:15', '1970-01-01 00:00:00'),
(11, '2021-07-19 09:48:26', '202001304-9-2461', '', '202001304-9-2461Object-Oriented Software Development using UML.docx', 0, '', 109, 9, 4, '2021-07-19 05:48:26', '1970-01-01 00:00:00'),
(12, '2021-07-19 09:53:51', '202001098-2-3215', '', '202001098-2-3215research.pdf', 0, '', 102, 10, 5, '2021-07-19 05:53:51', '1970-01-01 00:00:00'),
(13, '2021-07-19 09:53:58', '202001098-3-154', '', '202001098-3-154research.pdf', 0, '', 103, 10, 8, '2021-07-19 05:53:58', '1970-01-01 00:00:00'),
(14, '2021-07-19 09:54:09', '202001098-9-4081', '', '202001098-9-4081research.pdf', 1, '', 109, 10, 4, '2021-07-19 05:54:09', '2021-07-19 09:58:37'),
(15, '2021-07-19 09:54:17', '202001098-4-5996', '', '202001098-4-5996research.pdf', 0, '', 104, 10, 4, '2021-07-19 05:54:17', '1970-01-01 00:00:00'),
(16, '2021-07-19 09:54:22', '202001098-10-494', '', '202001098-10-494', 1, '', 110, 10, 4, '2021-07-19 05:54:22', '2021-07-19 09:58:35'),
(17, '2021-07-19 09:57:59', '202001089-4-3284', '', '202001089-4-3284research.pdf', 0, '', 104, 11, 4, '2021-07-19 05:57:59', '1970-01-01 00:00:00'),
(18, '2021-07-19 09:58:04', '202001089-9-6033', '', '202001089-9-6033research.pdf', 2, '', 109, 11, 4, '2021-07-19 05:58:04', '2021-07-19 09:58:32'),
(19, '2021-07-19 09:58:11', '202001089-10-5882', '', '202001089-10-5882research.pdf', 1, '', 110, 11, 4, '2021-07-19 05:58:11', '2021-07-19 09:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `issr_users`
--

CREATE TABLE `issr_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `national_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `department` int(11) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `department_type` tinyint(1) NOT NULL DEFAULT 0,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issr_users`
--

INSERT INTO `issr_users` (`id`, `username`, `email`, `national_id`, `password`, `name`, `phone`, `address`, `job`, `department`, `notes`, `date`, `department_type`, `admin`, `created_time`, `updated_time`) VALUES
(1, 'ahmedelasley', 'ahmedelasley@gmail.com', '0123456789', 'f4e0ac3fa97297d490625aab5817e36ece2f3f47', 'Ahmed EL-Asley', '0123456789', 'AbuKabir', NULL, 0, NULL, '0000-00-00', 0, 1, '2020-12-31 18:00:00', '2021-07-17 07:39:55'),
(2, 'mohamedfawze', 'mohamedfawze@gmail.com', '0123456789', '35b979a9088697753ed514e0811284be3909b3a2', 'Mohamed Fawze', '0123456789', 'Cairo', '', 0, '', '0000-00-00', 0, 1, '2020-12-31 18:00:00', '2021-06-06 19:09:58'),
(3, 'alihassan', 'alihassan@gmail.com', '0123456789', 'c9e65908265f98be81d26f92040da2ae5c5e574d', 'Ali Hassan', '0123456789', 'Zagazig', NULL, 0, NULL, '0000-00-00', 0, 1, '2020-12-31 18:00:00', '2021-04-29 22:44:55'),
(4, 'dr.atef.raslan@gmail.com', 'dr.atef.raslan@gmail.com', '0123456789', '99d8ad00b8b9f8286daf50d84d33e85dc223975f', 'Dr. Atef Raslan', '0123456789', 'Cairo', NULL, 1, NULL, '0000-00-00', 1, 1, '2020-12-31 18:00:00', '2021-07-17 07:51:55'),
(5, 'dr.abeer.mosaad.gh@gmail.com', 'dr.abeer.mosaad.gh@gmail.com', '0123456789', 'b95e3742d34e3c1eaa9d995c63f3bc38b650cf1e', 'Dr. Abeer Mosaad', '0123456789', 'Cairo', NULL, 1, NULL, '0000-00-00', 1, 1, '2020-12-31 18:00:00', '2021-04-29 23:04:22'),
(6, 'dr.ahmed.assad1@gmail.com', 'dr.ahmed.assad1@gmail.com', '0123456789', '287511fb4421b90bf05661ec1c275e607b5f7198', 'De. Ahmed Hamza', '0123456789', 'Cairo', NULL, 1, NULL, '2021-02-22', 1, 1, '2021-02-21 23:18:44', '2021-04-29 23:04:34'),
(7, 'tarekmmmmt@gmail.com', 'tarekmmmmt@gmail.com', '0123456789', 'f0339c67e66923abb386d1c1af05d0fe865c1e9f', 'Dr. Tarek Aly', '0123456789', 'Cairo', NULL, 1, NULL, '2021-02-22', 1, 1, '2021-02-21 23:18:44', '2021-04-29 23:04:31'),
(8, 'dr.ahmed.m.gadallah@gmail.com', 'dr.ahmed.m.gadallah@gmail.com', '0123456789', '2e09de6a4517af2dddd68f70deb078f7b7690682', 'Dr. Ahmed M.Gadallah', '0123456789', 'Cairo', NULL, 1, NULL, '2021-02-22', 1, 1, '2021-02-21 23:18:44', '2021-04-29 23:04:29'),
(9, '202001304', '202001304@gmail.com', '01068382992', '7390f047acd258e2eca0fe9411913a419119c0ba', 'Ahmed Elsayed Ahmed', NULL, 'AbuKabir', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:04'),
(10, '202001098', '202001098@gmail.com', '01272416777', 'a1a52c2352e2f298156f2f9052055807864821b5', 'Mohamed Fawzi', NULL, 'Zagazig', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:16'),
(11, '202001089', '202001089@gmail.com', '01118854199', 'f1333b796820495417731e9e5564bcf20046eb28', 'Mohamed Ahmed', NULL, 'Zagazig', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:24'),
(12, '202001226', '202001226@gmail.com', '01067093670', 'f5de6172018b5053f519b01d23d79d24facb4037', 'Taher Abdelmanam', NULL, 'Cairo', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:26'),
(13, '202001749', '202001749@gmail.com', '01018668340', '676ce033b44a55c85cb76899329a7734f37c4779', 'Mohamed Eid', NULL, 'Cairo', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:28'),
(14, '202001748', '202001748@gmail.com', '01225509777', 'e63338b1ab71acb5489527c5e833aa36349ff7cb', 'Ali Mohamed', NULL, 'Cairo', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:31'),
(15, '202001069', '202001069@gmail.com', '01150429116', '72327c587946725b61a5e774a70e090246ee8aa0', 'Ahmed Mohamed', NULL, 'Cairo', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:33'),
(16, '202001077', '202001077@gmail.com', '01152217995', '9774defd108fb84cd98389a908a52931c6d385fa', 'Aya Ashraf', NULL, 'Cairo', NULL, 11, NULL, '2021-04-29', 2, 1, '2021-04-29 18:52:39', '2021-05-16 04:28:35'),
(18, '202001927', '202001927@gmail.com', '202001927', '92a96c329e948ebc6786bf17a1291ccfda5a8002', 'Mohamed Nour Eldin Ali Ahmed', '01008406264', 'Bni Soufe', '', 11, '', '2021-07-17', 2, 1, '2021-07-17 03:32:26', '2021-07-17 11:46:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issr_departments`
--
ALTER TABLE `issr_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issr_subjects`
--
ALTER TABLE `issr_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issr_subjects_department` (`department`);

--
-- Indexes for table `issr_subjects_doctors_registration`
--
ALTER TABLE `issr_subjects_doctors_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issr_subjects_registration_subject` (`subject`),
  ADD KEY `issr_subjects_registration_doctor` (`doctor`);

--
-- Indexes for table `issr_subjects_students_registration`
--
ALTER TABLE `issr_subjects_students_registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issr_subjects_registration_subject` (`subject`),
  ADD KEY `issr_subjects_registration_student` (`student`);

--
-- Indexes for table `issr_upload_researches`
--
ALTER TABLE `issr_upload_researches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issr_upload_research_subject` (`subject`),
  ADD KEY `issr_upload_research_student` (`student`),
  ADD KEY `issr_upload_research_doctor` (`doctor`);

--
-- Indexes for table `issr_users`
--
ALTER TABLE `issr_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issr_departments`
--
ALTER TABLE `issr_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `issr_subjects`
--
ALTER TABLE `issr_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `issr_subjects_doctors_registration`
--
ALTER TABLE `issr_subjects_doctors_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `issr_subjects_students_registration`
--
ALTER TABLE `issr_subjects_students_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `issr_upload_researches`
--
ALTER TABLE `issr_upload_researches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `issr_users`
--
ALTER TABLE `issr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
