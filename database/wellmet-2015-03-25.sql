-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Már 25. 13:44
-- Szerver verzió: 5.5.27
-- PHP verzió: 5.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `kportal`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`owner`),
  KEY `user_id_2` (`owner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `text`, `date`, `owner`) VALUES
(1, 'asdfgjoasvoueoirjg', '2014-11-19', 2),
(2, 'hkjhnoiuchujhwelkjoöivjdfiougvoefvuojhuirf', '2014-11-19', 2),
(3, '<p>A projekt nyomonkövetéséhez és mentéséhez már a github-ot használjuk\r\n\r\n<p>A projekt: <a href="https://github.com/lorvei/wellmet">https://github.com/lorvei/wellmet</a>', '2015-02-12', 10),
(4, 'Megtalálták', '2015-03-04', 13),
(5, 'Nem megjelenítendő szöveg! (csak vicc)', '2015-03-04', 10),
(6, 'asd', '2015-03-23', 13),
(7, 'yeah', '2015-03-23', 13),
(8, 'Boltba mentünk.', '2015-03-23', 13),
(9, 'huhhúúú!!! működik!!', '2015-03-23', 11),
(10, 'nyet', '2015-03-23', 11),
(11, 'igen', '2015-03-23', 11),
(12, 'nemár', '2015-03-23', 11),
(13, 'neee', '2015-03-23', 11),
(14, 'hát igen, már sokkal jobb', '2015-03-24', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profilkepek`
--

CREATE TABLE IF NOT EXISTS `profilkepek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_id` int(11) NOT NULL,
  `filenev` varchar(100) NOT NULL,
  `leiras` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profil_id` (`profil_id`),
  KEY `profil_id_2` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- A tábla adatainak kiíratása `profilkepek`
--

INSERT INTO `profilkepek` (`id`, `profil_id`, `filenev`, `leiras`) VALUES
(2, 16, 'ecset 2-1426761981.jpg', 'leiras'),
(3, 16, 'h1-1426762028.png', 'leiras'),
(4, 16, 'nyuszis-1426835038.jpg', 'leiras'),
(5, 33, 'nyuszis-1426835038-1426836835.jpg', 'leiras'),
(6, 33, 'ecset 2-1426761943-1426837588.jpg', 'leiras'),
(7, 33, 'ppm-1426837752.jpg', 'leiras'),
(8, 33, 'h1-1426762028-1426838138.png', 'leiras'),
(9, 33, 'ppf-1426838236.jpg', 'leiras');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profilok`
--

CREATE TABLE IF NOT EXISTS `profilok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `szuletesi_datum` date NOT NULL,
  `nem` varchar(5) NOT NULL,
  `registracio_datum` date NOT NULL,
  `erdeklodesi_kor` text NOT NULL,
  `bemutatkozas` text NOT NULL,
  `megye` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `nem_id` (`nem`),
  KEY `user_id_3` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- A tábla adatainak kiíratása `profilok`
--

INSERT INTO `profilok` (`id`, `user_id`, `szuletesi_datum`, `nem`, `registracio_datum`, `erdeklodesi_kor`, `bemutatkozas`, `megye`) VALUES
(16, 2, '1997-01-01', 'Férfi', '2015-03-16', 'PC, autók', 'sadfsadf', 'Somogy'),
(33, 14, '1983-07-05', 'Férfi', '2015-03-20', 'politika, ivászat, zenék', 'Tető fedő eladó!', 'Jász-Nagykun-Szolnok'),
(51, 11, '1993-07-06', 'Nő', '2015-03-23', 'politika, ivászat', 'vdfsgbrdjh', 'Somogy'),
(53, 10, '1987-04-01', 'Férfi', '2015-03-24', 'politika, zenék', 'nedsgvdsfver', 'Somogy'),
(56, 13, '1991-07-01', 'Férfi', '2015-03-24', 'politika, ivászat', 'lpvpiowaef', 'Pest');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rights`
--

INSERT INTO `rights` (`id`, `description`) VALUES
(1, 'Adminisztrátor'),
(2, 'Főszerkesztő'),
(3, 'Profil'),
(4, 'Felhasználó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(25) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rights` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `uname` (`uname`),
  KEY `rights` (`rights`),
  KEY `rights_2` (`rights`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uname`, `upass`, `email`, `name`, `rights`, `active`) VALUES
(2, 'lorvei', '$1$W52.nZ/.$2EfLwiwr1FsFttrRSD/OU0', 'kovacs.m94@gmail.com', 'Kovács Márk', 1, 1),
(10, 'kesespista', '$1$W52.nZ/.$2EfLwiwr1FsFttrRSD/OU0', 'kanyarpista@gmail.com', 'Kanyar István', 3, 0),
(11, 'asd', '$1$1g2..e..$uKbSd/YXK3Ru6isz9h9xK.', 'asd@asd.asd', 'Asdelina', 2, 1),
(12, 'teki', '$1$Xf5.Un0.$ramEyiHi.RmvadfmDL4Rt.', 'tekki@freemail.hu', 'Teknős Alex', 4, 0),
(13, 'petike', '$1$5G3.oy2.$DhDjHl1/NJP3Av7HRmlrr/', 'valami@valami.asd', 'Péter Én', 3, 1),
(14, 'levelek', '$1$Jg1.es1.$hHa/Ty6LT2pgUGEdfcCZR/', 'tonhal@freemail.hu', 'Tető József', 4, 1),
(21, 'fsdf', '$1$Vn3.4c2.$TfKTH1jgHmAVpucjpzDmy1', 'sdaf', 'asdf', 4, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE IF NOT EXISTS `uzenetek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `felado_id` int(11) NOT NULL,
  `cimzett_id` int(11) NOT NULL,
  `mikor` datetime NOT NULL,
  `szoveg` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `felado_id` (`felado_id`,`cimzett_id`),
  KEY `felado_id_2` (`felado_id`),
  KEY `cimzett_id` (`cimzett_id`),
  KEY `felado_id_3` (`felado_id`),
  KEY `cimzett_id_2` (`cimzett_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`id`, `felado_id`, `cimzett_id`, `mikor`, `szoveg`) VALUES
(5, 2, 13, '2015-03-25 11:23:35', 'csa'),
(9, 13, 2, '2015-03-25 12:59:59', 'jaja'),
(10, 2, 13, '2015-03-25 13:01:15', 'sikerült tesó!!! :D'),
(12, 13, 11, '2015-03-25 13:22:33', 'yeah'),
(13, 13, 10, '2015-03-25 13:31:29', 'lel'),
(14, 13, 11, '2015-03-25 13:32:46', 'hehe'),
(15, 13, 2, '2015-03-25 13:37:14', 'johhohooo');

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `profilkepek`
--
ALTER TABLE `profilkepek`
  ADD CONSTRAINT `profilkepek_ibfk_1` FOREIGN KEY (`profil_id`) REFERENCES `profilok` (`id`);

--
-- Megkötések a táblához `profilok`
--
ALTER TABLE `profilok`
  ADD CONSTRAINT `profilok_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Megkötések a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD CONSTRAINT `uzenetek_ibfk_2` FOREIGN KEY (`cimzett_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `uzenetek_ibfk_1` FOREIGN KEY (`felado_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
