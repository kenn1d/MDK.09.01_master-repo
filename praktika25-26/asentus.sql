-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 24 2026 г., 18:27
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `asentus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `image`) VALUES
(1, 'img/clients/01.png'),
(2, 'img/clients/02.png'),
(3, 'img/clients/03.png'),
(4, 'img/clients/04.png'),
(5, 'img/clients/05.png'),
(6, 'img/clients/06.png');

-- --------------------------------------------------------

--
-- Структура таблицы `latestProducts`
--

CREATE TABLE `latestProducts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h4_a` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h4_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `latestProducts`
--

INSERT INTO `latestProducts` (`id`, `image`, `h4_a`, `h4_sp`, `text`) VALUES
(1, 'img/008.jpg', 'Triangle Doooog', 'Management', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor'),
(2, 'img/970x647/02.jpg', 'Curved Corners', 'Developmeny', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor'),
(3, 'img/970x647/03.jpg', 'Bird On Green', 'Design', 'Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor',
  `row` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `icon`, `header`, `text`, `row`) VALUES
(1, 'icon-chemistry', 'Drunk A Soda', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 1),
(2, 'icon-screen-tablet', 'Responsive Design', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 1),
(3, 'icon-badge', 'Feature Reach', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 1),
(4, 'icon-notebook', 'Useful Documentation', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 2),
(5, 'icon-speedometer', 'Fast Delivery', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 2),
(6, 'icon-badge', 'Free Plugins', 'Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `latestProducts`
--
ALTER TABLE `latestProducts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `latestProducts`
--
ALTER TABLE `latestProducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
