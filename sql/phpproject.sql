-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2015 at 01:05 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
  `bezoeker_facebookid` int(10) NOT NULL,
  `bezoeker_naam` varchar(200) NOT NULL,
  `bezoeker_email` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bezoeker`
--

INSERT INTO `bezoeker` (`bezoeker_id`, `bezoeker_facebookid`, `bezoeker_naam`, `bezoeker_email`) VALUES
(1, 2147483647, 'Ande Timmerman', ''),
(2, 2147483647, 'Ande Timmerman', ''),
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
(15, 2147483647, 'Ande Timmerman', ''),
(16, 2147483647, 'Ande Timmerman', ''),
(17, 2147483647, 'Ande Timmerman', ''),
(18, 2147483647, 'Ande Timmerman', ''),
(19, 2147483647, 'Ande Timmerman', ''),
(20, 2147483647, 'Ande Timmerman', ''),
(21, 2147483647, 'Ande Timmerman', ''),
(22, 2147483647, 'Ande Timmerman', ''),
(23, 2147483647, 'Ande Timmerman', ''),
(24, 2147483647, 'Ande Timmerman', ''),
(25, 2147483647, 'Ande Timmerman', ''),
(26, 2147483647, 'Ande Timmerman', ''),
(27, 2147483647, 'Ande Timmerman', ''),
(28, 2147483647, 'Ande Timmerman', ''),
(29, 2147483647, 'Ande Timmerman', ''),
(30, 2147483647, 'Ande Timmerman', ''),
(31, 2147483647, 'Ande Timmerman', ''),
(32, 2147483647, 'Ande Timmerman', ''),
(33, 2147483647, 'Ande Timmerman', ''),
(34, 2147483647, 'Ande Timmerman', ''),
(35, 2147483647, 'Ande Timmerman', ''),
(36, 2147483647, 'Ande Timmerman', ''),
(37, 2147483647, 'Ande Timmerman', ''),
(38, 2147483647, 'Ande Timmerman', ''),
(39, 2147483647, 'Ande Timmerman', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `geboekt`
--

CREATE TABLE `geboekt` (
  `geboekt_id` int(50) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `bezoeker_id` int(50) NOT NULL,
  `geboekt_isgeboekt` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geboekt`
--

INSERT INTO `geboekt` (`geboekt_id`, `gids_id`, `bezoeker_id`, `geboekt_isgeboekt`) VALUES
(1, 4, 0, ''),
(2, 5, 0, ''),
(3, 3, 0, ''),
(4, 6, 0, ''),
(5, 0, 0, ''),
(6, 3, 0, ''),
(7, 4, 2147483647, ''),
(8, 5, 2147483647, ''),
(9, 5, 2147483647, ''),
(10, 3, 2147483647, ''),
(12, 3, 2147483647, '1'),
(13, 3, 2147483647, '1'),
(14, 3, 2147483647, '1');

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
  MODIFY `beschikbaar_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `bezoeker`
--
ALTER TABLE `bezoeker`
  MODIFY `bezoeker_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `geboekt`
--
ALTER TABLE `geboekt`
  MODIFY `geboekt_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gids`
--
ALTER TABLE `gids`
  MODIFY `gids_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bericht`
--
ALTER TABLE `bericht`
ADD CONSTRAINT `bericht_ibfk_1` FOREIGN KEY (`gids_id`) REFERENCES `gids` (`gids_id`),
ADD CONSTRAINT `bericht_ibfk_2` FOREIGN KEY (`bezoeker_id`) REFERENCES `bezoeker` (`bezoeker_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`bezoeker_id`) REFERENCES `bezoeker` (`bezoeker_id`),
ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`gids_id`) REFERENCES `gids` (`gids_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
