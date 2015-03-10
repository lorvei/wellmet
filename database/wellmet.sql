-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2015. Már 10. 11:33
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
  `lead` varchar(200) NOT NULL,
  `title` varchar(60) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `tag` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `news`
--

INSERT INTO `news` (`id`, `lead`, `title`, `text`, `date`, `tag`, `published`) VALUES
(1, '', 'valami', 'asdfgjoasvoueoirjg', '2014-11-19', 2, 1),
(2, '', 'valamiasd', 'hkjhnoiuchujhwelkjoöivjdfiougvoefvuojhuirf', '2014-11-19', 2, 0),
(3, '', 'GitHub használata', '<p>A projekt nyomonkövetéséhez és mentéséhez már a github-ot használjuk\r\n\r\n<p>A projekt: <a href="https://github.com/lorvei/wellmet">https://github.com/lorvei/wellmet</a>', '2015-02-12', 1, 1),
(4, 'Eltűnt', 'Tesztalany', 'Megtalálták', '2015-03-04', 3, 1),
(5, 'Valóban létezik!', 'Létező', 'Nem megjelenítendő szöveg! (csak vicc)', '2015-03-04', 4, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `realid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(25) NOT NULL,
  `title` varchar(60) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`realid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- A tábla adatainak kiíratása `pages`
--

INSERT INTO `pages` (`realid`, `id`, `title`, `text`) VALUES
(1, 'bemutatkozas', 'Lorem Ip', '<p>\r\n                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n            </p>\r\n            <p>\r\n                Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.\r\n            </p>\r\n            <p>\r\n                Fusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.\r\n            </p>\r\n            <p>\r\n                Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.\r\n            </p>'),
(2, 'kapcsolat', 'Kapcsolat', 'telefon: 3453567376');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `profilkepek`
--

INSERT INTO `profilkepek` (`id`, `profil_id`, `filenev`, `leiras`) VALUES
(1, 7, 'pp.jpg', 'van');

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
  `bemutatkozas` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `nem_id` (`nem`),
  KEY `user_id_3` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- A tábla adatainak kiíratása `profilok`
--

INSERT INTO `profilok` (`id`, `user_id`, `szuletesi_datum`, `nem`, `registracio_datum`, `bemutatkozas`) VALUES
(7, 11, '1992-05-12', 'Nő', '2015-03-09', 'sdffsadfcsvrev'),
(9, 2, '1992-04-08', 'Férfi', '2015-03-10', 'ngdgffssdcsdvsfdvfvdfv');

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
(3, 'Hírszerkesztő'),
(4, 'Felhasználó');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` tinyint(4) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tags`
--

INSERT INTO `tags` (`id`, `description`) VALUES
(1, 'Tudomány'),
(2, 'IT/Tech'),
(3, 'Film'),
(4, 'Játék');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `rights` (`rights`),
  KEY `rights_2` (`rights`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `uname`, `upass`, `email`, `name`, `rights`) VALUES
(2, 'lorvei', '$1$W52.nZ/.$2EfLwiwr1FsFttrRSD/OU0', 'kovacs.m94@gmail.com', 'Kovács Márk', 1),
(10, 'kesespista', '$1$W52.nZ/.$2EfLwiwr1FsFttrRSD/OU0', 'kanyarpista@gmail.com', 'Kanyar István', 3),
(11, 'asd', '$1$1g2..e..$uKbSd/YXK3Ru6isz9h9xK.', 'asd@asd.asd', 'Asdelina', 2),
(12, 'teki', '$1$Xf5.Un0.$ramEyiHi.RmvadfmDL4Rt.', 'tekki@freemail.hu', 'Teknős Alex', 4);

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
  KEY `cimzett_id` (`cimzett_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `uzenetek_ibfk_1` FOREIGN KEY (`felado_id`) REFERENCES `profilok` (`id`),
  ADD CONSTRAINT `uzenetek_ibfk_2` FOREIGN KEY (`cimzett_id`) REFERENCES `profilok` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
