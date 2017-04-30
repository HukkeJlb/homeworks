-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2017 г., 02:29
-- Версия сервера: 5.5.53
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gamesmarket`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `created_at`, `updated_at`, `photo`) VALUES
(2, 'Mollitia ducimus et in ducimus commodi beatae.', 'Alias illo qui asperiores quidem. Delectus quidem neque error eligendi. Omnis eum veritatis id deleniti dignissimos. Vel consequatur odit asperiores veniam. Alias illo qui asperiores quidem. Delectus quidem neque error eligendi. Omnis eum veritatis id deleniti dignissimos. Vel consequatur odit asperiores veniam. Alias illo qui asperiores quidem. Delectus quidem neque error eligendi. Omnis eum veritatis id deleniti dignissimos. Vel consequatur odit asperiores veniam.Alias illo qui asperiores quidem. Delectus quidem neque error eligendi. Omnis eum veritatis id deleniti dignissimos. Vel consequatur odit asperiores veniam.', '2017-04-27 15:02:18', '2017-04-29 16:43:41', '2.jpg'),
(3, 'Molestias deserunt delectus iure adipisci adipisci eum.', 'Quia et omnis odit eos. Ad porro repellat voluptatem qui ad debitis odit. Et ad praesentium pariatur non vel dolorem non. Quia et omnis odit eos. Ad porro repellat voluptatem qui ad debitis odit. Et ad praesentium pariatur non vel dolorem non.Quia et omnis odit eos. Ad porro repellat voluptatem qui ad debitis odit. Et ad praesentium pariatur non vel dolorem non.Quia et omnis odit eos. Ad porro repellat voluptatem qui ad debitis odit. Et ad praesentium pariatur non vel dolorem non.Quia et omnis odit eos. Ad porro repellat voluptatem qui ad debitis odit. Et ad praesentium pariatur non vel dolorem non.', '2017-04-27 15:02:18', '2017-04-29 16:53:51', '3.jpg'),
(4, 'Sunt perferendis nesciunt vel voluptas.', 'Dolores hic quia voluptates autem. Odit dolores voluptates rerum voluptas quis labore expedita eligendi.Dolores hic quia voluptates autem. Odit dolores voluptates rerum voluptas quis labore expedita eligendi.Dolores hic quia voluptates autem. Odit dolores voluptates rerum voluptas quis labore expedita eligendi.Dolores hic quia voluptates autem. Odit dolores voluptates rerum voluptas quis labore expedita eligendi.Dolores hic quia voluptates autem. Odit dolores voluptates rerum voluptas quis labore expedita eligendi.', '2017-04-27 15:02:18', '2017-04-29 16:54:02', '4.jpg'),
(5, 'Minus odio est voluptate ut.', 'Incidunt tenetur sequi et beatae vero qui vero. Nemo occaecati nostrum earum totam rem. Assumenda dolor amet repellendus veritatis minima. Rem nulla quisquam et facilis sit. Incidunt tenetur sequi et beatae vero qui vero. Nemo occaecati nostrum earum totam rem. Assumenda dolor amet repellendus veritatis minima. Rem nulla quisquam et facilis sit.Incidunt tenetur sequi et beatae vero qui vero. Nemo occaecati nostrum earum totam rem. Assumenda dolor amet repellendus veritatis minima. Rem nulla quisquam et facilis sit.Incidunt tenetur sequi et beatae vero qui vero. Nemo occaecati nostrum earum totam rem. Assumenda dolor amet repellendus veritatis minima. Rem nulla quisquam et facilis sit.', '2017-04-27 15:02:18', '2017-04-29 16:54:12', '5.jpg'),
(10, 'Sony отгрузила 60 миллионов PlayStation 4', 'Компания Sony объявила о том, что отгрузки PlayStation 4 перевалили за отметку в 60 миллионов устройств.\r\n\r\nВ это число входят исключительно консоли, которые производитель поставил в магазины по всему миру с ноября 2013-го года по конец марта 2017-го, а не товар, проданный непосредственно конечному пользователю. А значит, за последний квартал минувшего финансового года (с января по март 2017-го года) Sony умудрилась поставить 2.9 миллиона PlayStation 4, что на 26 % больше, чем за тот же период предыдущего года (2.3 миллиона).', '2017-04-28 19:08:45', '2017-04-29 16:32:36', '5555.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Action', 'Facere aut distinctio amet id. Quam ad dignissimos numquam et blanditiis aut ex. Sed dolorem earum molestiae fuga. Reprehenderit nobis qui omnis rerum minus.'),
(2, 'RPG', 'Fugit et asperiores et dolorum molestias voluptatum. Dolorem sapiente quia et consequuntur iure iste. Ex at et tempore et et. Quibusdam id voluptatem cupiditate ut error et et.'),
(3, 'Квесты', 'Veritatis sed excepturi quos ad et harum. Et consectetur in animi totam ut. Et porro aut eum.'),
(4, 'Онлайн-игры', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque augue dui, tempor eget mi non, rutrum consectetur dolor. Vivamus ut fermentum arcu, ut finibus orci. Aliquam eu posuere velit. Nullam eget elit at tellus mollis elementum vitae a ex. Suspendisse potenti. Vivamus quam dui, fermentum sit amet quam id, porttitor imperdiet nibh. Vivamus ut sapien vel mauris pulvinar dapibus. Suspendisse erat turpis, aliquet vel cursus vel, tincidunt vitae nisi. Nulla a tellus a leo vestibulum euismod id aliquam nisl. Fusce vel tellus auctor, molestie ex sit amet, ornare diam. Curabitur dignissim lorem magna, vitae sodales neque rutrum non. Suspendisse pretium consectetur odio, tristique tempor nulla tempor ut.'),
(5, 'Стратегии', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque augue dui, tempor eget mi non, rutrum consectetur dolor. Vivamus ut fermentum arcu, ut finibus orci. Aliquam eu posuere velit. Nullam eget elit at tellus mollis elementum vitae a ex. Suspendisse potenti. Vivamus quam dui, fermentum sit amet quam id, porttitor imperdiet nibh. Vivamus ut sapien vel mauris pulvinar dapibus. Suspendisse erat turpis, aliquet vel cursus vel, tincidunt vitae nisi. Nulla a tellus a leo vestibulum euismod id aliquam nisl. Fusce vel tellus auctor, molestie ex sit amet, ornare diam. Curabitur dignissim lorem magna, vitae sodales neque rutrum non. Suspendisse pretium consectetur odio, tristique tempor nulla tempor ut.');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `price`, `description`, `photo`) VALUES
(1, 2, 'The Witcher 3: Wild Hunt', 500.00, 'Dolorem et voluptates aperiam. Possimus blanditiis incidunt sint mollitia aut qui ut. Qui qui qui fuga quo.', '1.jpg'),
(2, 4, 'Overwatch', 774.00, 'Voluptatem eius quia hic voluptas quos et qui. Architecto sunt ex sit aspernatur. Ducimus delectus debitis reprehenderit laudantium voluptas accusamus.', '2.jpg'),
(3, 1, 'Deus Ex: Mankind Divided', 800.00, 'Minima consequatur quaerat qui quibusdam iste aperiam modi. Eius amet dolorem quo et a. Consequatur sapiente ut nihil neque. Consequatur asperiores deserunt aut.', '3.jpg'),
(4, 4, 'World of WarCraft', 354.00, 'Tenetur voluptas dolorem voluptatem ut. Sint ipsa ea enim quasi non dolor. Fugiat quos qui ea aut veritatis velit eaque velit. Quasi explicabo odit dolore quis.', '4.jpg'),
(5, 1, 'Call of Duty: Black ops II', 184.00, 'Atque quas eaque quis totam eius excepturi odit. Ut consectetur minima necessitatibus qui eos enim excepturi porro. Itaque a aut voluptatem non ea culpa nesciunt. Rerum debitis velit dolore enim.', '5.jpg'),
(6, 3, 'Batman - Telltale Game Series', 628.00, 'Aspernatur vero nobis non. Et minima culpa quidem sed dolores ab. In odio molestiae velit.', '6.jpg'),
(7, 1, 'Rocket League', 371.00, 'Qui corporis dolores sit libero ab aliquam et. Eum nesciunt velit ut commodi ex id. Nisi omnis et eos eveniet corrupti.', '7.jpg'),
(8, 1, 'Dishonored 2', 189.00, 'Sunt et ut impedit ea et eius in. Sint distinctio dolorem quae voluptas laborum qui voluptas. Sint aut et eius fuga.', '8.jpg'),
(9, 5, 'This War of Mine', 704.00, 'Ullam quia voluptatem qui. Non odit unde deserunt consequatur numquam dicta ut. Architecto eligendi alias minima tempore ut ipsam quia. Illo sint libero illum impedit quam velit.', '9.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_27_153440_create_categories_table', 2),
(4, '2017_04_27_153632_create_goods_table', 2),
(5, '2017_04_27_161216_create_articles_table', 3),
(6, '2017_04_30_210117_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `good_id` smallint(5) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `good_id`, `price`, `user_id`, `user_name`, `created_at`, `updated_at`, `email`) VALUES
(14, 9, 704.00, 1, 'HukkeJlb', '2017-04-30 19:16:32', '2017-04-30 19:16:32', 'hukkejlb@gmail.com'),
(21, 9, 704.00, 1, 'HukkeJlb', '2017-04-30 19:43:16', '2017-04-30 19:43:16', 'hukkejlb@gmail.com'),
(22, 8, 189.00, 1, 'HukkeJlb', '2017-04-30 19:48:37', '2017-04-30 19:48:37', 'hukkejlb@gmail.com'),
(23, 9, 704.00, 1, 'HukkeJlb', '2017-04-30 19:52:47', '2017-04-30 19:52:47', 'hukkejlb@gmail.com'),
(24, 8, 189.00, 1, 'HukkeJlb', '2017-04-30 20:15:47', '2017-04-30 20:15:47', 'hukkejlb@gmail.com'),
(25, 7, 371.00, 3, 'Nikita', '2017-04-30 20:17:41', '2017-04-30 20:17:41', 'patr1k08@list.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('patr1k08@list.ru', '$2y$10$X2k8LVpgN9XyG24EIUI.rOnhYf4B9.Eptalq7gqFFvvt18L/pZo6u', '2017-04-28 07:34:48'),
('hukkejlb@gmail.com', '$2y$10$tujNzuw2qneLA96qvyCiWOGwxU4LjYXLONVx.JfLXzqgxFHK0TZJq', '2017-04-30 19:59:39');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HukkeJlb', 'hukkejlb@gmail.com', '$2y$10$CXtTnibPKafvIGjAzWRZg.HTobuUq/DyI.QLXWCUBHX34KO5A/Ywi', 1, 'f9C0q1jfftutKErNtpLG0lbWcKpge4Lyf8lljlQPNa7CsiZycHYrSRA9aq1U', '2017-04-27 03:22:19', '2017-04-27 03:22:19'),
(3, 'Nikita', 'patr1k08@list.ru', '$2y$10$BLWYVVPsD8Hv/8OdqKzbzOqsP3LyVW3w4MH9EAEQt/YZeprMEv/xO', 0, 'aseh49sFQc8rZjZaZKkS45UYUOMN0iEtZw8w0w5LcYXHiAePWcPxPT6OJCrI', '2017-04-27 03:35:42', '2017-04-27 03:35:42'),
(4, 'Loftschool', 'gamesgabenmarket@gmail.com', '$2y$10$kfYy6M6cgEytVQChIsiFtudGFIbnA1aV92BOTBxLrOl0jJckhxhlG', 1, 'QibAY59PBIzbA1MM03QLor0zu8PbYb8K7Mpr42fPboYa5jQ3R2Cbay8SiSRr', '2017-04-30 20:22:34', '2017-04-30 20:22:34'),
(5, 'Loftschool', 'loftschoolhomeworks@gmail.com', '$2y$10$6kilr7r4AysVilw1lPQpSub.tfnNQUBGrZLzREIvIRFmzbawQPiQ.', 0, '5ayt5O5VZQAJo1AkFQCy4dIPS6jvKtZ5BJt3gP6qUNVygIaUNiGGdyOjqTTi', '2017-04-30 20:26:28', '2017-04-30 20:26:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_category_id_foreign` (`category_id`);

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
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
