-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 02 jun 2019 om 21:18
-- Serverversie: 10.2.13-MariaDB
-- PHP-versie: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dielaey253_crowdcredit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'agriculture'),
(2, 'animals'),
(3, 'health'),
(4, 'multimedia'),
(5, 'design &amp; tech'),
(6, 'travel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `continent` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `locations`
--

INSERT INTO `locations` (`id`, `continent`) VALUES
(1, 'Africa'),
(2, 'Asia'),
(3, 'South-America');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `organisations`
--

CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `description`, `banner`, `timestamp`, `active`) VALUES
(1, 'none', 'none', '', '2019-01-01 00:00:00', 1),
(2, 'Oxfam', 'Dielan gij met u groen....', 'https://guardian.ng/wp-content/uploads/2016/05/Oxfam-1.jpg', '2019-05-07 00:00:00', 1),
(3, 'Unicef', 'Wij bennen Unicef.', 'https://cdn.freebiesupply.com/logos/large/2x/unicef-2-logo-png-transparent.png', '2019-06-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locations_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` float NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`id`, `name`, `locations_id`, `date_start`, `date_end`, `banner`, `description`, `goal`, `organisation_id`, `timestamp`, `active`) VALUES
(1, 'Web agency', 1, '2019-05-11', '2019-06-21', 'https://web2icm.files.wordpress.com/2013/12/picture1.jpg', 'Donkey farm', 500, 2, '2019-05-04 11:10:09', 1),
(2, 'Anaya\'s Chicken Farm', 1, '2019-05-11', '2019-06-20', 'images/misschien.jpg', 'Anaya lives in Kalsaka, a small village situated in Burkina Faso, together with her husband and child. \r\n\r\nHer father has always been working on farms, but Anaya would love to try something different. Her village has a \r\nshortage for meat but plenty of wheat and corn. Anaya believes a chicken farm would be beneficial for her community.\r\n\r\nNeeds: \r\n\r\n- Rent a small ranch \r\n- Purchase chicks \r\n- Get food & water\r\n- Cover other necessary start-up expenses', 250, 2, '2019-05-04 11:10:09', 1),
(3, 'Local Guiding', 1, '2019-06-27', '2019-06-20', 'images/bg_project_4.jpg', 'Donkey farm', 200, 3, '2019-05-04 11:10:09', 1),
(5, 'Fisherman from Congo', 3, '2019-06-20', '2019-06-20', 'images/bg_project_2.jpg', 'Hello everyone! All my life I\'ve been living in a poor village. I\'ve got 3 children and a lovely wife. I want to start a business so I can feed my family. Fishing is something I\'m very good at, and I want to make money out of it. Could you please help me out? Thanks in advance ', 400, 2, '2019-05-04 11:10:09', 1),
(6, 'Fruit growing', 1, '2019-05-11', '2019-06-21', 'images/bg_project_3.jpg', 'Recently I bought a piece of farmland and was interested to start growing all sorts of fruits and vegetables. My dad had been a farmer all his life and I would love to foolow in his footsteps. ', 550, 2, '2019-05-04 11:10:09', 1),
(8, 'Rice cultivation', 2, '2019-05-11', '2019-06-13', 'images/bg_org_1.jpg', 'Donkey farm', 500, 3, '2019-05-04 11:10:09', 1),
(10, 'Climbing Tutor', 3, '2019-05-11', '2019-06-21', 'images/bg_org_2.jpg', 'Since I was a litle boy, I\'ve been running and climbing through the mountains of the Andes. Lately the tourism is becoming more and more apparent, and I would love to learn people how to climb safe through our wonderul nature. With a little amount of money Im able to buy quality gear to ensure safe lessons. Thank you for your help', 250, 3, '2019-05-04 11:10:09', 1),
(12, 'Ocean cleaning', 3, '2019-05-11', '2019-05-23', 'images/bg_project_5.jpg', 'Donkey farm', 400, 2, '2019-05-04 11:10:09', 1),
(13, 'Donkey farm', 1, '2019-05-11', '2019-06-21', 'http://2.bp.blogspot.com/-WnRZOGyOwMM/TrpA6oATSMI/AAAAAAAADJg/wRp9Cx54qdg/s1600/donkeys.jpg', 'Donkey farm', 500, 3, '2019-05-04 11:10:09', 1),
(14, 'Donkey farm', 1, '2019-05-11', '2019-06-13', 'http://2.bp.blogspot.com/-WnRZOGyOwMM/TrpA6oATSMI/AAAAAAAADJg/wRp9Cx54qdg/s1600/donkeys.jpg', 'Donkey farm', 500, 2, '2019-05-04 11:10:09', 1),
(15, 'Organisation', 2, '2019-05-11', '2019-06-20', 'images/bg_org_3.jpg', 'Donkey farm', 500, 2, '2019-05-04 11:10:09', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_feed`
--

CREATE TABLE `project_feed` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `project_feed`
--

INSERT INTO `project_feed` (`id`, `project_id`, `image`, `description`, `timestamp`, `active`) VALUES
(1, 2, 'images/bg_org_2.jpg', 'I bought a chicken', '2019-05-01 00:00:00', 1),
(2, 2, 'images/bg_org_3.jpg', 'It\'s time to get started!', '2019-05-13 00:00:00', 1),
(3, 2, 'images/bg_org_1.jpg', 'My first post!', '2019-05-08 00:00:00', 1),
(5, 6, 'https://tse1.mm.bing.net/th?id=OIP.CR-hl_eDxyH1mPqZu61xhgHaFX&pid=Api', 'Because of your help we were able to bought some crates! Thank you all!', '2019-05-22 00:00:00', 1),
(6, 6, 'https://growappalachia.berea.edu/wp-content/uploads/2015/06/6-11-080.jpg', 'The first fruit is a fact! and it\'s growning fast.', '2019-05-22 00:00:00', 1),
(7, 8, 'https://images.ecosia.org/jeBtVS4UXSEaT_sMpgsCgezM1VI=/0x390/smart/http%3A%2F%2Fwww.kbc.co.ke%2Fwp-content%2Fuploads%2F2017%2F04%2Frice-seeds-1.jpg', 'HI everyone! We bought our fist seeds! So thank you all for believing in us', '2019-05-22 00:00:00', 1),
(8, 8, 'https://tse1.mm.bing.net/th?id=OIP.7EGGl_weRmCJWcKS06No4AHaDb&pid=Api', 'Look at those precious little things! and all thanks to you!', '2019-05-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_genre`
--

CREATE TABLE `project_genre` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `project_genre`
--

INSERT INTO `project_genre` (`id`, `project_id`, `genre_id`) VALUES
(1, 15, 2),
(4, 15, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'normal'),
(2, 'editor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `refund` tinyint(1) NOT NULL,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `organisation_id` int(11) DEFAULT 1,
  `wallet` float NOT NULL,
  `timestamp` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `image`, `role_id`, `organisation_id`, `wallet`, `timestamp`, `active`) VALUES
(1, 'Dielan', 'Ophals', 'dielano@hotmail.be', '$2y$15$tfEgRx.hN73W4FMN7OjpAuOpgD.S2CUVftPwEjzafc7qprjrY6i32', 'https://www.dielanophals.be/images/me.jpg', 3, 2, 413.9, '2019-05-01 13:31:12', 1),
(2, 'niet', 'annelies', 'anoniempje@geheim.be', '$2y$14$4JgNR2ZRDk1P68pYuqSAxeHSO3IR5PSLM.rUX7KoFVLp8QhWpuwc2', '', 1, 1, 0, '2019-05-15 10:01:49', 1),
(3, 'test', 'test', 'test@t.t', '$2y$14$LlrproALRYvs1cKvJP252.tShu5UwSsidaIcD/26dSUlh4PGjJyby', '', 1, 1, 0, '2019-05-15 10:52:01', 1),
(4, 'Aqsa', 'Intizar', 'aqsatje@live.ve', '$2y$14$4pfoFJwwaQc4Banvl7HS..DKa1Vle0q37/1/3pJHgJxnFzGuuj0XS', '', 1, 2, 0, '2019-05-15 16:06:27', 1),
(5, 'Yannis', 'Wellemans', 'yannis.wellemans@hotmail.com', '$2y$14$lHj.YwGSU9aVJZk2577WRuG4DsKXYxQmTMJw6rt0IVf0UQ0UTJbOC', 'https://c1.staticflickr.com/5/4152/5020694474_56cd8260d6_b.jpg', 1, 1, 98457, '2019-05-22 09:53:52', 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_id` (`organisation_id`),
  ADD KEY `locations_id` (`locations_id`);

--
-- Indexen voor tabel `project_feed`
--
ALTER TABLE `project_feed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexen voor tabel `project_genre`
--
ALTER TABLE `project_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `organisation_id` (`organisation_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT voor een tabel `project_feed`
--
ALTER TABLE `project_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `project_genre`
--
ALTER TABLE `project_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`locations_id`) REFERENCES `locations` (`id`);

--
-- Beperkingen voor tabel `project_feed`
--
ALTER TABLE `project_feed`
  ADD CONSTRAINT `project_feed_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Beperkingen voor tabel `project_genre`
--
ALTER TABLE `project_genre`
  ADD CONSTRAINT `project_genre_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `project_genre_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Beperkingen voor tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
