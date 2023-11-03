-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 03:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Italian', 'italian', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(2, 'Chinese', 'chinese', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(3, 'Mexican', 'mexican', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(4, 'Indian', 'indian', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(5, 'Japanese', 'japanese', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(6, 'American', 'american', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(7, 'Thai', 'thai', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(8, 'French', 'french', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(9, 'Greek', 'greek', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(10, 'Malaysian', 'malaysian', '2023-10-23 10:47:47', '2023-10-23 12:43:10', '2023-10-23 12:43:10'),
(11, 'Korean', 'korean', '2023-10-24 05:25:16', '2023-10-24 11:55:16', '0000-00-00 00:00:00'),
(12, 'Indonesian', 'indonesian', '2023-10-24 05:29:57', '2023-10-24 11:59:57', '0000-00-00 00:00:00'),
(13, 'Spanish', 'spanish', '2023-10-24 05:36:46', '2023-10-24 12:06:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `order_extra` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_no`, `order_extra`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '653fbe44ada64', '{\"id\":\"ch_3O6wUyEBeZfFRhur060p4NZ8\",\"object\":\"charge\",\"amount\":5000,\"amount_captured\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3O6wUyEBeZfFRhur0XmEB3BH\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":\"1234\",\"state\":null},\"email\":null,\"name\":\"waiferkolar@gmail.com\",\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1698676284,\"currency\":\"usd\",\"customer\":\"cus_Oum3o815JQomYd\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":60,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1O6wUuEBeZfFRhurpJbEWdhm\",\"payment_method_details\":{\"card\":{\"amount_authorized\":5000,\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":\"pass\",\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":10,\"exp_year\":2023,\"extended_authorization\":{\"status\":\"disabled\"},\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"incremental_authorization\":{\"status\":\"unavailable\"},\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"multicapture\":{\"status\":\"unavailable\"},\"network\":\"visa\",\"network_token\":{\"used\":false},\"overcapture\":{\"maximum_amount_capturable\":5000,\"status\":\"unavailable\"},\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xTzZvVldFQmVaZkZSaHVyKL38_qkGMga18Dr53vg6LBaqmjZoUnRomayYyEnHbXIDwTnvdWm-DN5UEqdf6pwlNVt8U3ndG6pnn-BH\",\"refunded\":false,\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1O6wUuEBeZfFRhurpJbEWdhm\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":\"1234\",\"address_zip_check\":\"pass\",\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_Oum3o815JQomYd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2023,\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"waiferkolar@gmail.com\",\"tokenization_method\":null,\"wallet\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(2, 1, '653fc2d931614', '{\"id\":\"ch_3O6wnzEBeZfFRhur1tMMOlSp\",\"object\":\"charge\",\"amount\":5000,\"amount_captured\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3O6wnzEBeZfFRhur1V8RzEil\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":\"123\",\"state\":null},\"email\":null,\"name\":\"waiferkolar@gmail.com\",\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1698677463,\"currency\":\"usd\",\"customer\":\"cus_OumMYyUIVxUO0F\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":28,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1O6wnvEBeZfFRhurnLhVXGvr\",\"payment_method_details\":{\"card\":{\"amount_authorized\":5000,\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":\"pass\",\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":10,\"exp_year\":2023,\"extended_authorization\":{\"status\":\"disabled\"},\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"incremental_authorization\":{\"status\":\"unavailable\"},\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"multicapture\":{\"status\":\"unavailable\"},\"network\":\"visa\",\"network_token\":{\"used\":false},\"overcapture\":{\"maximum_amount_capturable\":5000,\"status\":\"unavailable\"},\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xTzZvVldFQmVaZkZSaHVyKNiF_6kGMgY6lPqGFIM6LBZkD6A6E2yVUGuWeMp61MB9sVwN4j3m0ScAYBZ0QKKyP8R7a27kgziOX31-\",\"refunded\":false,\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1O6wnvEBeZfFRhurnLhVXGvr\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":\"123\",\"address_zip_check\":\"pass\",\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_OumMYyUIVxUO0F\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2023,\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"waiferkolar@gmail.com\",\"tokenization_method\":null,\"wallet\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(3, 1, '65421f30abe27', '{\"id\":\"ch_3O7b3LEBeZfFRhur0xtzq8Bm\",\"object\":\"charge\",\"amount\":5000,\"amount_captured\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3O7b3LEBeZfFRhur0nE9DZpE\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":\"123\",\"state\":null},\"email\":null,\"name\":\"waiferkolar@gmail.com\",\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1698832175,\"currency\":\"usd\",\"customer\":\"cus_OvRxkbkISnT3ip\",\"description\":null,\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":12,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1O7b3FEBeZfFRhurCHQ6fIrh\",\"payment_method_details\":{\"card\":{\"amount_authorized\":5000,\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":\"pass\",\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":11,\"exp_year\":2023,\"extended_authorization\":{\"status\":\"disabled\"},\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"incremental_authorization\":{\"status\":\"unavailable\"},\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"multicapture\":{\"status\":\"unavailable\"},\"network\":\"visa\",\"network_token\":{\"used\":false},\"overcapture\":{\"maximum_amount_capturable\":5000,\"status\":\"unavailable\"},\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xTzZvVldFQmVaZkZSaHVyKK--iKoGMgY09XQ9RbM6LBaVNIOlNRxIU99WOcjiNOmiyxCorfNoOIsXQUS1vsPz4mBd2DnUD5v-WAt5\",\"refunded\":false,\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1O7b3FEBeZfFRhurCHQ6fIrh\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":\"123\",\"address_zip_check\":\"pass\",\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_OvRxkbkISnT3ip\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":11,\"exp_year\":2023,\"fingerprint\":\"4QgfTCCMBxXr6d3O\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"waiferkolar@gmail.com\",\"tokenization_method\":null,\"wallet\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}', '2023-11-01 04:19:36', '2023-11-01 04:19:36', '2023-11-01 09:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `unit_price` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` float NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `unit_price`, `status`, `quantity`, `total`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 8.13, 'succeeded', 1, 8.13, '653fbe44ada64', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(2, 1, 3, 7.5, 'succeeded', 1, 7.5, '653fbe44ada64', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(3, 1, 17, 7.13, 'succeeded', 1, 7.13, '653fbe44ada64', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(4, 1, 7, 5.2, 'succeeded', 1, 5.2, '653fbe44ada64', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(5, 1, 1, 8.13, 'succeeded', 1, 8.13, '653fc2d931614', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(6, 1, 3, 7.5, 'succeeded', 1, 7.5, '653fc2d931614', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(7, 1, 17, 7.13, 'succeeded', 1, 7.13, '653fc2d931614', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(8, 1, 7, 5.2, 'succeeded', 1, 5.2, '653fc2d931614', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(9, 1, 1, 8.13, 'succeeded', 1, 8.13, '65421f30abe27', '2023-11-01 04:19:36', '2023-11-01 04:19:36', '2023-11-01 09:49:36'),
(10, 1, 3, 7.5, 'succeeded', 1, 7.5, '65421f30abe27', '2023-11-01 04:19:36', '2023-11-01 04:19:36', '2023-11-01 09:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `status`, `order_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 27.96, 'succeeded', '653fbe44ada64', '2023-10-30 09:01:32', '2023-10-30 09:01:32', '2023-10-30 14:31:32'),
(2, 1, 27.96, 'succeeded', '653fc2d931614', '2023-10-30 09:21:05', '2023-10-30 09:21:05', '2023-10-30 14:51:05'),
(3, 1, 15.63, 'succeeded', '65421f30abe27', '2023-11-01 04:19:36', '2023-11-01 04:19:36', '2023-11-01 09:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `featured` int(2) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `cat_id`, `sub_cat_id`, `featured`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nigiri', 8.13, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php3495-37b2a61bf444cb8a1e794bcaf0eb0945.jpg', 'Nigiri is a type of sushi consisting of a small ball of rice topped with wasabi sauce and raw fish or other seafood.', '2023-10-23 22:06:53', '2023-10-23 22:06:53', '2023-10-24 02:36:53'),
(3, 'Uramaki', 7.5, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpb5c7-5a7a24522dd20688aad08b2c7a8fe796.jpg', 'Uramaki sushi is a type of sushi that is wrapped in seaweed, with rice on the outside. It is often called inside-out sushi, because the rice is on the outside and the seaweed is on the inside.', '2023-10-23 22:54:45', '2023-10-24 11:31:21', '2023-10-24 03:24:45'),
(4, 'Somen', 8.4, 5, 2, 2, 'http://localhost/E-Commerce/public/assets/uploads/php6376-c0cb79589488e5a01992819a2165b9d1.jpg', 'Another form of wheat noodles, sōmen is perfect for a hot summer’s day. Made from stretched dough, so they’re very thin, these noodles have a light texture and are almost always served cold with a tsuyu dipping sauce.', '2023-10-23 23:15:54', '2023-10-23 23:15:54', '2023-10-24 03:45:54'),
(5, 'Sushi Roll', 7.6, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpe2e9-a8033897e00109f5478749de1e911cc7.jpg', 'Sushi rolls, or \'makizushi\' in Japanese, are what most non-Japanese people think of when they think of sushi. Makizushi is made by wrapping up fillings in rice and nori seaweed.', '2023-10-23 23:19:43', '2023-10-23 23:19:43', '2023-10-24 03:49:43'),
(6, 'Temaki', 10.7, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php8517-ac1902ab0d616e07b7a719dbdb132337.jpg', 'Temaki is sushi in the hand roll form, otherwise known as hand roll sushi. Typically they are made from vinegared rice and sashimi (raw fish), veggies, or other fillings enclosed in a nori (seaweed) cone.', '2023-10-23 23:23:42', '2023-10-23 23:23:42', '2023-10-24 03:53:42'),
(7, 'Soba (そば)', 5.2, 5, 2, 2, 'http://localhost/E-Commerce/public/assets/uploads/php2807-ac8cbd7202530683466ac059136e19bb.jpg', 'Soba (そば) noodles are noodles made of buckwheat flour, roughly as thick as spaghetti, and prepared in various hot and cold dishes.', '2023-10-23 23:26:34', '2023-10-23 23:26:34', '2023-10-24 03:56:34'),
(8, 'Harusame', 6.8, 5, 2, 2, 'http://localhost/E-Commerce/public/assets/uploads/phpe6d4-9f2073a055f8ac0b097d083a7e6550b0.jpg', 'Often called glass noodles thanks to their transparent appearance, harusame refers to thin noodles typically made from mung bean flour or potato starch (meaning they’re also gluten-free). ', '2023-10-23 23:27:23', '2023-10-23 23:27:23', '2023-10-24 03:57:23'),
(9, 'Udon (うどん)', 5.3, 5, 2, 2, 'http://localhost/E-Commerce/public/assets/uploads/phpb964-566499a5723ad4e7b953fb68ec70b95d.jpg', 'Japanese udon noodles are the thickest type of Japanese noodles, with a wonderfully chewy texture and characteristic pale white color. They’re made from wheat flour, and can be cut in a flat or rounded shape.', '2023-10-23 23:29:23', '2023-10-23 23:29:23', '2023-10-24 03:59:23'),
(10, 'Hiyamugi', 4.7, 5, 2, 2, 'http://localhost/E-Commerce/public/assets/uploads/php767b-cdd03e894e811cea6f150d9cfd3974a3.jpg', 'These more uncommon Japanese noodles are created from wheat flour and lie almost exactly between sōmen and udon in terms of thickness.', '2023-10-23 23:30:11', '2023-10-23 23:30:11', '2023-10-24 04:00:11'),
(11, 'St. Louis Style of Pizza', 10.2, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpa658-814c864158351be5e9e5f63a20e2c7ce.jpg', 'St. Louis Pizza is one of the favorite pizza flavors for people looking for a light slice. This Pizza dough is made without yeast and has a thin crust with a cracker-like consistency. St. Louis Pizza is usually cut into three or four-inch rectangles known as a tavern or party cut due to the crispy crust.\r\n', '2023-10-23 23:47:52', '2023-10-23 23:47:52', '2023-10-24 04:17:52'),
(12, 'Greek Pizza', 9.5, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php80ea-99887cf44e3cfa3973b1c00a1f5e61de.jpg', ' As the name suggests, the Pizza created by Greek immigrants who came to America, introduced to Italian Pizza, is popularly known as Greek Pizza.', '2023-10-23 23:48:48', '2023-10-23 23:48:48', '2023-10-24 04:18:48'),
(13, 'Salmon Sashimi', 8.15, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php7ef4-c64a31ca74a6b7f30189fd0c798de2b7.jpg', 'Sashimi is a Japanese dish of thinly-sliced raw food, usually fish and seafood, but also sometimes other meats.', '2023-10-24 11:46:24', '2023-10-24 11:46:24', '2023-10-24 16:16:24'),
(14, 'California Pizza', 10.2, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php646a-e8aa610d1d953f385c0441789f7ce593.jpg', 'The unusual combination of ingredients makes the California Pizza unique and is also called gourmet Pizza. The California-style Pizza is typically served as a slice rather than as a whole Pizza. ', '2023-10-24 11:49:34', '2023-10-24 11:49:34', '2023-10-24 16:19:34'),
(15, 'Detroit Style Pizza', 8.5, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php6df7-bda94ae9b00aaf95d8bbc4bc694b293a.jpg', 'Detroit-style Pizza was initially baked in a square automotive parts pan in the 1940s, reflecting the city’s deep ties to the auto industry. This type of Pizza has a caramelized cheese perimeter because it is spread with brick cheese after topping it with pepperoni first. Similar to Chicago-style Pizza, the sauce is then spooned over the Pizza. The Detroit-style Pizza is tender and airy on the inside while having a thick and extra crispy crust. Because it is pan-fried, the base of this Pizza is crunchier.', '2023-10-24 11:51:48', '2023-10-24 11:51:48', '2023-10-24 16:21:48'),
(16, 'Sicilian Pizza', 7.12, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php60c4-35816826e7bee6a8b701769e56f49a1c.jpg', 'Sicilian Pizza has a pillowy dough and provides a thick cut of Pizza, robust tomato sauce, and a crunchy crust. Unlike traditional Pizzas, a Sicilian Pizza is rectangular and is also called “sfincione.”', '2023-10-24 11:52:50', '2023-10-24 11:52:50', '2023-10-24 16:22:50'),
(17, 'Salmon Roll', 7.13, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php60f-f1046c57338eee1b76768bf7478e6a5a.jpg', 'Sushi rolls, or \'makizushi\' in Japanese, are what most non-Japanese people think of when they think of sushi. Makizushi is made by wrapping up fillings in rice and nori seaweed.', '2023-10-24 11:56:49', '2023-10-24 11:56:49', '2023-10-24 16:26:49'),
(18, 'Squid Sashimi', 8.15, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpdd74-b11fed7051196bd1b18c3e3f71ca0db2.jpg', 'Sashimi is a Japanese dish of thinly-sliced raw food, usually fish and seafood, but also sometimes other meats.', '2023-10-24 11:57:44', '2023-10-24 11:57:44', '2023-10-24 16:27:44'),
(19, 'Red Snapper Sashimi', 7.23, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php6293-c0d8521b8992eda85964a50ba43a2011.jpg', 'Sashimi is a Japanese dish of thinly-sliced raw food, usually fish and seafood, but also sometimes other meats.', '2023-10-24 11:58:18', '2023-10-24 11:58:18', '2023-10-24 16:28:18'),
(20, 'Tuna Sashimi', 5.17, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/php600f-19a901e3e226550a360062aadd212d0d.jpg', 'Sashimi is a Japanese dish of thinly-sliced raw food, usually fish and seafood, but also sometimes other meats.', '2023-10-24 11:59:23', '2023-10-24 11:59:23', '2023-10-24 16:29:23'),
(21, 'Chirashizushi', 5.37, 5, 1, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpfb75-70133865528b01884c05b47e9c73f1ae.jpg', 'Chirashi sushi, also called chirashizushi, is seasoned sushi rice topped with ingredients such as raw fish, omelets, and nori. ', '2023-10-24 12:00:03', '2023-10-24 12:00:03', '2023-10-24 16:30:03'),
(22, 'Neapolitan Pizza', 10.1, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php234d-23cd62dfc49942ddd94255daa56fb6dc.jpg', 'One of the original Pizza types is the Neapolitan Pizza which originated in Naples, Italy, back in the 18th century. In the seaside city, poorer citizens frequently purchased food that could be gobbled and was cheap during this time.', '2023-10-24 12:01:18', '2023-10-24 12:01:18', '2023-10-24 16:31:18'),
(23, 'New-York Style Pizza', 12.1, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php18f8-b656936566f5bdd38ec5beb42616245f.jpg', 'NewYork style Pizza is one of the famous regional American pizza types whose characteristic feature is the large, foldable slices and a crispy outer crust. Many feel that the flavor of the NewYork style Pizza comes from the town’s water supply.', '2023-10-24 12:02:21', '2023-10-24 12:02:21', '2023-10-24 16:32:21'),
(24, 'Chicago Pizza', 12.1, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpd5d1-17a22de887b16144e154aa6192aae3aa.jpg', 'Also called deep-dish Pizza, this kind of Pizza gets its name from the city it was invented in, hence the name “Chicago Pizza.” Italian immigrants were searching for a Pizza that was familiar to Neapolitan Pizza during the early 1900s.', '2023-10-24 12:03:10', '2023-10-24 12:03:10', '2023-10-24 16:33:10'),
(25, 'Calzone', 15.7, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/php8bbc-5e8c6db62f3d7d760359a8d3b0295d99.jpg', 'Calzone might not technically be considered a Pizza, but it might count. It is essentially a Pizza that is folded before baked if you are unfamiliar with a calzone. It is a traditional Italian dish that was created in the 18th Century in Naples.\r\n', '2023-10-24 12:09:24', '2023-10-24 12:09:24', '2023-10-24 16:39:24'),
(26, 'Pepperoni', 14.5, 1, 3, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpa6cd-56898f18dfe0ff9139646df6c672b0b6.jpg', 'Pepperoni is a variety of spicy salami made from cured pork and beef seasoned with paprika or other chili pepper. Prior to cooking, pepperoni is characteristically soft, slightly smoky, and bright red.', '2023-10-24 12:11:42', '2023-10-24 12:11:42', '2023-10-24 16:41:42'),
(27, 'Kung Pao Chicken', 3.14, 2, 4, 1, 'http://localhost/E-Commerce/public/assets/uploads/php93ba-303c99041465c01ea29334ab08eb6a41.jpg', 'This classic dish originated from Sichuan cuisine (south-western China) and is a meal that is often first associated with typical Chinese food and cuisine. With stir-fried chicken, peanuts, vegetables, and chili peppers, this dish is sure to satisfy in its perfected simplicity.', '2023-10-29 05:16:50', '2023-10-29 05:16:50', '2023-10-29 10:46:50'),
(28, 'Peking Roast Duck', 5.12, 2, 4, 1, 'http://localhost/E-Commerce/public/assets/uploads/php74b2-3ca8f69551bdef5e30dce5c97022dc5e.jpg', 'Created for the Ming Dynasty, Peking roast duck has since become a common delicacy enjoyed in Beijing, China. Seasoned before being oven-roasted, Peking duck is often served right out of the oven with its signature crisp and golden-brazed skin still intact. Served with the duck, bringing the dish together, is sides of spring onion, cucumber, and sweet bean sauce.\r\n', '2023-10-29 05:18:53', '2023-10-29 05:18:53', '2023-10-29 10:48:53'),
(29, 'Mapo Tofu', 2.13, 2, 4, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpac6e-686db1bae0c11845e8bb9ee2f1e8a6f7.jpg', 'Mapo Tofu is the real deal when it comes to spicy and spice lovers alike, establishing itself as one of the most popular dishes in China. The tofu itself is set in hot and spicy sauce before being simmered with bean paste, beef, hot roasted chili oil, and a handful of the infamous tongue-numbing Sichuan peppercorns. If you believe spicy food is king, don’t pass up on any chance to try this peppery delight.', '2023-10-29 05:22:24', '2023-10-29 05:22:24', '2023-10-29 10:52:24'),
(30, 'Chow Mein', 4.15, 2, 4, 1, 'http://localhost/E-Commerce/public/assets/uploads/php759b-77c6c3d976a59f371b07304005e66e7f.jpg', 'There is nothing wrong with tried, true, and dependable. Chow mein is not only one of the most popular dishes in China, but it has also become a signature dish at Chinese restaurants all around the world. With stir-fried noodles, and your choice of sauteed tofu, vegetables, or meat, Chow mein has become an easy and reliable meal to be savored and enjoyed.', '2023-10-29 05:23:15', '2023-10-29 05:23:15', '2023-10-29 10:53:15'),
(31, 'Wonton Soup', 2.45, 2, 4, 1, 'http://localhost/E-Commerce/public/assets/uploads/php9833-535aa978ec1c7cad4bafe37af1ef2a8a.jpg', 'Originating in Northern China, wontons are a type of dumpling draped in egg yolk wrappings, covering cooked and savory meats or seafood filling. Wontons can be either fried or steamed; however, wonton soup often calls for steamed wontons submerged in boiled chicken broth that is garnished with green onions. This bowl of warmth is the perfect comfort food, allowing it to be sought after year-round and around the world.', '2023-10-29 05:24:30', '2023-10-29 05:24:30', '2023-10-29 10:54:30'),
(32, 'Angel Hair Pasta', 7.15, 1, 5, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpf614-e8aff4efe91b23e5c40a34a404d1c3ed.jpg', 'The long, delicate strands of angel hair pasta (aka capellini) are best served in light or creamy sauces. The thin strands can go M.I.A. in chunky, meaty sauces.', '2023-10-29 05:28:10', '2023-10-29 05:28:10', '2023-10-29 10:58:10'),
(33, 'Bow Tie Pasta', 7.17, 1, 5, 1, 'http://localhost/E-Commerce/public/assets/uploads/phpaa42-b2d3874e64a71ceffabcd81466478028.jpg', 'Use bow tie pasta to dress up any dish that calls for small pasta shapes, such as penne or shells. Also known as farfalle.', '2023-10-29 05:28:56', '2023-10-29 05:28:56', '2023-10-29 10:58:56'),
(34, 'Linguine', 5.13, 1, 5, 1, 'http://localhost/E-Commerce/public/assets/uploads/php4fab-fe0f6512d29cdf23f853252d241f4736.jpg', 'These long, flat noodles are slightly thicker than spaghetti. The classic Italian restaurant pairing is clam sauce, but you can use this pasta in any dish that calls for spaghetti.', '2023-10-29 05:29:39', '2023-10-29 05:29:39', '2023-10-29 10:59:39'),
(35, 'Macaroni', 6.84, 1, 5, 1, 'http://localhost/E-Commerce/public/assets/uploads/phped92-2371de4098e5be6688e6901018ca534f.jpg', 'A small, tube-shaped pasta, macaroni is terrific in creamy casseroles (like macaroni and cheese) or salads (like macaroni salad). Why? Because the creamy sauce flows into the cooked tubes, giving you flavor in every bite.', '2023-10-29 05:30:19', '2023-10-29 05:30:19', '2023-10-29 11:00:19'),
(36, 'Spaghetti', 5.25, 1, 5, 1, 'http://localhost/E-Commerce/public/assets/uploads/php8bb7-45f5eccd7f43e767aa459208289c6756.jpg', 'The classic, long, thin, cylindrical tubes you know and love. Spaghetti is just thick enough so it doesn\'t get lost in that hearty family meat sauce recipe, but thin enough to serve with cream sauce, or even with just a light dressing of olive oil and garlic.', '2023-10-29 05:31:00', '2023-10-29 05:31:00', '2023-10-29 11:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sushi', 5, '2023-10-23 06:20:17', '2023-10-23 06:20:17', '2023-10-23 10:50:17'),
(2, 'Ramen', 5, '2023-10-23 06:20:29', '2023-10-23 06:20:29', '2023-10-23 10:50:29'),
(3, 'Pizza', 1, '2023-10-23 06:20:41', '2023-10-23 06:20:41', '2023-10-23 10:50:41'),
(4, 'Side Dish', 7, '2023-10-23 06:20:58', '2023-10-29 05:15:11', '2023-10-23 10:50:58'),
(5, 'Pasta', 6, '2023-10-23 06:21:24', '2023-10-29 05:25:11', '2023-10-23 10:51:24'),
(6, 'Drink', 5, '2023-10-23 06:21:34', '2023-10-23 06:21:34', '2023-10-23 10:51:34'),
(7, 'Bakery', 4, '2023-10-23 06:22:59', '2023-10-23 06:22:59', '2023-10-23 10:52:59'),
(8, 'Coffee', 3, '2023-10-23 06:23:12', '2023-10-23 06:23:12', '2023-10-23 10:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'waiferkolar', 'waiferkolar@gmail.com', '$2y$10$Yaj2AOyvrZmjCOeFlGxOr.DbRjyU3ZUztvtkcN/O/Sg22qCTI/20y', '', '2023-10-29 03:27:28', '2023-10-29 09:57:28', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_no` (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
