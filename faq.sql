-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 16 2018 г., 16:49
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
-- Структура таблицы `answers`
--
-- Создание: Май 13 2018 г., 16:10
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `id_question` int(11) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `name`, `id_question`, `hide`) VALUES
(1, '11', 1, 0),
(2, '22222', 2, 0),
(3, '3', 3, 0),
(4, '4444', 4, 0),
(5, '55555', 5, 0),
(6, '66666', 6, 0),
(7, '77777', 7, 0),
(8, '88888', 8, 0),
(9, '99999', 9, 0),
(10, '1010', 10, 0),
(11, '11112', 11, 0),
(12, '1212', 12, 0),
(13, '1313', 13, 0),
(14, '1414', 14, 0),
(15, '1516', 15, 0),
(16, '1616', 16, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--
-- Создание: Апр 22 2018 г., 16:01
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Общие вопросы'),
(2, 'Регистрация'),
(3, 'Рецепты'),
(4, 'Личные данные'),
(8, 'Категория новая'),
(9, 'Тест'),
(12, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--
-- Создание: Май 13 2018 г., 17:41
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `user` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `id_category` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(25) CHARACTER SET utf8 NOT NULL,
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `user`, `email`, `name`, `id_category`, `date`, `status`, `hide`) VALUES
(1, 'Василий', 'pupkinpupkinpupkin@mail.ru', 'Как работать с сайтом?', 1, '0000-00-00', 'Оубликован', 0),
(3, 'Иван', 'pupkinpupkinpupkin@mail.ru', 'Можно ли скачать все рецепты?', 1, '0000-00-00', 'Опубликован', 0),
(4, 'Пупкин', 'pupkinpupkinpupkin@mail.ru', 'На сайте есть модерация???', 1, '0000-00-00', 'Опубликован', 0),
(5, 'Петр Путкин', 'pupkinpupkinpupkin@mail.ru', 'Забыл логин', 2, '0000-00-00', 'Ожидает публикации', 1),
(6, 'Костя', 'pupkinpupkinpupkin@mail.ru', 'Забыл пароль', 2, '0000-00-00', 'Опубликован', 0),
(7, 'Олег', 'pupkinpupkinpupkin@mail.ru', 'Хочу удалить свой аккаунт', 2, '0000-00-00', 'Опубликован', 0),
(8, 'Ваня', 'pupkinpupkinpupkin@mail.ru', 'Хочу изменить видимость своего аккаунта', 2, '0000-00-00', 'Опубликован', 0),
(11, 'Путинин', 'pupkinpupkinpupkin@mail.ru', 'Как изменить свой рецепт', 3, '0000-00-00', 'Опубликован', 0),
(12, 'Пупкин', 'pupkinpupkinpupkin@mail.ru', 'Как скрыть рецепт из общего доступа', 3, '0000-00-00', 'Опубликован', 0),
(13, 'Валентин', 'pupkinpupkinpupkin@mail.ru', 'Как изменить никнейм', 4, '0000-00-00', 'Опубликован', 0),
(14, 'Ульяна', 'pupkinpupkinpupkin@mail.ru', 'Как изменить рецепт, если после добавления его на сайт?', 4, '2018-04-10', 'Опубликован', 0),
(15, 'Рома', 'pupkinpupkinpupkin@mail.ru', 'Как пользоваться кулинарной книгой', 4, '0000-00-00', 'Опубликован', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Апр 13 2018 г., 17:03
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(8, 'root', '63a9f0ea7bb98050796b649e85481845', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_questions`
--
-- Создание: Май 13 2018 г., 16:11
--

DROP TABLE IF EXISTS `users_questions`;
CREATE TABLE `users_questions` (
  `id` int(11) NOT NULL,
  `user` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `categoryID` text CHARACTER SET utf8 NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users_questions`
--

INSERT INTO `users_questions` (`id`, `user`, `email`, `categoryID`, `question`, `date`, `status`, `answer`, `hide`) VALUES
(19, 'Олег Петрович', 'oleggggg@mail.ru', '3', 'кепитьблщгпмвв', '2018-04-10', 'Ожидает публикации', '', 1),
(20, 'pupkin', 'pupkinpupkinpupkin@mail.ru', '2', 'Вопрос', '2018-04-19', 'Оубликован', 'ответ', 0),
(21, 'Елена', 'fil@yandex.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', 'ответ', 1),
(22, 'Елена', 'fil@yandex.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', '', 1),
(23, 'pupkin', 'pupkinpupkinpupkin@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', '', 1),
(24, 'Елена', 'fil@yandex.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-19', 'Ожидает публикации', '', 1),
(25, 'pupkin', 'pupkinpupkinpupkin@mail.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(26, 'Олег pup', 'olegggggpup@mail.ru', '2', 'oleggpupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(27, 'Олег pup', 'olegggggpup@mail.ru', '2', 'oleggpupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(28, 'Елена', 'maryika93@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(29, 'Елена', 'maryika93@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(30, 'папа', 'maryika93@mail.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(31, 'папа', 'maryika93@mail.ru', '4', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(32, 'Василий', 'maryika93@mail.ru', '8', 'Вопрос', '2018-04-22', 'Оубликован', '', 0),
(33, 'Елена', 'maryika93@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(34, 'Елена', 'maryika93@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1),
(35, 'Елена', 'maryika93@mail.ru', '2', 'pupkinpupkinpupkinpupkinpupkin', '2018-04-22', 'Ожидает публикации', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_questions`
--
ALTER TABLE `users_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users_questions`
--
ALTER TABLE `users_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
