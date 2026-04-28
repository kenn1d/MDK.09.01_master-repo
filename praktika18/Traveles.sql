-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2026 г., 18:09
-- Версия сервера: 5.7.19
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Traveles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Clients`
--

CREATE TABLE `Clients` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `passportRu` varchar(255) NOT NULL,
  `passportInt` varchar(255) NOT NULL,
  `telNumber` varchar(15) NOT NULL,
  `visa` varchar(255) NOT NULL,
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `Clients`
--

INSERT INTO `Clients` (`id`, `fullName`, `passportRu`, `passportInt`, `telNumber`, `visa`, `birthDate`) VALUES
(1, 'Шейн Боберт Альбертович', '1223258963', '1223258963', '78563698596', 'ABC345QWERTY', '2020-03-17'),
(3, 'Кибанов Макар Евгеньевич', '1235639563', '1235639563', '78963256363', 'QWERTY123', '2032-03-16'),
(6, 'Макар Кибанов', '21324', '324234', '324234', 'q', '2026-03-05');

-- --------------------------------------------------------

--
-- Структура таблицы `TravelPackages`
--

CREATE TABLE `TravelPackages` (
  `id` int(11) NOT NULL,
  `Client_id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `resort` varchar(255) NOT NULL,
  `hotel` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `TravelPackages`
--

INSERT INTO `TravelPackages` (`id`, `Client_id`, `country`, `resort`, `hotel`, `transport`) VALUES
(1, 1, 'США', 'New-York', 'Trump International Hotel & Tower', 'Cruise'),
(3, 3, 'Германия', 'Бавария', 'Межнациональный отель Баварии', 'Поезд');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `TravelPackages`
--
ALTER TABLE `TravelPackages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Client_id` (`Client_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Clients`
--
ALTER TABLE `Clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `TravelPackages`
--
ALTER TABLE `TravelPackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `TravelPackages`
--
ALTER TABLE `TravelPackages`
  ADD CONSTRAINT `travelpackages_ibfk_1` FOREIGN KEY (`Client_id`) REFERENCES `Clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
