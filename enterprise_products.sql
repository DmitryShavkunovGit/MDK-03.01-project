-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 05 2020 г., 17:48
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `enterprise_products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `name` varchar(60) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`name`, `description`) VALUES
('Для примера', ''),
('Канцелярские Товары', NULL),
('Продукты продовольствия', NULL),
('Самые крутые товары', 'Самые_крутые_товары'),
('Средства гигиены', NULL),
('Строительные материалы', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `login` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `organization` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `telephone` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `predstavitel` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `adres_dostavki` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `role` varchar(20) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `login`, `password`, `organization`, `telephone`, `predstavitel`, `email`, `adres_dostavki`, `role`) VALUES
(1, '1', '$2y$10$ULi5jsJHWD5Gw6Yt3G2mWugWjfrv6HoOzsNn/ZiaEDZCmwnJNO8Na', 'Admin', 'Admin', 'Admin', 'Admin', 'Admin', 'admin'),
(4, 'loginDa', '$2y$10$mby4WtzGYYfnuS9OH8rMXeqmATPb3.NqSYnZhE.H4LXP5ZibTtGBi', '\"Капитал Прожиточного Минимума\"', '89991234567', 'Михаил Павлович', 'example@email.com', 'ул,Пушкина,36а', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `login` varchar(90) NOT NULL,
  `password` varchar(15) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `patronymic` varchar(60) NOT NULL,
  `id_position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `login`, `password`, `name`, `surname`, `patronymic`, `id_position`) VALUES
(1, 'Vasya', '12345', 'Василий ', 'Тягочай', 'Андреевич ', 2),
(2, 'test', 'test', 'Андрей', 'Андреев', 'Андреевич ', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_position`
--

CREATE TABLE `employee_position` (
  `id_position` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `employee_position`
--

INSERT INTO `employee_position` (`id_position`, `name`) VALUES
(1, 'god'),
(2, 'Приемщик товара'),
(3, 'Водитель');

-- --------------------------------------------------------

--
-- Структура таблицы `in stock`
--

CREATE TABLE `in stock` (
  `id_product` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `amount` int(11) NOT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `categori` varchar(30) NOT NULL,
  `shelf life` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `in stock`
--

INSERT INTO `in stock` (`id_product`, `name`, `amount`, `unit`, `categori`, `shelf life`, `description`) VALUES
(128, 'Ножницы ', 80, 'Штук', 'Продукты продовольствия', '2020-05-22', 'хорошие'),
(129, 'Ножницы ', 100, 'Штук', 'Канцелярские Товары', NULL, ''),
(130, 'Для примера', 230, 'Килограмм', 'Для примера', NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `ShippingAddress` varchar(191) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `amount` int(11) NOT NULL,
  `id_employee` int(11) NOT NULL DEFAULT 2,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id_order`, `id_customer`, `ShippingAddress`, `id_product`, `product_name`, `amount`, `id_employee`, `status`) VALUES
(2, 4, 'ул,Пушкина,36а', 128, 'Ножницы ', 1, 2, NULL),
(9, 4, 'ул,Пушкина,36а', 130, 'Для примера', 5, 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`name`) VALUES
('В обработке '),
('Доставлено'),
('Отправлено');

-- --------------------------------------------------------

--
-- Структура таблицы `unit`
--

CREATE TABLE `unit` (
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `unit`
--

INSERT INTO `unit` (`name`) VALUES
('Килограмм'),
('Литры '),
('Миллилитры'),
('Штук');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`name`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adres_dostavki` (`adres_dostavki`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`),
  ADD KEY `password` (`password`),
  ADD KEY `id_position` (`id_position`);

--
-- Индексы таблицы `employee_position`
--
ALTER TABLE `employee_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `in stock`
--
ALTER TABLE `in stock`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `amount` (`amount`),
  ADD KEY `date of receipt` (`shelf life`),
  ADD KEY `name` (`name`),
  ADD KEY `unit` (`unit`),
  ADD KEY `categori` (`categori`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `ShippingAddress` (`ShippingAddress`),
  ADD KEY `status` (`status`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `unit`
--
ALTER TABLE `unit`
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employee_position`
--
ALTER TABLE `employee_position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `in stock`
--
ALTER TABLE `in stock`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `employee_position` (`id_position`);

--
-- Ограничения внешнего ключа таблицы `in stock`
--
ALTER TABLE `in stock`
  ADD CONSTRAINT `in stock_ibfk_2` FOREIGN KEY (`unit`) REFERENCES `unit` (`name`),
  ADD CONSTRAINT `in stock_ibfk_3` FOREIGN KEY (`categori`) REFERENCES `categories` (`name`);

--
-- Ограничения внешнего ключа таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `in stock` (`id_product`),
  ADD CONSTRAINT `product_order_ibfk_4` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `product_order_ibfk_5` FOREIGN KEY (`product_name`) REFERENCES `in stock` (`name`),
  ADD CONSTRAINT `product_order_ibfk_6` FOREIGN KEY (`status`) REFERENCES `status` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
