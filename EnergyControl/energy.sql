-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2017 г., 01:31
-- Версия сервера: 5.7.16-log
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `energy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `paycheck`
--

CREATE TABLE `paycheck` (
  `month` varchar(15) NOT NULL,
  `water` decimal(10,0) NOT NULL,
  `energy` decimal(10,0) NOT NULL,
  `heat` decimal(10,0) NOT NULL,
  `gas` decimal(10,0) NOT NULL,
  `service` decimal(10,0) NOT NULL,
  `extra` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `paycheck`
--

INSERT INTO `paycheck` (`month`, `water`, `energy`, `heat`, `gas`, `service`, `extra`) VALUES
('Февраль', '145', '354', '156', '321', '456', '444'),
('Февраль', '145', '354', '156', '321', '456', '444');

