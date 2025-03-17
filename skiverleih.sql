-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Mrz 2025 um 15:23
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `skiverleih`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunden`
--

CREATE TABLE `kunden` (
  `id` int(11) NOT NULL,
  `nachname` varchar(50) DEFAULT NULL,
  `vorname` varchar(50) DEFAULT NULL,
  `ausweis` varchar(20) DEFAULT NULL,
  `telefon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `kunden`
--

INSERT INTO `kunden` (`id`, `nachname`, `vorname`, `ausweis`, `telefon`) VALUES
(1, 'Zuse', 'Konrad', '123456', '49123456'),
(2, 'Stallman', 'Richard', '234567', '1234567'),
(3, 'Berners-Lee', 'Tim', '345678', '44345678'),
(4, 'Torvalds', 'Linus', '456789', '3456789'),
(5, 'Zuckerberg', 'Mark', '1234556', '2344566');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `skier`
--

CREATE TABLE `skier` (
  `id` int(11) NOT NULL,
  `hersteller` varchar(50) DEFAULT NULL,
  `preis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `skier`
--

INSERT INTO `skier` (`id`, `hersteller`, `preis`) VALUES
(1, 'Rossignol', 30),
(2, 'Fischer', 30),
(3, 'Salomon', 60),
(4, 'Head', 50);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `verleih`
--

CREATE TABLE `verleih` (
  `id` int(11) NOT NULL,
  `beginn` date DEFAULT NULL,
  `dauer` int(11) DEFAULT NULL,
  `kunden_id` int(11) DEFAULT NULL,
  `skier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Daten für Tabelle `verleih`
--

INSERT INTO `verleih` (`id`, `beginn`, `dauer`, `kunden_id`, `skier_id`) VALUES
(1, '2024-12-12', 1, 1, 1),
(2, '2024-12-25', 5, 2, 2),
(3, '2024-12-26', 2, 3, 3),
(4, '2025-01-02', 4, 4, 4),
(5, '2025-02-01', 2, 3, 3),
(6, '2025-03-01', 3, 1, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `skier`
--
ALTER TABLE `skier`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `verleih`
--
ALTER TABLE `verleih`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_knd` (`kunden_id`),
  ADD KEY `fk_sk` (`skier_id`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `verleih`
--
ALTER TABLE `verleih`
  ADD CONSTRAINT `fk_knd` FOREIGN KEY (`kunden_id`) REFERENCES `kunden` (`id`) ON UPDATE RESTRICTED,
  ADD CONSTRAINT `fk_sk` FOREIGN KEY (`skier_id`) REFERENCES `skier` (`id`) ON UPDATE RESTRICTED;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
