-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 17 2017 г., 02:19
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `doska`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `ads_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID объявления',
  `ads_name` varchar(255) NOT NULL,
  `ads_desk` text NOT NULL,
  `ads_price` int(11) NOT NULL,
  `ads_status` int(11) NOT NULL,
  `ads_parent_user_id` int(11) NOT NULL,
  `ads_create_date` int(11) NOT NULL,
  PRIMARY KEY (`ads_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_name`, `ads_desk`, `ads_price`, `ads_status`, `ads_parent_user_id`, `ads_create_date`) VALUES
(19, 'Активное', '123123', 123123, 1, 1, 1508095709),
(20, 'Неактив', 'Неактив', 11, 0, 1, 1508095753),
(21, 'Неактив', 'test', 123, 0, 7, 1508095811),
(22, 'Активное', 'Активное', 1, 1, 9, 1508099789),
(23, 'Неактив', 'Неактив', 111, 0, 9, 1508100283),
(24, 'АКТИВ 16', '16', 16, 1, 9, 1508102236),
(25, '123123', '123123', 123, 1, 10, 1508109206);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1507874692),
('m171013_060955_create_user_table', 1507875327);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userrealname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `logindate_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `userrealname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `status`, `created_at`, `logindate_at`, `updated_at`) VALUES
(1, 'admin', '', 'xdtObYYEqznlQ6bc4pj5NMnqABRCg7In', '$2y$13$mHlaYMp3YwF1lNgoWijCcO3FXwSZw6U6DlmJGRGP14AnY1AOx/50C', NULL, 'admin@sed.ru', '', 20, 1507875907, 1508184994, 1508184994),
(6, 'gad', '', 'GYpYjdCHoJPKHZzCEHbXVz8htI-pwgAb', '$2y$13$dT9d.o8spRXNv99GsBO2tOrOSN/vfQkCb9z2YfXKEsHR.BGcIe97G', NULL, 'ursnab-chel@yandex.ru', '89518101095', 10, 1508095693, 1508095693, 1508095693),
(7, 'test', '', '1IR_KtGPG23TxOxFQurkxQOe_BTOBNIt', '$2y$13$VkJZGm5rMFPuScof2sC5xepwuFEBIwaRPHS3Cpk/5yGYvqbJU1F4e', NULL, 'gad@gad.gad', '123123', 10, 1508095793, 1508099321, 1508099321),
(9, 'map', '', 'u4Sh6DOwY4g_qbO9KVYY8rww9wbcpiXH', '$2y$13$BC621NKIHx8GxPi0/lW0xeKk11L3k5LZuKSx72BaKf/MgLjXqITUy', NULL, 'test@test.map', '1231233', 10, 1508099771, 1508101917, 1508101917),
(10, 'moder', '', '3ePstFqYmML4G2CC7sN284qyDqR1tEKn', '$2y$13$JBdaY8LZ7AOdYRBw38NJhuuKpI4GASgSGbf7zTUUrgCJ3/dci1BqW', NULL, 'moder@moder.moder', '213123', 20, 1508102649, 1508109196, 1508109196),
(13, 'nomoder', '', 'UlORmfv3MV4yYwks7CR91f4A8Y0e-NwJ', '$2y$13$7hGI3zdR7jE1dxR1I6IMCe5/U3V2ZnJvywm8y6Yod07n4kE6wH6s2', NULL, 'nomoder@nomoder.nomoder', '12312321', 10, 1508103335, 1508103334, 1508103335),
(14, 'tip', '', 'J0D0yKdagfOEFJJO97IFLEAKxTemeVJ2', '$2y$13$rfM.R3.kxzdaug1lUuH.ru6wNEVWLrz/60Gew4seLoywfLTtodLOC', NULL, 'tip@tip.tip', '123', 10, 1508103388, 1508108219, 1508108219),
(15, 'ggg', '', 'bZa3NMsMc9X6OylNenU0OqYm-WY01jF0', '$2y$13$W3FCr4fflUCkJ7K3ZyDDzO.emoPezbKn0Z7VAuaBBrur8oq3Eo1cK', NULL, 'ggg@ggg.ggg', '123123123', 10, 1508103897, 1508103896, 1508103897);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
