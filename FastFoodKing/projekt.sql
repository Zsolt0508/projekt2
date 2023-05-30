-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 29. 10:54
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `projekt`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `etelek`
--

CREATE TABLE `etelek` (
  `etelid` int(11) NOT NULL,
  `hamburger` varchar(45) NOT NULL,
  `pizza` varchar(45) NOT NULL,
  `szendvics` varchar(45) NOT NULL,
  `deszert` varchar(45) NOT NULL,
  `salata` varchar(45) NOT NULL,
  `ital` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `etelek`
--

INSERT INTO `etelek` (`etelid`, `hamburger`, `pizza`, `szendvics`, `deszert`, `salata`, `ital`) VALUES
(1, 'Royal Burger', 'Magyaros', 'Vegyes', 'Classic', 'Uborka', 'Gyömbér'),
(2, 'Hamburg-er', 'Hawaii', 'Sajtos', 'Gyümölcsfa', 'Paprika', '7up'),
(3, 'Csípős burger', 'Négy sajtos', 'Vegán', 'Kókusz sziget', 'Kukorica', 'Sprite'),
(4, 'Dupla burger', 'Dallas aranya', 'Kolbászos', 'Ghost', 'Cézár', 'Ásványvíz'),
(5, 'Csirkeburger', 'Hús imádó', 'Szalámis', 'Sheriff', 'Káposzta', 'Fanta'),
(6, 'Sajtburger', 'Songoku', 'Sonkás', 'Pite', 'Krumpli', 'Cola');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `idkosar` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `etelek_etelid` int(11) NOT NULL,
  `hamburger` int(11) NOT NULL,
  `pizza` int(11) NOT NULL,
  `szendvics` int(11) NOT NULL,
  `deszert` int(11) NOT NULL,
  `salata` int(11) NOT NULL,
  `ital` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kosar`
--

INSERT INTO `kosar` (`idkosar`, `mennyiseg`, `etelek_etelid`, `hamburger`, `pizza`, `szendvics`, `deszert`, `salata`, `ital`, `user_id`) VALUES
(25, 0, 0, 4, 0, 0, 4, 0, 0, 0),
(26, 0, 0, 0, 2, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `regisztracio`
--

CREATE TABLE `regisztracio` (
  `regid` int(11) NOT NULL,
  `felnev` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `varos` varchar(45) NOT NULL,
  `irszam` int(11) NOT NULL,
  `utca` varchar(45) NOT NULL,
  `hazszam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `regisztracio`
--

INSERT INTO `regisztracio` (`regid`, `felnev`, `email`, `jelszo`, `varos`, `irszam`, `utca`, `hazszam`) VALUES
(2, 'Heged', 'valami@gmailo.com', '$2y$10$1gZyAx3BjFchyY1p3nrIOuwEt.3kCwdY8xqJscu1Tp6LQyNNAcZ0m', 'Pécs', 7632, 'Etelka', 6);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `etelek`
--
ALTER TABLE `etelek`
  ADD PRIMARY KEY (`etelid`);

--
-- A tábla indexei `kosar`
--
ALTER TABLE `kosar`
  ADD PRIMARY KEY (`idkosar`),
  ADD KEY `fk_kosar_etelek1_idx` (`etelek_etelid`);

--
-- A tábla indexei `regisztracio`
--
ALTER TABLE `regisztracio`
  ADD PRIMARY KEY (`regid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `etelek`
--
ALTER TABLE `etelek`
  MODIFY `etelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `kosar`
--
ALTER TABLE `kosar`
  MODIFY `idkosar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `regisztracio`
--
ALTER TABLE `regisztracio`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
