-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2015 at 11:23 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_voornaam` varchar(200) NOT NULL,
  `admin_achternaam` varchar(200) NOT NULL,
  `admin_foto` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_voornaam`, `admin_achternaam`, `admin_foto`) VALUES
(1, 'Roman', 'Kreuziger', '');

-- --------------------------------------------------------

--
-- Table structure for table `bericht`
--

CREATE TABLE `bericht` (
  `bericht_id` int(10) NOT NULL,
  `bericht_tekst` varchar(300) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `bezoeker_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beschikbaar`
--

CREATE TABLE `beschikbaar` (
  `beschikbaar_id` int(10) NOT NULL,
  `beschikbaar_dag` date NOT NULL,
  `beschikbaar_uur` time NOT NULL,
  `gids_fk` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beschikbaar`
--

INSERT INTO `beschikbaar` (`beschikbaar_id`, `beschikbaar_dag`, `beschikbaar_uur`, `gids_fk`) VALUES
(3, '2015-04-01', '06:00:00', 3),
(4, '2015-04-01', '11:00:00', 3),
(5, '2015-04-02', '03:00:00', 4),
(6, '2015-04-02', '09:00:00', 4),
(7, '2015-04-03', '06:00:00', 5),
(8, '2015-04-03', '13:00:00', 5),
(9, '2015-04-04', '08:00:00', 6),
(19, '2015-04-30', '16:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bezoeker`
--

CREATE TABLE `bezoeker` (
  `bezoeker_id` int(10) NOT NULL,
  `bezoeker_facebookid` int(50) NOT NULL,
  `bezoeker_naam` varchar(200) NOT NULL,
  `bezoeker_email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bezoeker`
--

INSERT INTO `bezoeker` (`bezoeker_id`, `bezoeker_facebookid`, `bezoeker_naam`, `bezoeker_email`) VALUES
(3, 2147483647, 'Ande Timmerman', ''),
(4, 2147483647, 'Ande Timmerman', ''),
(5, 2147483647, 'Ande Timmerman', ''),
(6, 2147483647, 'Ande Timmerman', ''),
(7, 2147483647, 'Ande Timmerman', ''),
(8, 2147483647, 'Ande Timmerman', ''),
(9, 2147483647, 'Ande Timmerman', ''),
(10, 2147483647, 'Ande Timmerman', ''),
(11, 2147483647, 'Ande Timmerman', ''),
(12, 2147483647, 'Ande Timmerman', ''),
(13, 2147483647, 'Ande Timmerman', ''),
(14, 2147483647, 'Ande Timmerman', ''),
(15, 2147483647, 'Ande Timmerman', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `feedback_tekst` varchar(300) NOT NULL,
  `bezoeker_id` int(10) NOT NULL,
  `feedback_rating` int(10) NOT NULL,
  `gids_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_tekst`, `bezoeker_id`, `feedback_rating`, `gids_id`) VALUES
(1, 'Super', 3, 1, 3),
(2, 'Super', 4, 1, 3),
(3, 'Super', 5, 1, 3),
(4, 'Super', 6, 1, 3),
(5, 'Super', 7, 1, 3),
(6, 'Super', 8, 1, 3),
(7, 'Super', 9, 1, 3),
(8, 'Super', 10, 1, 3),
(9, 'Super', 11, 1, 3),
(10, 'Super', 12, 1, 3),
(11, 'Super', 13, 1, 3),
(12, 'Super', 14, 1, 3),
(13, 'Super', 15, 1, 3),
(14, 'Super!', 3, 5, 3),
(15, 'Super!', 4, 5, 3),
(16, 'Super!', 5, 5, 3),
(17, 'Super!', 6, 5, 3),
(18, 'Super!', 7, 5, 3),
(19, 'Super!', 8, 5, 3),
(20, 'Super!', 9, 5, 3),
(21, 'Super!', 10, 5, 3),
(22, 'Super!', 11, 5, 3),
(23, 'Super!', 12, 5, 3),
(24, 'Super!', 13, 5, 3),
(25, 'Super!', 14, 5, 3),
(26, 'Super!', 15, 5, 3),
(27, 'Super', 3, 1, 3),
(28, 'Super', 4, 1, 3),
(29, 'Super', 5, 1, 3),
(30, 'Super', 6, 1, 3),
(31, 'Super', 7, 1, 3),
(32, 'Super', 8, 1, 3),
(33, 'Super', 9, 1, 3),
(34, 'Super', 10, 1, 3),
(35, 'Super', 11, 1, 3),
(36, 'Super', 12, 1, 3),
(37, 'Super', 13, 1, 3),
(38, 'Super', 14, 1, 3),
(39, 'Super', 15, 1, 3),
(40, 'Vreselijk', 3, 3, 3),
(41, 'Vreselijk', 4, 3, 3),
(42, 'Vreselijk', 5, 3, 3),
(43, 'Vreselijk', 6, 3, 3),
(44, 'Vreselijk', 7, 3, 3),
(45, 'Vreselijk', 8, 3, 3),
(46, 'Vreselijk', 9, 3, 3),
(47, 'Vreselijk', 10, 3, 3),
(48, 'Vreselijk', 11, 3, 3),
(49, 'Vreselijk', 12, 3, 3),
(50, 'Vreselijk', 13, 3, 3),
(51, 'Vreselijk', 14, 3, 3),
(52, 'Vreselijk', 15, 3, 3),
(53, 'sucks', 3, 1, 5),
(54, 'sucks', 4, 1, 5),
(55, 'sucks', 5, 1, 5),
(56, 'sucks', 6, 1, 5),
(57, 'sucks', 7, 1, 5),
(58, 'sucks', 8, 1, 5),
(59, 'sucks', 9, 1, 5),
(60, 'sucks', 10, 1, 5),
(61, 'sucks', 11, 1, 5),
(62, 'sucks', 12, 1, 5),
(63, 'sucks', 13, 1, 5),
(64, 'sucks', 14, 1, 5),
(65, 'sucks', 15, 1, 5),
(66, 'sucks', 3, 1, 5),
(67, 'sucks', 4, 1, 5),
(68, 'sucks', 5, 1, 5),
(69, 'sucks', 6, 1, 5),
(70, 'sucks', 7, 1, 5),
(71, 'sucks', 8, 1, 5),
(72, 'sucks', 9, 1, 5),
(73, 'sucks', 10, 1, 5),
(74, 'sucks', 11, 1, 5),
(75, 'sucks', 12, 1, 5),
(76, 'sucks', 13, 1, 5),
(77, 'sucks', 14, 1, 5),
(78, 'sucks', 15, 1, 5),
(79, 'pipo', 3, 1, 3),
(80, 'pipo', 4, 1, 3),
(81, 'pipo', 5, 1, 3),
(82, 'pipo', 6, 1, 3),
(83, 'pipo', 7, 1, 3),
(84, 'pipo', 8, 1, 3),
(85, 'pipo', 9, 1, 3),
(86, 'pipo', 10, 1, 3),
(87, 'pipo', 11, 1, 3),
(88, 'pipo', 12, 1, 3),
(89, 'pipo', 13, 1, 3),
(90, 'pipo', 14, 1, 3),
(91, 'pipo', 15, 1, 3),
(92, 'pipo', 3, 1, 3),
(93, 'pipo', 4, 1, 3),
(94, 'pipo', 5, 1, 3),
(95, 'pipo', 6, 1, 3),
(96, 'pipo', 7, 1, 3),
(97, 'pipo', 8, 1, 3),
(98, 'pipo', 9, 1, 3),
(99, 'pipo', 10, 1, 3),
(100, 'pipo', 11, 1, 3),
(101, 'pipo', 12, 1, 3),
(102, 'pipo', 13, 1, 3),
(103, 'pipo', 14, 1, 3),
(104, 'pipo', 15, 1, 3),
(105, 'Hallo', 3, 3, 3),
(106, 'Hallo', 4, 3, 3),
(107, 'Hallo', 5, 3, 3),
(108, 'Hallo', 6, 3, 3),
(109, 'Hallo', 7, 3, 3),
(110, 'Hallo', 8, 3, 3),
(111, 'Hallo', 9, 3, 3),
(112, 'Hallo', 10, 3, 3),
(113, 'Hallo', 11, 3, 3),
(114, 'Hallo', 12, 3, 3),
(115, 'Hallo', 13, 3, 3),
(116, 'Hallo', 14, 3, 3),
(117, 'Hallo', 15, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `geboekt`
--

CREATE TABLE `geboekt` (
  `geboekt_id` int(50) NOT NULL,
  `bezoeker_id` int(50) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `geboekt_isgeboekt` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geboekt`
--

INSERT INTO `geboekt` (`geboekt_id`, `bezoeker_id`, `gids_id`, `geboekt_isgeboekt`) VALUES
(1, 0, 4, ''),
(2, 0, 5, ''),
(3, 0, 3, ''),
(4, 0, 6, ''),
(5, 0, 0, ''),
(6, 0, 3, ''),
(7, 2147483647, 4, ''),
(8, 2147483647, 5, ''),
(9, 2147483647, 5, ''),
(10, 2147483647, 3, ''),
(12, 2147483647, 3, '1'),
(13, 2147483647, 3, '1'),
(14, 2147483647, 3, '1'),
(15, 2147483647, 3, '1'),
(16, 2147483647, 3, '1'),
(17, 2147483647, 3, '1'),
(18, 2147483647, 3, '1'),
(19, 2147483647, 3, '1'),
(20, 2147483647, 4, '1'),
(21, 2147483647, 4, '1'),
(22, 2147483647, 3, '1'),
(23, 2147483647, 3, '1'),
(24, 2147483647, 3, '1'),
(25, 2147483647, 3, '1'),
(26, 2147483647, 3, '1'),
(27, 2147483647, 3, '1'),
(28, 3, 3, '1'),
(29, 3, 3, '1'),
(30, 3, 3, '1'),
(31, 5, 5, '1'),
(32, 6, 6, '1'),
(33, 4, 3, '1'),
(34, 2, 5, '1'),
(35, 4, 6, '1'),
(36, 2, 5, '1'),
(37, 2, 5, '1'),
(38, 4, 6, '1'),
(39, 4, 4, '1'),
(40, 4, 3, '1'),
(41, 4, 3, '1'),
(42, 2147483647, 3, '1'),
(43, 2147483647, 3, '1'),
(44, 2147483647, 3, '1'),
(45, 2147483647, 3, '1'),
(46, 3, 3, '1'),
(47, 3, 3, '1'),
(48, 3, 3, '1'),
(49, 5, 5, '1'),
(50, 5, 5, '1'),
(51, 6, 6, '1'),
(52, 2147483647, 6, '1'),
(53, 2147483647, 3, '1'),
(54, 2147483647, 6, '1'),
(55, 2147483647, 3, '1'),
(56, 2147483647, 3, '1'),
(57, 2147483647, 3, '1'),
(58, 2147483647, 4, '1'),
(59, 2147483647, 3, '1'),
(60, 4, 4, '1'),
(61, 3, 3, '1'),
(62, 2147483647, 3, '1'),
(63, 2147483647, 3, '1'),
(64, 2147483647, 3, '1'),
(65, 2147483647, 5, '1'),
(66, 2147483647, 3, '1'),
(67, 2147483647, 3, '1'),
(68, 2147483647, 3, '1'),
(69, 2147483647, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `gids`
--

CREATE TABLE `gids` (
  `gids_id` int(10) NOT NULL,
  `gids_voornaam` varchar(200) NOT NULL,
  `gids_naam` varchar(200) NOT NULL,
  `gids_foto` varchar(300) NOT NULL,
  `gids_bio` varchar(300) NOT NULL,
  `gids_richting` varchar(200) NOT NULL,
  `gids_jaar` int(10) NOT NULL,
  `gids_stad` varchar(200) NOT NULL,
  `gids_email` varchar(200) NOT NULL,
  `gids_wachtwoord` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gids`
--

INSERT INTO `gids` (`gids_id`, `gids_voornaam`, `gids_naam`, `gids_foto`, `gids_bio`, `gids_richting`, `gids_jaar`, `gids_stad`, `gids_email`, `gids_wachtwoord`) VALUES
(3, 'Ande', 'Timmerman', '', 'Ben een IMD''er in hart en nieren', 'Webdesign', 2, 'Gent', 'ande.timmerman@student.thomasmore.be', '$2y$12$C6TQ1yJgz3JHOvop5BpMbeAGL/SwRePZ.FXi3evB9FVQUteVUyzIW'),
(4, 'Nick', 'Van Puyvelde', '', 'Webdesigner worden is mijn droom die realiteit wordt', 'Webdesign', 2, 'Mechelen', 'nick.vanpuyvelde@student.thomasmore.be', '$2y$12$Q9h24c63MmExuztVOA7jfOgbIFI43d1IlfZowpfLEXFr8dRYiCYny'),
(5, 'Manuel', 'Van Den Notelaer', '', 'Hallo, punk is mijn missie, maar ook IMD', 'Webdevelopment', 3, 'Brussel', 'manuel.vandennotelaer@student.thomsmore.be', '$2y$12$LdZcAJuHQwHQ3SlvvVjjIuAM0HJZp58/C.zkaTrm4xWZsdsBlbzC.'),
(6, 'Stijn', 'Vandoorslaer', '', 'Ben een Dj''er die evenzeer een IMD''er is, let''s start the party!', 'Webdesign', 3, 'Antwerpen', 'stijn.vandoorslaer@student.thomasmore.be', '$2y$12$rFLjyCYJHmZq9mD3mB4XhOk3NS1648QmADltnwdb9E8RnUklBJnWq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bericht`
--
ALTER TABLE `bericht`
  ADD PRIMARY KEY (`bericht_id`), ADD KEY `gids_id` (`gids_id`), ADD KEY `bezoeker_id` (`bezoeker_id`);

--
-- Indexes for table `beschikbaar`
--
ALTER TABLE `beschikbaar`
  ADD PRIMARY KEY (`beschikbaar_id`), ADD KEY `gids_id` (`gids_fk`);

--
-- Indexes for table `bezoeker`
--
ALTER TABLE `bezoeker`
  ADD PRIMARY KEY (`bezoeker_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`), ADD KEY `bezoeker_id` (`bezoeker_id`), ADD KEY `gids_id` (`gids_id`);

--
-- Indexes for table `geboekt`
--
ALTER TABLE `geboekt`
  ADD PRIMARY KEY (`geboekt_id`);

--
-- Indexes for table `gids`
--
ALTER TABLE `gids`
  ADD PRIMARY KEY (`gids_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bericht`
--
ALTER TABLE `bericht`
  MODIFY `bericht_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `beschikbaar`
--
ALTER TABLE `beschikbaar`
  MODIFY `beschikbaar_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `bezoeker`
--
ALTER TABLE `bezoeker`
  MODIFY `bezoeker_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `geboekt`
--
ALTER TABLE `geboekt`
  MODIFY `geboekt_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `gids`
--
ALTER TABLE `gids`
  MODIFY `gids_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
