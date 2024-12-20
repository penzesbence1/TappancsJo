-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Nov 19. 00:29
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tappancs`
--
CREATE DATABASE IF NOT EXISTS `tappancs` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `tappancs`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `Felhasznalo_id` int(11) NOT NULL,
  `Vezeteknev` varchar(50) NOT NULL,
  `Keresztnev` varchar(50) NOT NULL,
  `Felhasznalonev` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefonszam` varchar(20) NOT NULL,
  `Jelszo` varchar(100) NOT NULL,
  `Jog_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`Felhasznalo_id`, `Vezeteknev`, `Keresztnev`, `Felhasznalonev`, `Email`, `Telefonszam`, `Jelszo`, `Jog_id`) VALUES
(10, 'Admin', 'József', 'admin', 'admi@admin.com', '06301234567', '$2y$10$yF5YFswx6GNMLcFQlCLl5uA2RYshtQ4BLVt9DW9v1X8ioSJOG3mWa', '1__'),
(11, 'Asd', 'Milán', 'asd', 'asd@asd.com', '', '$2y$10$DBK2pctBHeocXyFpSMNZteARL6mPEC6IaxCE82F5ArYugKmi7OuLK', '__1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jogok`
--

CREATE TABLE `jogok` (
  `Jog_id` int(11) NOT NULL,
  `Jog_nev` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jogok`
--

INSERT INTO `jogok` (`Jog_id`, `Jog_nev`) VALUES
(1, 'Latogato'),
(2, 'Felhasznalo'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kapcsolat`
--

CREATE TABLE `kapcsolat` (
  `Kapcsolat_Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefonszam` varchar(20) NOT NULL,
  `Uzenet` varchar(2000) NOT NULL,
  `Ido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kapcsolat`
--

INSERT INTO `kapcsolat` (`Kapcsolat_Id`, `Email`, `Telefonszam`, `Uzenet`, `Ido`) VALUES
(1, 'email@mail.com', '06301234567', 'Üdv, nem jó az oldal.', '2024-11-19 00:18:54');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `jog` varchar(3) NOT NULL,
  `nev` varchar(20) NOT NULL,
  `url` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`jog`, `nev`, `url`) VALUES
('111', 'Főoldal', 'home'),
('111', 'Kapcsolat', 'kapcsolat'),
('_1_', 'Belépés', 'login'),
('_1_', 'Regisztráció', 'register'),
('1_1', 'Üzenőfal', 'uzenofal'),
('1__', 'Kapcsolat (admin)', 'adminkapcsolat'),
('1__', 'Export', 'adminexport'),
('1_1', 'Kilépés', 'logout');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenofal`
--

CREATE TABLE `uzenofal` (
  `Uzenet_Id` int(11) NOT NULL,
  `Felhasznalo_id` int(11) NOT NULL,
  `Uzenet` varchar(2000) NOT NULL,
  `Ido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenofal`
--

INSERT INTO `uzenofal` (`Uzenet_Id`, `Felhasznalo_id`, `Uzenet`, `Ido`) VALUES
(1, 11, 'Sziasztok!', '2024-11-19 00:15:12'),
(6, 11, 'asd', '2024-11-19 00:23:13'),
(7, 11, 'asd', '2024-11-19 00:23:16');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`Felhasznalo_id`);

--
-- A tábla indexei `jogok`
--
ALTER TABLE `jogok`
  ADD PRIMARY KEY (`Jog_id`);

--
-- A tábla indexei `kapcsolat`
--
ALTER TABLE `kapcsolat`
  ADD PRIMARY KEY (`Kapcsolat_Id`);

--
-- A tábla indexei `uzenofal`
--
ALTER TABLE `uzenofal`
  ADD PRIMARY KEY (`Uzenet_Id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `Felhasznalo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `jogok`
--
ALTER TABLE `jogok`
  MODIFY `Jog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `kapcsolat`
--
ALTER TABLE `kapcsolat`
  MODIFY `Kapcsolat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `uzenofal`
--
ALTER TABLE `uzenofal`
  MODIFY `Uzenet_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
