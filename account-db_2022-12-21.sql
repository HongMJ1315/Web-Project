-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2022-12-21 02:01:54
-- 伺服器版本： 8.0.30
-- PHP 版本： 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `account`
--

-- --------------------------------------------------------

--
-- 資料表結構 `around`
--

CREATE TABLE `around` (
  `round` int NOT NULL,
  `HP` int NOT NULL,
  `atk` tinyint(1) NOT NULL,
  `card1` int NOT NULL,
  `card2` int NOT NULL,
  `card3` int NOT NULL,
  `card4` int NOT NULL,
  `card5` int NOT NULL,
  `damage` int NOT NULL,
  `defense` int NOT NULL,
  `persist` int NOT NULL,
  `invincible` tinyint(1) NOT NULL,
  `lifesteal` int NOT NULL,
  `purify` tinyint(1) NOT NULL,
  `self_persist` int NOT NULL,
  `pass` tinyint(1) NOT NULL,
  `surrender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `bround`
--

CREATE TABLE `bround` (
  `round` int NOT NULL,
  `HP` int NOT NULL,
  `atk` tinyint(1) NOT NULL,
  `card1` int NOT NULL,
  `card2` int NOT NULL,
  `card3` int NOT NULL,
  `card4` int NOT NULL,
  `card5` int NOT NULL,
  `damage` int NOT NULL,
  `defense` int NOT NULL,
  `persist` int NOT NULL,
  `invincible` int NOT NULL,
  `lifesteal` int NOT NULL,
  `purify` int NOT NULL,
  `self_persist` int NOT NULL,
  `pass` int NOT NULL,
  `surrender` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `ID` int NOT NULL,
  `type` int NOT NULL,
  `DATA` int NOT NULL,
  `src` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `card`
--

INSERT INTO `card` (`ID`, `type`, `DATA`, `src`) VALUES
(1, 1, 6, '/card/atk/atk_0.png'),
(2, 1, 3, '/card/atk/atk_1.png'),
(3, 1, 3, '/card/atk/atk_2.png'),
(4, 1, 8, '/card/atk/atk_3.png'),
(5, 1, 2, '/card/atk/atk_4.png'),
(6, 1, 4, '/card/atk/atk_5.png'),
(7, 1, 12, '/card/atk/atk_6.png'),
(8, 1, 2, '/card/atk/atk_7.png'),
(9, 1, 7, '/card/atk/atk_8.png'),
(10, 1, 10, '/card/atk/atk_9.png'),
(11, 1, 12, '/card/atk/atk_10.png'),
(12, 1, 8, '/card/atk/atk_11.png'),
(13, 1, 6, '/card/atk/atk_12.png'),
(14, 1, 5, '/card/atk/atk_13.png'),
(15, 1, 8, '/card/atk/atk_14.png'),
(16, 2, 8, '/card/def/def_0.png'),
(17, 2, 2, '/card/def/def_1.png'),
(18, 2, 7, '/card/def/def_2.png'),
(19, 2, 10, '/card/def/def_3.png'),
(20, 2, 11, '/card/def/def_4.png'),
(21, 2, 6, '/card/def/def_5.png'),
(22, 2, 9, '/card/def/def_6.png'),
(23, 2, 8, '/card/def/def_7.png'),
(24, 2, 6, '/card/def/def_8.png'),
(25, 2, 3, '/card/def/def_9.png'),
(26, 2, 3, '/card/def/def_10.png'),
(27, 2, 2, '/card/def/def_11.png'),
(28, 2, 4, '/card/def/def_12.png'),
(29, 2, 8, '/card/def/def_13.png'),
(30, 2, 7, '/card/def/def_14.png'),
(31, 3, 1, '/card/eff/fire/eff_fire_0.png'),
(32, 3, 2, '/card/eff/fire/eff_fire_1.png'),
(33, 3, 2, '/card/eff/fire/eff_fire_2.png'),
(34, 4, 0, '/card/eff/invincible/eff_invincible_1.png'),
(35, 5, 0, '/card/eff/purify/eff_purify_1.png'),
(36, 3, 1, '/card/eff/bloodloss/eff_booldloss_1.png'),
(37, 3, 2, '/card/eff/bloodloss/eff_booldloss_2.png'),
(38, 3, 2, '/card/eff/bloodloss/eff_booldloss_3.png'),
(39, 6, 4, '/card/eff/lifesteal/eff_lifesteal_0.png'),
(40, 6, 6, '/card/eff/lifesteal/eff_lifesteal_1.png'),
(41, 6, 8, '/card/eff/lifesteal/eff_lifesteal_2.png'),
(42, 6, 4, '/card/eff/lifesteal/eff_lifesteal_3.png'),
(43, 6, 10, '/card/eff/lifesteal/eff_lifesteal_4.png'),
(44, 6, 6, '/card/eff/lifesteal/eff_lifesteal_5.png'),
(45, 3, 1, '/card/eff/poison/eff_poison_0.png'),
(46, 3, 2, '/card/eff/poison/eff_poison_1.png'),
(47, 5, 0, '/card/eff/purify/eff_purify_4.png'),
(48, 5, 0, '/card/eff/purify/eff_purify_3.png'),
(49, 3, 2, '/card/eff/poison/eff_poison_4.png');

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `username` char(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `login time` datetime DEFAULT NULL,
  `logout time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `login`
--

INSERT INTO `login` (`username`, `password`, `login time`, `logout time`) VALUES
('root', '8315', '2022-12-04 14:38:36', '2022-12-04 14:38:36'),
('GM1', 'gm1', NULL, NULL),
('GM2', 'gm2', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `play`
--

CREATE TABLE `play` (
  `player1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `player2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `play`
--

INSERT INTO `play` (`player1`, `player2`) VALUES
('', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
