-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 mei 2015 om 15:29
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `phpproject`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(10) NOT NULL,
  `admin_voornaam` varchar(200) NOT NULL,
  `admin_achternaam` varchar(200) NOT NULL,
  `admin_foto` varchar(300) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_wachtwoord` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_voornaam`, `admin_achternaam`, `admin_foto`, `admin_email`, `admin_wachtwoord`) VALUES
(1, 'Roman', 'Kreuziger', '', '0', '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beschikbaarheid`
--

CREATE TABLE IF NOT EXISTS `beschikbaarheid` (
`beschikbaar_id` int(11) NOT NULL,
  `beschikbaar_dag_uur` varchar(20) NOT NULL,
  `gids_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `beschikbaarheid`
--

INSERT INTO `beschikbaarheid` (`beschikbaar_id`, `beschikbaar_dag_uur`, `gids_id`) VALUES
(1, '10/05/2015 - 14:15', 1),
(2, '25/05/2015 - 16:35', 3),
(3, '17/05/2015 - 10:30', 4),
(4, '21/05/2015 - 13:20', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoeker`
--

CREATE TABLE IF NOT EXISTS `bezoeker` (
`bezoeker_id` int(10) NOT NULL,
  `bezoeker_facebookid` varchar(100) NOT NULL,
  `bezoeker_naam` varchar(60) NOT NULL,
  `bezoeker_email` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bezoeker`
--

INSERT INTO `bezoeker` (`bezoeker_id`, `bezoeker_facebookid`, `bezoeker_naam`, `bezoeker_email`) VALUES
(1, '10153203190333188', 'Stijn Van Doorslaer', 'stijnvd_26@hotmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`feedback_id` int(10) NOT NULL,
  `feedback_tekst` varchar(300) NOT NULL,
  `bezoeker_id` int(10) NOT NULL,
  `feedback_rating` int(10) NOT NULL,
  `gids_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `geboekt`
--

CREATE TABLE IF NOT EXISTS `geboekt` (
`geboekt_id` int(50) NOT NULL,
  `bezoeker_facebookid` varchar(100) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `geboekt_isgeboekt` varchar(10) NOT NULL,
  `geboekt_toegestaan` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `geboekt`
--

INSERT INTO `geboekt` (`geboekt_id`, `bezoeker_facebookid`, `gids_id`, `geboekt_isgeboekt`, `geboekt_toegestaan`) VALUES
(1, '10153203190333188', 2, '1', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gids`
--

CREATE TABLE IF NOT EXISTS `gids` (
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
-- Gegevens worden geëxporteerd voor tabel `gids`
--

INSERT INTO `gids` (`gids_id`, `gids_voornaam`, `gids_naam`, `gids_foto`, `gids_bio`, `gids_richting`, `gids_jaar`, `gids_stad`, `gids_email`, `gids_wachtwoord`) VALUES
(1, 'Stijn', 'Van Doorslaer', 'stijn-profielfoto.jpg', 'DJ', 'Webdesign', 2, 'Hofstade', 'stijn.vandoorslaer@student.thomasmore.be', '$2y$12$0O.lhq5rynD8pxnuHCuNGOzkTRz42vyM.RhZ/9jv.hE.CUAh3Q2cu'),
(2, 'Nick', 'van Puyvelde', 'nick.jpg', 'Gitaar', 'Webdesign', 2, 'Machelen', 'nick.vanpuyvelde@student.thomasmore.be', '$2y$12$.tYwX61EXxtJTZZDA4eU5O8lUD4.GxS1VUWgJOnIOm9y9Wz5MnbWe'),
(3, 'Ande', 'Timmerman', 'ande.jpg', 'Fotografie', 'Webdesign', 2, 'Gent', 'ande.timmerman@student.thomasmore.be', '$2y$12$ZtUxB98kiQLo5.dzCavrWu9y0BCNs140fO7ili0NNf0bU7cdYeX1a'),
(4, 'Manuel', 'van den Notelaer', 'manuel.jpg', 'Gitaar', 'Webdesign', 2, 'Heist-op-den-berg', 'manuel.vandennotelaer@student.thomsmore.be', '$2y$12$YAIaZyrXePeKRkvZ9N8GeuFbiHdDB2bnN/nPPqboKH.5x9MnbFhFa');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`bericht_id` int(10) NOT NULL,
  `bericht_tekst` varchar(300) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `bezoeker_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
`id` int(4) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `gids_fk` int(10) NOT NULL,
  `bezoeker_fk` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `vote`
--

INSERT INTO `vote` (`id`, `name`, `total`, `votes`, `gids_fk`, `bezoeker_fk`) VALUES
(1, 'First item', 73, 17, 0, 0),
(2, 'Second item', 15, 4, 0, 0),
(3, 'Third thing', 34, 10, 0, 0),
(4, 'The Forth', 39, 9, 0, 0),
(5, 'Fifth Thing', 135, 33, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexen voor tabel `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
 ADD PRIMARY KEY (`beschikbaar_id`);

--
-- Indexen voor tabel `bezoeker`
--
ALTER TABLE `bezoeker`
 ADD PRIMARY KEY (`bezoeker_id`);

--
-- Indexen voor tabel `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`feedback_id`), ADD KEY `bezoeker_id` (`bezoeker_id`), ADD KEY `gids_id` (`gids_id`);

--
-- Indexen voor tabel `geboekt`
--
ALTER TABLE `geboekt`
 ADD PRIMARY KEY (`geboekt_id`);

--
-- Indexen voor tabel `gids`
--
ALTER TABLE `gids`
 ADD PRIMARY KEY (`gids_id`);

--
-- Indexen voor tabel `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`bericht_id`), ADD KEY `gids_id` (`gids_id`), ADD KEY `bezoeker_id` (`bezoeker_id`);

--
-- Indexen voor tabel `vote`
--
ALTER TABLE `vote`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
MODIFY `beschikbaar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `bezoeker`
--
ALTER TABLE `bezoeker`
MODIFY `bezoeker_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `feedback`
--
ALTER TABLE `feedback`
MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `geboekt`
--
ALTER TABLE `geboekt`
MODIFY `geboekt_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `gids`
--
ALTER TABLE `gids`
MODIFY `gids_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `message`
--
ALTER TABLE `message`
MODIFY `bericht_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `vote`
--
ALTER TABLE `vote`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
