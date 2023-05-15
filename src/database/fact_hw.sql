-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2023 г., 18:01
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fact_hw`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES
(11, 'John', 'john@example.com', '202cb962ac59075b964b07152d234b70'),
(17, 'Bob', 'bob@example.com', '76d80224611fc919a5d54f0ff9fba446'),
(18, 'Bill', 'bill@example.com', '202cb962ac59075b964b07152d234b70'),
(19, 'Maria', 'maria@example.com', '289dff07669d7a23de0ef88d2f7129e7'),
(20, 'Victor', 'vic@example.com', 'd81f9c1be2e08964bf9f24b15f0e4900'),
(21, 'Mike', 'mike@example.com', '289dff07669d7a23de0ef88d2f7129e7'),
(22, 'Jack', 'jack@example.com', 'd81f9c1be2e08964bf9f24b15f0e4900'),
(23, 'Maria', '23132@asdasd.com', '202cb962ac59075b964b07152d234b70'),
(24, 'Maria', 'knyazev@rif-mmr.ru', '289dff07669d7a23de0ef88d2f7129e7'),
(25, 'Lena', 'elena@example.com', '123'),
(26, 'Polina', 'polina@exmple.com', 'd81f9c1be2e08964bf9f24b15f0e4900'),
(27, 'Anna', 'anna@example.com', '202cb962ac59075b964b07152d234b70'),
(28, 'Michael', 'michael@example.com', '289dff07669d7a23de0ef88d2f7129e7');

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
