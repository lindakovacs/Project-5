-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2015 at 12:31 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
`message_id` int(11) NOT NULL,
  `message_tekst` varchar(300) NOT NULL,
  `bezoeker_id` int(20) NOT NULL,
  `gids_id` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_tekst`, `bezoeker_id`, `gids_id`) VALUES
(4, 'hello, my name is nick', 0, 0),
(5, 'hello, mijn naam is Nick.', 0, 0),
(6, 'Hello, mijn naam is Nick.', 0, 0),
(7, 'hello, how are you today?', 0, 0),
(8, 'hello', 0, 0),
(9, 'cv?', 0, 0),
(10, 'cv?', 0, 0),
(11, 'cvkes', 0, 0),
(12, 'wat doe je ?', 0, 0),
(13, 'alles goed?', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;