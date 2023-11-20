-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 09:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-11-17 22:51:20', '2023-11-17 22:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fruit', '2023-11-12 01:12:48', '2023-11-12 01:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ali hasan', 'ali@gmail.com', '01521312655', 'Mohammadpur', '1700104037.webp', 1, '2023-11-15 21:07:17', '2023-11-15 21:07:17'),
(2, 'Al amin', 'a@gmail.com', '01759896666', 'Mohammadpur', '1700466872.jpg', 1, '2023-11-20 01:54:32', '2023-11-20 01:54:32'),
(3, 'Miraj', 'miraj@gmail.com', '017326556664', 'keranigonj', '1700466943.webp', 1, '2023-11-20 01:55:43', '2023-11-20 01:55:43'),
(4, 'Tanvir', 'tanvir@gmail.com', '078265969658', 'Miraj', '1700467071.jpg', 1, '2023-11-20 01:57:51', '2023-11-20 01:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(67, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(69, '2019_08_19_000000_create_failed_jobs_table', 1),
(70, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(71, '2023_11_01_124650_create_suppliers_table', 1),
(72, '2023_11_01_125232_create_customers_table', 1),
(73, '2023_11_01_125308_create_units_table', 1),
(74, '2023_11_01_125502_create_catagories_table', 1),
(75, '2023_11_01_125520_create_products_table', 1),
(76, '2023_11_09_182406_create_purchases_table', 1),
(77, '2023_11_09_183431_create_purchase_products_table', 1),
(78, '2023_11_10_173142_create_carts_table', 1),
(79, '2023_11_13_111031_create_sells_table', 2),
(80, '2023_11_14_043555_create_sells_carts_table', 2),
(81, '2023_11_15_061221_create_order_products_table', 2),
(82, '2023_11_15_062310_create_order_cusomers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_cusomers`
--

CREATE TABLE `order_cusomers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_cusomers`
--

INSERT INTO `order_cusomers` (`id`, `order_product_id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, NULL, 1, NULL, '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(9, NULL, 1, NULL, '2023-11-18 21:38:01', '2023-11-18 21:38:01'),
(10, NULL, 1, NULL, '2023-11-18 21:59:59', '2023-11-18 21:59:59'),
(11, NULL, 1, NULL, '2023-11-18 22:46:34', '2023-11-18 22:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `order_customer_table_id` int(11) NOT NULL,
  `purchase_p_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `invoice`, `product_id`, `order_customer_table_id`, `purchase_p_id`, `cart_id`, `quantity`, `total_price`, `sub_total`, `paid_amount`, `discount`, `date`, `created_at`, `updated_at`) VALUES
(1, '9aabc12f-c554-4646-a302-a790ef716272', 1, 8, 20, 1, 3, '60.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(2, '9aabc12f-c554-4646-a302-a790ef716272', 3, 8, 32, 3, 1, '33.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(3, '9aabc12f-c554-4646-a302-a790ef716272', 3, 8, 32, 6, 1, '33.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(4, '9aabc12f-c554-4646-a302-a790ef716272', 3, 8, 32, 10, 1, '33.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(5, '9aabc12f-c554-4646-a302-a790ef716272', 3, 8, 32, 15, 1, '33.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(6, '9aabc12f-c554-4646-a302-a790ef716272', 3, 8, 32, 20, 3, '99.00', '0.00', '200.00', '0.00', '2023-11-18', '2023-11-17 23:49:25', '2023-11-17 23:49:25'),
(7, '4c6738ed-74dd-4e4a-b81e-fcff82caec89', 3, 9, 32, 1, 1, '33.00', '0.00', '30.00', '0.00', '2023-11-19', '2023-11-18 21:38:02', '2023-11-18 21:38:02'),
(8, 'f51076e2-cbee-466b-9f70-24175a07b977', 3, 10, 32, 1, 1, '33.00', '0.00', '33.00', '0.00', '2023-11-19', '2023-11-18 21:59:59', '2023-11-18 21:59:59'),
(9, '68356dae-4e6f-40eb-af2e-8be7f6e5c418', 3, 11, 32, 1, 1, '33.00', '0.00', '33.00', '0.00', '2023-11-19', '2023-11-18 22:46:34', '2023-11-18 22:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `catagory`, `unit`, `image`, `status`, `sku`, `created_at`, `updated_at`) VALUES
(1, 'Banana', 'this is most froutfull', 'Fruit', 'Pcs', '1699773211.webp', 1, 'D400', '2023-11-12 01:13:31', '2023-11-12 01:13:31'),
(2, 'Guava', 'this is most froutfull', 'Fruit', 'Pcs', '1699773521.jpg', 1, 'D401', '2023-11-12 01:18:41', '2023-11-12 01:18:41'),
(3, 'apple', 'this is most froutfull and delicious', 'Fruit', 'KG', '1700105318.jpg', 1, 'D401', '2023-11-15 21:28:38', '2023-11-15 21:28:38'),
(4, 'Mango', 'mango is an edible stone fruit produced by the tropical tree Mangifera indica', 'Fruit', 'KG', '1700467204.jpg', 1, 'D488', '2023-11-20 02:00:04', '2023-11-20 02:00:04'),
(5, 'Strawberry', 'strawberry is a widely grown hybrid species of the genus Fragaria', 'Fruit', 'KG', '1700467265.jpg', 1, 'D3938', '2023-11-20 02:01:05', '2023-11-20 02:01:05'),
(6, 'Grape', 'Banana  Grape Grape image of Grape t3.gstatic.com A grape is a fruit, botanically a berry,', 'Fruit', 'KG', '1700467351.jpg', 1, 'D600', '2023-11-20 02:02:31', '2023-11-20 02:02:31'),
(7, 'Kiwifruit', 'Kiwifruit Potassium is an essential nutrient that helps with muscle', 'Fruit', 'KG', '1700467414.jpg', 1, 'D3938', '2023-11-20 02:03:34', '2023-11-20 02:03:34'),
(8, 'Watermelon', 'Watermelon is a flowering plant species of the Cucurbitaceae', 'Fruit', 'KG', '1700467464.jpg', 1, 'D678', '2023-11-20 02:04:24', '2023-11-20 02:04:24'),
(9, 'Pineapple', 'Avocado  Pineapple Pineapple image of Pineapple  is a tropical plant with an edible fruit', 'Fruit', 'KG', '1700467544.jpg', 1, 'D3938', '2023-11-20 02:05:44', '2023-11-20 02:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `suppliers_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `suppliers_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2023-11-16 01:36:59', '2023-11-16 01:36:59'),
(2, NULL, 1, '2023-11-16 01:40:22', '2023-11-16 01:40:22'),
(3, NULL, 1, '2023-11-16 01:41:08', '2023-11-16 01:41:08'),
(4, NULL, 1, '2023-11-16 01:42:27', '2023-11-16 01:42:27'),
(5, NULL, 1, '2023-11-16 01:44:18', '2023-11-16 01:44:18'),
(6, NULL, 1, '2023-11-16 01:45:06', '2023-11-16 01:45:06'),
(7, NULL, 1, '2023-11-17 21:57:13', '2023-11-17 21:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `purchases_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `buy_price` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL DEFAULT '0.00',
  `dis_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `paid_price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_products`
--

INSERT INTO `purchase_products` (`id`, `purchase_code`, `purchases_id`, `product_id`, `buy_price`, `sell_price`, `quantity`, `total_price`, `dis_price`, `paid_price`, `date`, `month`, `year`, `status`, `created_at`, `updated_at`) VALUES
(32, '3d163f3f-9275-40bd-8cbc-173f6de6e5d8', NULL, 3, '33', '33', '33', '0.00', '0.00', '0.00', '2023-11-16', NULL, NULL, '1', '2023-11-16 01:42:27', '2023-11-16 01:42:27'),
(33, 'b003842d-2657-4c85-a3d6-6431ff3a069b', NULL, 3, '33', '33', '33', '0.00', '0.00', '0.00', '2023-11-16', NULL, NULL, '1', '2023-11-16 01:45:08', '2023-11-16 01:45:08'),
(34, 'ca514203-51a4-46a0-9427-1c32b87eed27', 7, 1, '10', '50', '100', '0.00', '0.00', '0.00', '2023-11-18', '11', '2023', '1', '2023-11-17 21:57:13', '2023-11-17 21:57:13'),
(35, 'ca514203-51a4-46a0-9427-1c32b87eed27', 7, 2, '25', '50', '100', '0.00', '0.00', '0.00', '2023-11-18', '11', '2023', '1', '2023-11-17 21:57:13', '2023-11-17 21:57:13'),
(36, 'ca514203-51a4-46a0-9427-1c32b87eed27', 7, 3, '30', '50', '1010', '0.00', '0.00', '0.00', '2023-11-18', '11', '2023', '1', '2023-11-17 21:57:13', '2023-11-17 21:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sells_carts`
--

CREATE TABLE `sells_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `purchase_p_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jahid safiullah', 'jahid@gmail.com', '0125555', 'dhaka', '1699773155.webp', 1, '2023-11-12 01:12:35', '2023-11-12 01:12:35'),
(2, 'birsty', 'b@gmli.com', '01255554456', 'gandari', '1699773970.jpeg', 1, '2023-11-12 01:26:10', '2023-11-12 01:26:10'),
(3, 'Rakib Hasan', 'r@gmail.com', '01255554456', 'Mirpur', '1700466732.jpg', 1, '2023-11-20 01:52:12', '2023-11-20 01:52:12'),
(4, 'Miskat hossain', 'm@gmail.com', '0175545666', 'Mirpur', '1700466805.jpg', 1, '2023-11-20 01:53:25', '2023-11-20 01:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KG', '2023-11-12 01:10:58', '2023-11-12 01:10:58'),
(2, 'Pcs', '2023-11-12 01:11:03', '2023-11-12 01:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','vendor','customer') NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_product_id_created_at_unique` (`product_id`,`created_at`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cusomers`
--
ALTER TABLE `order_cusomers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells_carts`
--
ALTER TABLE `sells_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `order_cusomers`
--
ALTER TABLE `order_cusomers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sells_carts`
--
ALTER TABLE `sells_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
