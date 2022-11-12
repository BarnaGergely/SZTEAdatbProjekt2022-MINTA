-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2016. Okt 27. 15:37
-- Szerver verzió: 5.6.21
-- PHP verzió: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `KONYVTAR`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `KONYVEK`
--

CREATE TABLE IF NOT EXISTS `KONYVEK` (
  `konyvszam` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `szerzo` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kiado` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `ev` int(4) DEFAULT NULL,
  `olvasojegy` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `KONYVEK`
--

INSERT INTO `KONYVEK` (`konyvszam`, `cim`, `szerzo`, `kiado`, `ev`, `olvasojegy`) VALUES
('IFJ001', 'Tüskevár', 'Fekete István', 'Móra Ferenc Ifjúsági Kiadó Zrt', 2009, 62829),
('INF001', 'Adatbázisrendszerek - Alapvetés', 'Jeffrey D. Ullmann - Jennifer Widom', 'Panem Kft.', 2009, NULL),
('INF002', 'Adatbázisrendszerek megvalósítása 	', 'Hector Garcia - Molina - Jeffrey D. Ullmann\r\n	\r\n\r\n', 'Panem Kft.', 2008, 12345),
('INF006', 'Operációs rendszerek', 'A.S. Tanenbaum', 'Panem', 2006, NULL),
('INF007', 'Számítógép architektúrák', 'A.S. Tanenbaum', 'Panem', 2006, NULL),
('INF009', 'Bizonságos webalkalmazások PHP nyelven', 'T.Ballad, W. Ballad', 'Kiskapu', 2010, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `OLVASOK`
--

CREATE TABLE IF NOT EXISTS `OLVASOK` (
  `olvasojegy` int(6) NOT NULL,
  `nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `szuldatum` date DEFAULT NULL,
  `lakcim` varchar(100) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `OLVASOK`
--

INSERT INTO `OLVASOK` (`olvasojegy`, `nev`, `szuldatum`, `lakcim`) VALUES
(12345, 'Németh Gábor', '1981-04-29', '6720 Szeged, Árpád tér 2.'),
(62829, 'Tóth Árvizi Tibor', '1916-11-13', '6720 Szeged, Tükör utca 31.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `KONYVEK`
--
ALTER TABLE `KONYVEK`
 ADD PRIMARY KEY (`konyvszam`), ADD KEY `olvasojegy` (`olvasojegy`);

--
-- Indexes for table `OLVASOK`
--
ALTER TABLE `OLVASOK`
 ADD PRIMARY KEY (`olvasojegy`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
