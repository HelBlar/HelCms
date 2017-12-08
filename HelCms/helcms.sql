-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Kwi 2017, 18:10
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `helcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `n_id` int(255) NOT NULL,
  `tytul` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`n_id`, `tytul`, `tresc`, `author`, `data`) VALUES
(57, 'Pierwszy chociaÅ¼ nie ostatni', 'treÅ›Ä‡ artykuÅ‚u testowego', 'Administrator', '2017-04-09'),
(59, 'Drugi ArtykuÅ‚', 'Niech teÅ¼ istnieje', 'Administrator', '2017-04-09'),
(60, 'NagÅ‚Ã³wek', 'TreÅ›Ä‡ artykuÅ‚u', 'Administrator', '2017-04-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `avatar` char(255) COLLATE utf8_polish_ci DEFAULT '../img/0.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `type`, `avatar`) VALUES
(1, 'Administrator', '$2y$10$yWoN8hO0ahGTrxS8k0pZQ.rVGD6W4C3w32cyIC4uZCwipOKwkpqm2', '', 1, 'http://68.media.tumblr.com/01234b9ef91ebe76224d621b5acebacf/tumblr_okgix22AaV1rpwm80o1_250.png'),
(2, 'adam', 'adam', '', 0, '0'),
(3, 'kamil', '$2y$10$aEgUeHt.B5cafBfHx4g4OeYP.0H9FuX9YZT90hfgfN4PgdHvgmbEi', 'drozdkamil@gmail.com', 0, '0'),
(4, 'mieciumieciu', '$2y$10$AOXmX1L.eaXziXu4UsntQOKOZrgFmKMhpai1VNGgqVDqwITDbfTHu', 'minionkibanana@wp.pl', 0, 'http://cracon.pl/wp-content/uploads/2015/09/Panda-Update.jpg'),
(5, 'Helblar', '$2y$10$NtPcFVSxCYBPFEgezMSZBOR4H78xiPwhvXJJv9PKUHFxwGuBuhM5K', 'kamil@kamil.pl', 0, '0');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `n_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
