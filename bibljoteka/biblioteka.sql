-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2020, 22:41
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `email`) VALUES
(1, 'admin', '$2y$10$tbJq66kw4/pjHoimuMh31eI7IBEqogi339iYRoi9ybaUiD6uxC/Pi', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `ksiazka` text COLLATE utf8_polish_ci NOT NULL,
  `wyda` text COLLATE utf8_polish_ci NOT NULL,
  `ile` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `ksiazka`, `wyda`, `ile`) VALUES
(36, 'ksiązka', 'Warszawa', -2),
(37, 'wiedzmin', 'suwalki', 21),
(38, 'pleban', 'chozew', 21),
(39, 'Dziady cz1', 'warszawa', 21),
(42, 'pan tadeusz', 'Suwalki', 7),
(43, 'zbyszek', 'warszawa', 6),
(45, 'ksioazka', 'wawa', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `dayregister` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `dayregister`) VALUES
(1, 'adam', '$2y$10$sMvZP6g.mtQwz2MFqlir9.PR5CgB9v63l/o3FD75utozGHHoidJru', 'adam@gmail.com', '2020-01-24 20:40:04'),
(12, 'krzysztof', '$2y$10$H7Tnsk961z8yEJaBFgRLWeJBg/TA6tTuer.TRx2eJ4yS21MjM7e1y', 'krzysztof@gmail.com', '2016-11-17 14:20:42'),
(13, 'skowron', '$2y$10$0MUc9D78XgYXH5ClIW90cush4sJ6NzLEy.joIlRDFEs8yEdTKLr1e', 'sss@gmail.com', '2019-11-14 13:53:36'),
(14, 'rafal', '$2y$10$qomB2pe8Vmkr7rcPgUO4MucJaVkD4pBBb6Q7fXlz0l1nKJRUwg91G', 'rafal@gmail.com', '2019-11-20 21:02:57'),
(19, 'radek1', '$2y$10$LaoThLGmwIW8jp1JIp301OyJG8wqF1CBHAaPsCPTI3Do2M1L.8lnq', 'xxxxz@gmail.com', '2020-01-23 12:48:52'),
(222, 'ewqewqewqewq', 'ewqewqweqe', 'ewqewqewqewq', '2020-01-10 22:28:57'),
(2, 'ewqewqewq', 'ewqewqewq', 'ewqewqewqewq', '2020-01-10 22:01:33');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `ksiozka` text COLLATE utf8_polish_ci NOT NULL,
  `czas` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id`, `user`, `ksiozka`, `czas`) VALUES
(20, '1', '2', '2019-11-15 23:45:03'),
(18, '32', '2', '2019-11-22 23:33:40'),
(40, '12', '1', '2020-01-13 19:21:19'),
(6, '1', '32', '2019-11-22 09:38:42'),
(7, '2', '2', '2019-11-22 09:39:49'),
(8, '21', '12', '2019-11-22 11:03:59'),
(9, '21', '12', '2019-11-22 11:04:40'),
(10, '21', '12', '2019-11-22 11:04:54'),
(11, '21', '12', '2019-11-22 11:05:39'),
(62, '1', '3', '2020-01-15 21:24:47'),
(116, '1', '36', '2020-01-17 20:33:20'),
(15, '31', '13', '2019-11-22 11:08:43'),
(126, '19', '42', '2020-01-17 22:30:44'),
(22, '1', '8', '2019-11-16 00:12:01'),
(23, '2', '54', '2019-12-13 12:09:17'),
(24, '22', '41', '2019-12-13 12:11:21'),
(41, '12', '37', '2020-01-13 19:21:40'),
(39, '1', '4', '2020-01-13 19:19:41'),
(115, '16', '36', '2020-01-17 20:27:17'),
(112, '1', '36', '2020-01-17 20:26:42'),
(42, '14', '5', '2020-01-13 19:25:19'),
(36, '17', '1', '2019-12-27 21:55:11'),
(114, '18', '36', '2020-01-17 20:27:08'),
(113, '2', '36', '2020-01-17 20:27:00'),
(64, '18', '36', '2020-01-16 12:44:56'),
(65, '18', '37', '2020-01-16 12:45:02'),
(119, '231', '36', '2020-01-17 20:58:26'),
(117, '3', '36', '2020-01-17 20:40:43'),
(118, '19', '36', '2020-01-17 20:48:50'),
(120, '1', '231', '2020-01-17 21:04:23');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
