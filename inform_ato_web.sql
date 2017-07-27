-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 27 2017 г., 17:41
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `inform_ato_web`
--

-- --------------------------------------------------------

--
-- Структура таблицы `informs`
--

CREATE TABLE IF NOT EXISTS `informs` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `inform` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `informs`
--

INSERT INTO `informs` (`id`, `name`, `inform`) VALUES
(1, 'rrr', 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr'),
(2, 'qqq', 'qqq'),
(3, 'qqq', 'qqq'),
(4, 'qqq', 'qqq'),
(5, 'qqq', 'qqq'),
(6, 'qqq', 'qqq'),
(7, 'qqq', 'qqq'),
(8, 'ttt', 'tttttttttttttttttt'),
(9, 'oooo', 'oooooooooooooooooooooooooooooo'),
(10, 'oooo', 'oooooooooooooooooooooooooooooo');

-- --------------------------------------------------------

--
-- Структура таблицы `informs_users`
--

CREATE TABLE IF NOT EXISTS `informs_users` (
  `id` int(11) NOT NULL,
  `inform_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `readinform` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `informs_users`
--

INSERT INTO `informs_users` (`id`, `inform_id`, `user_id`, `readinform`) VALUES
(1, 7, 1, 1),
(2, 2, 2, 1),
(3, 2, 1, 1),
(4, 8, 1, NULL),
(5, 9, 4, NULL),
(6, 10, 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin_is` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `admin_is`) VALUES
(1, 'vasya', 'v@i.ua', '$2y$12$dI0S3SWb6r3YBT8uVGzM2OGluNB1lYCJ5.NDNdeaqA4SisuUAff56', NULL),
(2, 'petya', 'p@i.ua', '$2y$12$j8HNP7FCJVCQ6Ry2y9Suw.RMLv9e3l1IOEcjlJmpn6obXPKY0ShMO', 1),
(3, 'kolya', 'k@i.ua', '$2y$12$cXz3XX6R2jMJJ.yjdZtoNe7ZoXPTTNWrpPK6vIJmNBk0cmmTv2jhG', NULL),
(4, 'lada', 'l@i.ua', '$2y$12$rTMqmwcZw7YRMMyDX1Zc1OlA9nQikDln01kfbbo.GRzsVTAe2VLZC', NULL),
(5, 'alex', 'a@dfd', '$2y$12$lnAy3XEx1x6QysOuHaPHsO.5ROzSwIlsG7611rH0gJGV5OkNV2HIu', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `informs`
--
ALTER TABLE `informs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `informs_users`
--
ALTER TABLE `informs_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inform_id` (`inform_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `informs`
--
ALTER TABLE `informs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `informs_users`
--
ALTER TABLE `informs_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
