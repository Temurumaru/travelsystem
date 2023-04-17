-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 17 2023 г., 17:58
-- Версия сервера: 10.11.2-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travelsystem`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `permission` varchar(40) NOT NULL,
  `supreme` tinyint(1) NOT NULL,
  `password` varchar(128) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `full_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `permission`, `supreme`, `password`, `description`, `remember`, `full_name`) VALUES
(1, 'admin', 'admin', 1, '7642a20e63cf8f4a7c3d54cde8549aa4ac0c055e2b20894e7c15f1ba85ddf930', 'Верховный Админ', 0, 'Дилмурод Абдухалилович'),
(2, 'said', 'admin', 0, '7642a20e63cf8f4a7c3d54cde8549aa4ac0c055e2b20894e7c15f1ba85ddf930', 'Said Saidov Главный менеджер по продажам', NULL, 'Said Saidov');

-- --------------------------------------------------------

--
-- Структура таблицы `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `permission` varchar(255) NOT NULL,
  `remember` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `agents`
--

INSERT INTO `agents` (`id`, `login`, `password`, `full_name`, `email`, `company`, `description`, `address`, `city`, `tel`, `telegram`, `avatar`, `permission`, `remember`) VALUES
(1, 'ernesto', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Ernasto Che Guevara', 'ernesto@lufthansa.com', 1, 'Cuba One Love', 'Cuba', NULL, '+998991254792', 'ernesto_che', '2023041717522092967726.jpg', 'agent', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `busy`
--

CREATE TABLE `busy` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `tour` int(11) NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `busy`
--

INSERT INTO `busy` (`id`, `company`, `tour`, `places`) VALUES
(1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `companys`
--

CREATE TABLE `companys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `companys`
--

INSERT INTO `companys` (`id`, `name`, `description`, `balance`) VALUES
(1, 'Lufthansa', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `company` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `places_limit` int(11) DEFAULT NULL,
  `transfer` tinyint(1) NOT NULL,
  `guide` tinyint(1) NOT NULL,
  `description` varchar(140) DEFAULT NULL,
  `start_leave_1` varchar(255) NOT NULL,
  `start_come_2` varchar(255) DEFAULT NULL,
  `start_leave_2` varchar(255) DEFAULT NULL,
  `start_come_3` varchar(255) DEFAULT NULL,
  `start_leave_3` varchar(255) DEFAULT NULL,
  `start_come_4` varchar(255) NOT NULL,
  `end_leave_1` varchar(255) NOT NULL,
  `end_come_2` varchar(255) DEFAULT NULL,
  `end_leave_2` varchar(255) DEFAULT NULL,
  `end_come_3` varchar(255) DEFAULT NULL,
  `end_leave_3` varchar(255) DEFAULT NULL,
  `end_come_4` varchar(255) NOT NULL,
  `city_name_1` varchar(255) NOT NULL,
  `city_days_1` varchar(255) NOT NULL,
  `city_nights_1` varchar(255) NOT NULL,
  `distance_city_1` varchar(255) NOT NULL,
  `city_eats_1` varchar(255) NOT NULL,
  `city_hotel_1` varchar(255) NOT NULL,
  `city_hotel_stars_1` varchar(255) NOT NULL,
  `city_name_2` varchar(255) DEFAULT NULL,
  `city_days_2` varchar(255) DEFAULT NULL,
  `city_nights_2` varchar(255) DEFAULT NULL,
  `distance_city_2` varchar(255) DEFAULT NULL,
  `city_eats_2` varchar(255) DEFAULT NULL,
  `city_hotel_2` varchar(255) DEFAULT NULL,
  `city_hotel_stars_2` varchar(255) DEFAULT NULL,
  `all_flys` int(11) NOT NULL,
  `all_flys_end` int(11) NOT NULL,
  `all_cityes` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ended_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `name`, `company`, `price`, `bonus`, `places`, `places_limit`, `transfer`, `guide`, `description`, `start_leave_1`, `start_come_2`, `start_leave_2`, `start_come_3`, `start_leave_3`, `start_come_4`, `end_leave_1`, `end_come_2`, `end_leave_2`, `end_come_3`, `end_leave_3`, `end_come_4`, `city_name_1`, `city_days_1`, `city_nights_1`, `distance_city_1`, `city_eats_1`, `city_hotel_1`, `city_hotel_stars_1`, `city_name_2`, `city_days_2`, `city_nights_2`, `distance_city_2`, `city_eats_2`, `city_hotel_2`, `city_hotel_stars_2`, `all_flys`, `all_flys_end`, `all_cityes`, `active`, `ended_date`) VALUES
(1, 'Erick Legros', 1, 4029, 300, 59, 4, 1, 0, 'Elbert Cartwright', '{\"date\":\"2023-01-27\",\"time\":\"04:38\",\"city\":\"Troy Stroman\"}', NULL, NULL, NULL, NULL, '{\"date\":\"2023-03-05\",\"time\":\"15:52\",\"city\":\"Karla Gorczany\"}', '{\"date\":\"2023-06-09\",\"time\":\"03:42\",\"city\":\"Wade Kassulke\"}', NULL, NULL, NULL, NULL, '{\"date\":\"2023-10-25\",\"time\":\"10:10\",\"city\":\"Carrie Witting\"}', 'Janie Lang IV', '26', '30', '339', '3', 'Della Welch', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `busy`
--
ALTER TABLE `busy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `busy`
--
ALTER TABLE `busy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `companys`
--
ALTER TABLE `companys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
