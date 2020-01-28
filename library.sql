-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Sty 2020, 17:42
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `publisher` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `release_year` int(4) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publisher`, `release_year`, `availability`) VALUES
(1, 'Metro 2033', 'Glukhovsky, Dmitry', 'Insignis', 2010, 1),
(2, 'Królewski zwiadowca', 'Flanagan, John', 'Wydawnictwo Jaguar', 2013, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `surname` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `surname`, `address`, `is_admin`) VALUES
(12345, '$2y$10$/sAUz62IZcBy5Luzxe02pO3GDjgJOgbXIEydyDa5hf0OFTuQrjg42', 'admin', 'admin', 'admin panel', 1),
(45678, '', 'Adam', 'Nowak', 'Słoneczna 21', 0),
(67890, '$2y$10$3jV2E6Jchhht3hlahT/qYuvaKTEUTqHxvZO0HYyp.4ejuRUXSJTQ6', 'Jan', 'Kowal', 'Pogodna 12', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_books`
--

CREATE TABLE `users_books` (
  `users_id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users_books`
--
ALTER TABLE `users_books`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `books_id` (`books_id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_books_ibfk_2` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
