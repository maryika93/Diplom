-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 19 2018 г., 20:31
-- Версия сервера: 5.6.16-1~exp1
-- Версия PHP: 5.6.34-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mtipikina`
--
CREATE DATABASE IF NOT EXISTS `mtipikina` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mtipikina`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Общие вопросы'),
(2, 'Регистрация'),
(3, 'Рецепты'),
(4, 'Личные данные'),
(8, 'Категория новая'),
(9, 'Тест');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` text CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8,
  `hide` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `id_category`, `name`, `email`, `question`, `date`, `status`, `answer`, `hide`) VALUES
(19, '3', 'Олег Петрович', 'oleggggg@mail.ru', 'кепитьблщгпмвв', '2018-04-10', 'Ожидает публикации', 'NULL', 1),
(20, '2', 'pupkin', 'pupkinpupkinpupkin@mail.ru', 'Вопрос', '2018-04-19', 'Оубликован', 'ответ', 0),
(21, '4', 'Елена', 'fil@yandex.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', 'ответ', 1),
(22, '4', 'Елена', 'fil@yandex.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', 'NULL', 1),
(23, '2', 'pupkin', 'pupkinpupkinpupkin@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', 'NULL', 1),
(24, '4', 'Елена', 'fil@yandex.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', 'NULL', 1),
(25, '4', 'pupkin', 'pupkinpupkinpupkin@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(26, '2', 'Олег pup', 'olegggggpup@mail.ru', 'oleggpupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(27, '2', 'Олег pup', 'olegggggpup@mail.ru', 'oleggpupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(28, '2', 'Елена', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(29, '2', 'Елена', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(30, '4', 'папа', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(31, '4', 'папа', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(32, '8', 'Василий', 'maryika93@mail.ru', 'Вопрос', '2018-04-22', 'Оубликован', 'NULL', 0),
(33, '2', 'Елена', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(34, '2', 'Елена', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(35, '2', 'Елена', 'maryika93@mail.ru', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', 'NULL', 1),
(38, '9', 'Олег Олегович', 'oleggggg@mail.ru', 'вопрос вопрос', '2018-05-18', 'Ожидает публикации', 'NULL', 1),
(39, '1', 'Вера', 'maryika93@mail.ru', 'Вопрос', '2018-05-18', 'Оубликован', 'ответ', 0),
(43, '9', 'Елена', 'fil@yandex.ru', '190518', '2018-05-19', 'Ожидает публикации', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(8, 'root', '63a9f0ea7bb98050796b649e85481845', 0),
(21, 'mtipikina', 'd6fb8761b734350c8bbe0bda17f85f3d', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
