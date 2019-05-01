-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 apr 2019 om 16:15
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productlab2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feed`
--

CREATE TABLE `feed` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fundings`
--

CREATE TABLE `fundings` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `amount` int(11) NOT NULL,
  `wallet_user_id` int(11) NOT NULL,
  `wallet_project_id` int(11) NOT NULL,
  `funding_repay` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Agriculture'),
(2, 'Animals'),
(3, 'Health'),
(4, 'Multimedia'),
(5, 'Design & Tech'),
(6, 'Travel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `organisations`
--

CREATE TABLE `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `projects_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `date_created`, `description`, `projects_id`) VALUES
(1, 'none', '2019-04-18', 'none', 0),
(2, 'Unicef', '2018-07-17', 'Unicef werkt mee aan de verdediging van de rechten van het kind in de wereld en helpt hen een beter leven te leiden. Ontdek hier hoe we ons doel bereiken!', NULL),
(3, 'Broederlijk Delen', '2017-12-14', 'Broederlijk Delen werkt samen met zo’n 130 lokale organisaties in Afrika, Latijns-Amerika en Israël en Palestina. Samen met hen strijden wij succesvol tegen armoede en ongelijkheid. Wij focussen daarbij op drie thema’s: recht op voedsel, duurzaam beheer van natuurlijke rijkdommen, en inspraak en vrede.', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `name` varchar(250) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `feed_id` int(11) DEFAULT NULL,
  `goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`id`, `active`, `name`, `wallet_id`, `location`, `organisation_id`, `date_created`, `date_start`, `date_end`, `description`, `feed_id`, `goal`) VALUES
(2, 1, 'Touraya Mbali', 5, 'Africa', 2, '2019-04-24', '2019-04-25', '2019-05-25', 'I like turtles', NULL, 350);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects_genres`
--

CREATE TABLE `projects_genres` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `projects_genres`
--

INSERT INTO `projects_genres` (`id`, `project_id`, `genre_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'normal'),
(2, 'editor');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `active`, `date_created`, `firstname`, `lastname`, `img`, `role_id`, `organisation_id`, `wallet_id`) VALUES
(1, 1, '2019-04-24', 'Aqsa', 'Intizar', 'https://www.facebook.com/photo.php?fbid=1521214634675774&set=a.106093152854603&type=3&theater', 2, 1, 1),
(2, 1, '2019-04-24', 'Yannis', 'Wellemans', 'https://www.facebook.com/photo.php?fbid=715243655215732&set=a.103537826386321&type=3&theater', 2, 1, 2),
(3, 1, '2019-04-23', 'Dielan ', 'Ophals', 'https://www.facebook.com/photo.php?fbid=1784065058352596&set=a.108001565958962&type=3&theater', 2, 1, 3),
(4, 1, '2019-04-26', 'John', 'Doe', 'https://www.google.com/search?q=john+doe&source=lnms&tbm=isch&sa=X&ved=0ahUKEwju__bax-jhAhVM_KQKHQTSAGUQ_AUIDigB&biw=1396&bih=686#imgrc=NKHIErLRRkUJJM:', 1, 1, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `wallet`
--

INSERT INTO `wallet` (`id`, `date_created`, `total`) VALUES
(1, '2019-04-24', 20),
(2, '2019-04-24', 50),
(3, '2019-04-23', 10),
(4, '2019-04-23', 15),
(5, '2019-04-04', 45),
(6, '2019-04-13', 35),
(7, '2019-04-01', 5),
(8, '2019-04-03', 21),
(9, '2019-04-27', 17),
(10, '2019-04-30', 31),
(11, '2019-04-21', 87),
(12, '2019-04-29', 23),
(13, '2019-04-28', 11),
(14, '2019-04-11', 14),
(15, '2019-05-03', 52),
(16, '2019-05-17', 42);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `fundings`
--
ALTER TABLE `fundings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_user_id` (`wallet_user_id`),
  ADD KEY `wallet_project_id` (`wallet_project_id`);

--
-- Indexen voor tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_id` (`projects_id`);

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisation_id` (`organisation_id`),
  ADD KEY `feed_id` (`feed_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- Indexen voor tabel `projects_genres`
--
ALTER TABLE `projects_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `organisatie_id` (`organisation_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- Indexen voor tabel `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `feed`
--
ALTER TABLE `feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `fundings`
--
ALTER TABLE `fundings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `projects_genres`
--
ALTER TABLE `projects_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `fundings`
--
ALTER TABLE `fundings`
  ADD CONSTRAINT `fundings_ibfk_1` FOREIGN KEY (`wallet_project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `fundings_ibfk_2` FOREIGN KEY (`wallet_user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`feed_id`) REFERENCES `feed` (`id`),
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD CONSTRAINT `project_ibfk_4` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`);

--
-- Beperkingen voor tabel `projects_genres`
--
ALTER TABLE `projects_genres`
  ADD CONSTRAINT `projects_genres_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `projects_genres_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
