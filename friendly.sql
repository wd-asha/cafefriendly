-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2023 г., 20:43
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `friendly`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `slug`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dish', 'Dish', '2023-10-27 00:31:20', '2023-10-27 04:09:33', NULL),
(2, 'caviar', 'Caviar', '2023-10-27 00:31:51', '2023-10-27 04:10:23', NULL),
(3, 'sauce', 'Sauce', '2023-10-27 00:32:18', '2023-10-27 04:10:28', NULL),
(4, 'drink', 'Drink', '2023-10-27 00:32:47', '2023-10-27 04:13:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_26_174052_create_roles_table', 1),
(6, '2023_10_26_191106_create_categories_table', 1),
(7, '2023_10_26_191547_create_products_table', 1),
(8, '2023_10_27_144410_add_filds_to_users_table', 2),
(9, '2023_10_28_182700_create_order_items_table', 3),
(10, '2023_10_28_182710_create_orders_table', 3),
(11, '2023_10_29_070050_create_wishlists_table', 4),
(12, '2023_10_29_181346_create_subscribers_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `order_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `slug`, `user_id`, `user_name`, `order_delivery`, `order_email`, `order_phone`, `order_status`, `order_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, NULL, 3, 'Mixail', 'Челябинская обл., Аша, Ленина 48-60', 'szn-asha@bk.ru', '89043000734', 3, '59,00', '2023-10-29 14:41:47', '2023-11-01 06:53:27', NULL),
(5, NULL, 3, 'Mixail', 'Челябинская обл., Аша, Ленина 48-60', 'szn-asha@bk.ru', '89043000734', 2, '1 198,00', '2023-10-29 15:05:35', '2023-11-01 06:53:46', NULL),
(6, NULL, 3, 'Mixail', 'Челябинская обл., Аша, Ленина 48-60', 'szn-asha@bk.ru', '89043000734', 1, '559,00', '2023-10-30 05:42:26', '2023-11-01 06:54:00', NULL),
(7, NULL, 3, 'Mixail', 'Челябинская обл., Аша, Ленина 48-60', 'szn-asha@bk.ru', '89043000734', 0, '599,00', '2023-10-30 05:46:01', '2023-10-30 05:46:01', NULL),
(8, NULL, 3, 'Mixail', 'Челябинская обл., Аша, Ленина 48-60', 'szn-asha@bk.ru', '89043000734', 0, '599,00', '2023-10-30 05:59:31', '2023-10-30 05:59:31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `slug`, `product_id`, `product_title`, `product_code`, `product_image`, `product_weight`, `product_qty`, `product_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 4, NULL, '21', 'Freez Яблоко Виноград', 'ЯВ', 'media/product/1780914406600070.png', '330', '1', '59', '2023-10-29 14:41:47', '2023-10-29 14:41:47', NULL),
(5, 5, NULL, '3', 'Британский', 'Б', 'media/product/1780901477581132.png', '500', '2', '599', '2023-10-29 15:05:35', '2023-10-29 15:05:35', NULL),
(6, 6, NULL, '1', 'Ливанский', 'L', 'media/product/1780901308879939.png', '500', '1', '559', '2023-10-30 05:42:26', '2023-10-30 05:42:26', NULL),
(7, 7, NULL, '4', 'Индийский', 'И', 'media/product/1780901575468823.png', '500', '1', '599', '2023-10-30 05:46:01', '2023-10-30 05:46:01', NULL),
(8, 8, NULL, '4', 'Индийский', 'И', 'media/product/1780901575468823.png', '500', '1', '599', '2023-10-30 05:59:31', '2023-10-30 05:59:31', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `product_weight` int DEFAULT NULL,
  `product_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/product/empty-image.png',
  `product_status` int NOT NULL DEFAULT '0',
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  `product_home` int NOT NULL DEFAULT '0',
  `product_amount` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product_slug`, `product_title`, `category_id`, `product_weight`, `product_about`, `product_image`, `product_status`, `product_code`, `product_price`, `product_home`, `product_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Салат Ливанский', 1, 500, '<p>Картофель фри, фалафель, хумус из свеклы, мятный йогуртовый соус, перец чили, кунжут<br></p>', 'media/product/1780901308879939.png', 1, 'L', 559, 0, 10, '2023-10-27 04:43:58', '2023-11-01 07:17:33', NULL),
(2, NULL, 'Слат Африканский', 1, 500, '<p>Свежий картофель фри, кусочки курицы, соус маффе, аллоко, арахис<br></p>', 'media/product/1780901423688287.png', 1, 'А', 599, 0, 7, '2023-10-27 04:45:47', '2023-11-01 07:17:20', NULL),
(3, NULL, 'Салат Британский', 1, 500, '<p>Свежий картофель фри, филе трески, пюре из горошка, соус тартар<br></p>', 'media/product/1780901477581132.png', 1, 'Б', 599, 0, 3, '2023-10-27 04:46:39', '2023-11-01 07:03:50', NULL),
(4, NULL, 'Салат Индийский', 1, 500, '<p>Свежий картофель фри, куриный шашлык тандури, сливочный куриный соус, майонез карри, орехи кешью<br></p>', 'media/product/1780901575468823.png', 1, 'И', 599, 0, 5, '2023-10-27 04:48:12', '2023-11-01 07:17:53', NULL),
(5, NULL, 'Салат Восточный', 1, 500, '<p>Свежий картофель фри, куриный шашлык, салат мехуйя, домашний соус чили<br></p>', 'media/product/1780901635988722.png', 1, 'В', 599, 0, 1, '2023-10-27 04:49:10', '2023-11-01 07:18:11', NULL),
(6, NULL, 'Салат Мексиканский', 1, 500, '<p>Свежий картофель фри, перец чили кон карне, гуакамоле, чеддер и халапеньо<br></p>', 'media/product/1780901698518826.png', 1, 'М', 599, 0, 1, '2023-10-27 04:50:09', '2023-11-01 07:27:01', NULL),
(7, NULL, 'Салат Буррата', 1, 500, '<p>Руккола, зеленое масло, салат месклун, кедровые орехи, вяленые помидоры<br></p>', 'media/product/1780901907427970.png', 1, 'Б', 599, 0, 1, '2023-10-27 04:53:29', '2023-11-01 07:02:56', NULL),
(8, NULL, 'Икра Мутабал', 2, 200, '<p>Свекольная<br></p>', 'media/product/1780914451866759.png', 1, 'М', 199, 0, 1, '2023-10-27 04:55:31', '2023-11-01 07:24:58', NULL),
(9, NULL, 'Икра Гуакамоле', 2, 200, '<p>Авокадо<br></p>', 'media/product/1780914432139178.png', 1, 'Г', 199, 0, 1, '2023-10-27 05:17:29', '2023-11-01 07:24:42', NULL),
(10, NULL, 'Икра Прянная', 2, 200, '<p>Харисса<br></p>', 'media/product/1780904065360926.png', 1, 'П', 199, 0, 1, '2023-10-27 05:27:47', '2023-11-01 07:24:22', NULL),
(11, NULL, 'Икра Цацики', 2, 200, '<p>Огурец, чеснок, йогурт, мята<br></p>', 'media/product/1780904179309361.png', 1, 'Ц', 199, 0, 1, '2023-10-27 05:29:35', '2023-11-01 07:23:55', NULL),
(12, NULL, 'Икра Баба Гануж', 2, 200, '<p>Баклажанная<br></p>', 'media/product/1780904826349507.png', 1, 'Б', 199, 0, 2, '2023-10-27 05:39:52', '2023-11-01 07:19:12', NULL),
(13, NULL, 'Соус Карри', 3, 200, '<p>Майонез<br></p>', 'media/product/1780904937847308.png', 1, 'К', 99, 0, 1, '2023-10-27 05:41:39', '2023-11-01 07:26:37', NULL),
(14, NULL, 'Соус Трюфельный', 3, 200, '<p>Майонез<br></p>', 'media/product/1780904996245905.png', 1, 'Т', 99, 0, 1, '2023-10-27 05:42:34', '2023-11-01 07:26:18', NULL),
(15, NULL, 'Соус Майо Харисса', 3, 200, '<p>Соус<br></p>', 'media/product/1780905045316785.png', 1, 'М', 99, 0, 1, '2023-10-27 05:43:21', '2023-11-01 07:23:14', NULL),
(16, NULL, 'Соус Сырный Чаддер', 3, 200, '<p>Соус<br></p>', 'media/product/1780905092965011.png', 1, 'Ч', 99, 0, 1, '2023-10-27 05:44:07', '2023-11-01 07:22:54', NULL),
(17, NULL, 'Соус Тартар', 3, 200, '<p>Майонез, соленые огурцы, каперсы, лук, лимон<br></p>', 'media/product/1780905144073572.png', 1, 'Т', 99, 0, 1, '2023-10-27 05:44:55', '2023-11-01 07:22:17', NULL),
(18, NULL, 'Соус Традиционный', 3, 200, '<p>Майонез<br></p>', 'media/product/1780905193830805.png', 1, 'Т', 99, 0, 1, '2023-10-27 05:45:43', '2023-11-01 07:21:51', NULL),
(19, NULL, 'Соус Зеленый', 3, 200, '<p>Соус<br></p>', 'media/product/1780905232758853.png', 1, 'З', 99, 0, 1, '2023-10-27 05:46:20', '2023-11-01 07:21:34', NULL),
(20, NULL, 'Кока-кола', 4, 330, NULL, 'media/product/1780905301064581.png', 1, 'К', 59, 0, 5, '2023-10-27 05:47:25', '2023-10-27 08:16:31', NULL),
(21, NULL, 'Freez Яблоко Виноград', 4, 330, '<p>Утешает тех, кто делает ставку на безопасные и безрисковые ценности<br></p>', 'media/product/1780914406600070.png', 1, 'ЯВ', 59, 0, 5, '2023-10-27 05:48:19', '2023-11-01 01:08:07', NULL),
(22, NULL, 'Freez Манго Персик', 4, 330, '<p>Все то, что даже в середине лета сохраняет прохладу<br></p>', 'media/product/1780914593509076.png', 1, 'МП', 59, 0, 1, '2023-10-27 08:15:07', '2023-10-27 08:15:07', NULL),
(23, NULL, 'Freez Личи', 4, 330, '<p>Для тех, кто любит, когда от них приятно пахнет<br></p>', 'media/product/1780914666087825.png', 1, 'Л', 59, 0, 10, '2023-10-27 08:16:16', '2023-11-01 01:07:36', NULL),
(24, NULL, 'Freez Ананас Коко', 4, 330, NULL, 'media/product/1780914744833935.png', 1, 'АК', 59, 0, 2, '2023-10-27 08:17:31', '2023-10-31 15:32:03', NULL),
(25, NULL, 'Freez Гренадин', 4, 330, '<p>Для тех, кто ищет ароматы своего детства<br></p>', 'media/product/1780914802334600.png', 1, 'Г', 59, 0, 4, '2023-10-27 08:18:26', '2023-11-01 01:26:47', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL),
(2, 'User', 'user', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shipping_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `shipping_user`, `apartment_user`, `phone_user`) VALUES
(1, 'Admin', 1, 'admin@gmail.com', NULL, '$2y$10$8LvK5akCJJkM32foAySQaeTcb0H56GbfAWZeGrvjoufSq4D46RC/u', 'XkmQKq8URhKsN2XKY7T4w0m23psIcEeCGaFguPNKk1vwloN5GdhnlDwwNe9p', '2023-10-27 05:14:24', NULL, NULL, NULL, NULL, NULL),
(2, 'User', 2, 'user@gmail.com', NULL, '$2y$10$I0wO1RkKgZKG4hrpHIjbhu8gO3t7qcRTJLwlD1HDa9/r4wi18nQLC', NULL, '2023-10-27 05:14:34', '2023-11-01 12:26:35', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3', '1', '2023-10-29 02:25:15', '2023-10-29 02:25:15', NULL),
(2, '3', '2', '2023-10-29 02:27:50', '2023-10-29 02:27:50', NULL),
(3, '1', '3', '2023-10-29 09:14:39', '2023-10-29 09:14:39', NULL),
(4, '1', '4', '2023-10-29 09:14:46', '2023-10-29 09:14:46', NULL),
(5, '3', '20', '2023-10-30 05:07:26', '2023-10-30 05:07:26', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
