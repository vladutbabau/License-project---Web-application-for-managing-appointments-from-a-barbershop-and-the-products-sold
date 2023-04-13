-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: mai 30, 2022 la 08:32 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `frizerie_db`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) NOT NULL,
  `parola` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `admins`
--

INSERT INTO `admins` (`id`, `nume`, `parola`) VALUES
(2, 'vlad', '8dc7c09356db0b1762fb140617d7375c0a5a4131'),
(3, 'andrei', '8dc7c09356db0b1762fb140617d7375c0a5a4131');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

DROP TABLE IF EXISTS `angajati`;
CREATE TABLE IF NOT EXISTS `angajati` (
  `id_frizer` int(2) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `numar_telefon` varchar(30) NOT NULL,
  `email_frizer` varchar(50) NOT NULL,
  PRIMARY KEY (`id_frizer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorie_serviciu`
--

DROP TABLE IF EXISTS `categorie_serviciu`;
CREATE TABLE IF NOT EXISTS `categorie_serviciu` (
  `id_categorie` int(2) NOT NULL AUTO_INCREMENT,
  `nume_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

DROP TABLE IF EXISTS `clienti`;
CREATE TABLE IF NOT EXISTS `clienti` (
  `id_client` int(5) NOT NULL AUTO_INCREMENT,
  `nume` varchar(30) CHARACTER SET utf8 NOT NULL,
  `prenume` varchar(30) CHARACTER SET utf8 NOT NULL,
  `numar_telefon` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email_client` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `email_client` (`email_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comenzi`
--

DROP TABLE IF EXISTS `comenzi`;
CREATE TABLE IF NOT EXISTS `comenzi` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `numar` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `metoda` varchar(50) NOT NULL,
  `adresa` varchar(500) NOT NULL,
  `total_produse` varchar(1000) NOT NULL,
  `total_pret` int(100) NOT NULL,
  `plasata_la` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_plata` varchar(20) NOT NULL DEFAULT 'in curs',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cos`
--

DROP TABLE IF EXISTS `cos`;
CREATE TABLE IF NOT EXISTS `cos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `pret` int(10) NOT NULL,
  `cantitate` int(10) NOT NULL,
  `imagine` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `mesaje`
--

DROP TABLE IF EXISTS `mesaje`;
CREATE TABLE IF NOT EXISTS `mesaje` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `numar` varchar(12) NOT NULL,
  `mesaj` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `mesaje`
--

INSERT INTO `mesaje` (`id`, `user_id`, `nume`, `email`, `numar`, `mesaj`) VALUES
(1, 1, 'Sorin', 'sorinpeste@yahoo.com', '0765321222', 'Cele mai bune servicii, am si eu nevoie de o crema de hidratare par. Multumesc');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

DROP TABLE IF EXISTS `produse`;
CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `detalii` varchar(500) NOT NULL,
  `pret` int(10) NOT NULL,
  `imagine_1` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id`, `nume`, `detalii`, `pret`, `imagine_1`) VALUES
(1, 'Produs barbierit', 'Crema de barbierit', 45, 'produsbarbierit.png'),
(2, 'Aparat de barbierit', 'Aparat de barbierit', 30, 'aparatbarbierit.png'),
(3, 'Feon Smooth Pro 2100W 6709DE BaByliss', '\r\nTip produs 	Uscatoare de par\r\nDifuzor 	3\r\nPutere: 2100 W\r\nTehnologie: Functie Ionica\r\nMotor: Digital (AC)\r\nDuza: Concentrator aer( 6 x 75mm) si difuzor\r\nTrepte de temperatura: 3\r\nTrepte de viteza: 2', 150, 'feon.png'),
(4, 'Masina de tuns profesional Remington Ultimate Performance HC9700', 'Caracteristici:\r\nLame din otel inoxidabil Japonez\r\nPerformante de taiere profesionale: viteza de taiere de 400 mm/s\r\nMotor cu durata de viata mare: cel putin 10.000 de ore\r\nCarcasa din policarbonat rezistenta la impact\r\nSistem lame detasabil\r\n11 piepteni profesionali pentru diferite lungimi (1 â€“ 25mm)', 390, 'masinadetuns2.png'),
(5, 'Masina de tuns Remington Pro Power Titanium Ultra HC7170', 'Fie cÄƒ este SÃ¢mbÄƒtÄƒ seara sau Luni dimineaÈ›a, nu a fost niciodatÄƒ mai uÈ™or sÄƒ Ã®È›i pÄƒstrezi un look perfect 24/7. È˜tim cÃ¢t este de important pentru tine sÄƒ arÄƒÈ›i perfect, de aceea suntem foarte Ã®ncrezÄƒtori cÄƒ o sÄƒ iubeÈ™ti Pro Power Titanium Ultra, aparatul de tuns conceput pentru a oferi un tuns perfect Ã®ntr-o clipÄƒ!', 230, 'masinadetuns.png'),
(6, 'Masina de tuns Stylist HC363C', 'Aparatul de Tuns Remington Stylist se poate folosi oriunde È™i este simplu de utilizat de oricine. Oferind un rezultat minunat de fiecare datÄƒ, acest set conÈ›ine tot ce este necesar pentru a oferi un tuns perfect.', 155, 'masinadetuns3.png'),
(7, 'Aparat de bÄƒrbierit DuraBlade Remington Manchester United Edition MB055', 'Un produs revolutionar in domeniul tunsului facial, Remington Durablade este acum disponibil si in culorile memorabile ale echipei Manchester United, pentru a tunde, modela si oferi acel aspect proaspat barbierit tuturor fanilor Man United.', 100, 'Aparatdebarbierit.png'),
(8, 'Perie de par latÄƒ Shine Therapy B80P pentru ingrijire ', 'PerfectÄƒ pentru Ã®ndreptarea pÄƒrului, Peria latÄƒ Shine Therapy are peri din nailon cu infuzie de microparticule antistatice care se transferÄƒ Ã®n pÄƒr Ã®n timpul coafÄƒrii.', 25, 'periedepar.png'),
(9, 'Borseta din piele accesorii pentru brau Lila Rossa A142 ', 'Cel mai comod accesoriu pe care Ã®l poÈ›i avea la frizerie', 75, 'borsetapiele.png'),
(10, 'Scaun profesional pentru coafor si frizerie, Lila Rossa, negru BX-166A', 'Greutate:50kg', 670, 'scaunfrizerie1.png'),
(11, 'Foarfeca de tuns', 'O foarfeca pentru profesionisti', 25, 'foarfecadetuns.png');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `programari`
--

DROP TABLE IF EXISTS `programari`;
CREATE TABLE IF NOT EXISTS `programari` (
  `id_programare` int(5) NOT NULL AUTO_INCREMENT,
  `data_programarii` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(5) NOT NULL,
  `id_frizer` int(2) NOT NULL,
  `timp_incepere` timestamp NOT NULL,
  `timp_terminal_estimativ` timestamp NOT NULL,
  `anulare_programare` tinyint(1) NOT NULL,
  `motiv_anulare` text,
  PRIMARY KEY (`id_programare`),
  KEY `FK_id_frizer` (`id_frizer`),
  KEY `FK_id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `program_angajati`
--

DROP TABLE IF EXISTS `program_angajati`;
CREATE TABLE IF NOT EXISTS `program_angajati` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_frizer` int(2) NOT NULL,
  `id_ziua` tinyint(1) NOT NULL,
  `ora_incepere` time NOT NULL,
  `ora_final` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_id_frizer` (`id_frizer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `servicii`
--

DROP TABLE IF EXISTS `servicii`;
CREATE TABLE IF NOT EXISTS `servicii` (
  `id_serviciu` int(5) NOT NULL AUTO_INCREMENT,
  `nume_serviciu` varchar(50) NOT NULL,
  `descriere_serviciu` varchar(255) NOT NULL,
  `pret_serviciu` int(10) NOT NULL,
  `durata_serviciu` int(20) NOT NULL,
  `id_categorie` int(2) NOT NULL,
  PRIMARY KEY (`id_serviciu`),
  KEY `FK_id_categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `servicii_rezervate`
--

DROP TABLE IF EXISTS `servicii_rezervate`;
CREATE TABLE IF NOT EXISTS `servicii_rezervate` (
  `id_programare` int(5) NOT NULL,
  `id_serviciu` int(5) NOT NULL,
  PRIMARY KEY (`id_programare`),
  KEY `FK_id_serviciu` (`id_serviciu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE IF NOT EXISTS `utilizatori` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nume` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `nume`, `email`, `parola`) VALUES
(1, 'vladut', 'vladut_babau@yahoo.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `pret` int(100) NOT NULL,
  `imagine` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
