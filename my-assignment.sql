-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 06:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `price`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Test Addon', '100', 1, '2023-02-28 05:28:28', '2023-02-28 05:28:28'),
(4, 'Test Addon1', '100', 1, '2023-02-28 06:29:21', '2023-02-28 06:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `addon_categories`
--

CREATE TABLE `addon_categories` (
  `id` int(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addons` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon_categories`
--

INSERT INTO `addon_categories` (`id`, `name`, `addons`, `status`, `created_at`, `updated_at`) VALUES
(8, 'test category', '3,4', 1, '2023-02-28 16:15:08', '2023-02-28 16:15:08'),
(9, 'test category one', '3', 1, '2023-02-28 16:15:40', '2023-02-28 16:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('login','logout') NOT NULL DEFAULT 'login',
  `user_master_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `type`, `user_master_id`, `ip`, `created_at`) VALUES
(1, 'logout', 1, '::1', '2020-02-18 11:35:43'),
(2, 'login', 1, '::1', '2020-02-18 11:36:15'),
(3, 'logout', 1, '::1', '2020-03-05 12:30:24'),
(4, 'login', 1, '::1', '2020-03-05 12:30:24'),
(5, 'logout', 1, '::1', '2020-03-05 12:52:49'),
(6, 'login', 1, '::1', '2020-03-05 12:53:11'),
(7, 'logout', 1, '::1', '2020-03-06 04:39:25'),
(8, 'login', 1, '::1', '2020-03-06 04:39:25'),
(9, 'logout', 1, '::1', '2020-03-06 08:14:22'),
(10, 'login', 1, '::1', '2020-03-06 08:14:22'),
(11, 'login', 1, '103.217.235.22', '2020-03-06 09:03:42'),
(12, 'logout', 1, '103.217.235.22', '2020-03-06 11:44:07'),
(13, 'login', 1, '103.217.235.22', '2020-03-06 13:52:35'),
(14, 'logout', 1, '103.217.235.22', '2020-03-06 13:54:31'),
(15, 'login', 1, '103.217.235.22', '2020-03-06 13:54:31'),
(16, 'logout', 1, '103.217.235.22', '2020-03-06 13:56:50'),
(17, 'login', 1, '90.187.15.137', '2020-03-06 14:38:05'),
(18, 'login', 1, '198.8.80.18', '2020-03-11 07:48:06'),
(19, 'logout', 1, '198.8.80.18', '2020-03-11 07:52:50'),
(20, 'logout', 1, '90.187.15.137', '2020-03-11 10:40:59'),
(21, 'login', 1, '90.187.15.137', '2020-03-11 10:40:59'),
(22, 'login', 1, '103.217.235.51', '2020-03-12 07:17:55'),
(23, 'logout', 1, '90.187.15.137', '2020-03-17 10:30:02'),
(24, 'login', 1, '90.187.15.137', '2020-03-17 10:30:02'),
(25, 'login', 1, '103.217.235.224', '2020-03-18 11:49:00'),
(26, 'login', 1, '42.110.242.55', '2020-03-27 14:48:57'),
(27, 'login', 1, '103.18.170.78', '2020-03-27 15:20:17'),
(28, 'logout', 1, '103.18.170.78', '2020-03-27 15:54:49'),
(29, 'login', 1, '103.18.170.78', '2020-03-27 15:54:49'),
(30, 'login', 1, '103.18.170.93', '2020-03-28 06:52:05'),
(31, 'login', 1, '50.97.230.38', '2020-03-30 12:10:06'),
(32, 'logout', 1, '90.187.15.137', '2020-03-30 12:11:12'),
(33, 'login', 1, '90.187.15.137', '2020-03-30 12:11:12'),
(34, 'logout', 1, '90.187.15.137', '2020-03-30 12:11:21'),
(35, 'login', 1, '90.187.15.137', '2020-03-31 12:26:55'),
(36, 'login', 1, '172.106.128.242', '2020-04-02 08:30:07'),
(37, 'login', 1, '116.206.202.243', '2020-04-02 11:32:14'),
(38, 'logout', 1, '90.187.15.137', '2020-04-06 09:13:07'),
(39, 'login', 1, '90.187.15.137', '2020-04-06 09:13:08'),
(40, 'login', 1, '157.43.196.159', '2020-04-10 10:39:16'),
(41, 'logout', 1, '116.206.202.243', '2020-04-10 10:44:06'),
(42, 'login', 1, '116.206.202.243', '2020-04-10 10:44:08'),
(43, 'logout', 1, '::1', '2020-10-03 17:09:08'),
(44, 'login', 1, '::1', '2020-10-03 17:09:08'),
(45, 'logout', 1, '::1', '2020-10-03 19:12:32'),
(46, 'login', 1, '::1', '2020-10-03 19:12:54'),
(47, 'logout', 1, '::1', '2020-10-05 12:39:31'),
(48, 'login', 1, '::1', '2020-10-05 12:39:31'),
(49, 'logout', 1, '::1', '2020-10-05 17:56:22'),
(50, 'login', 1, '::1', '2020-10-05 17:56:22'),
(51, 'logout', 1, '::1', '2021-05-01 13:47:53'),
(52, 'login', 1, '::1', '2021-05-01 13:47:54'),
(53, 'logout', 1, '::1', '2021-05-04 12:19:49'),
(54, 'login', 1, '::1', '2021-05-04 12:19:49'),
(55, 'logout', 1, '::1', '2021-05-05 11:21:26'),
(56, 'login', 1, '::1', '2021-05-05 11:21:27'),
(57, 'logout', 1, '::1', '2021-05-06 13:12:30'),
(58, 'login', 1, '::1', '2021-05-06 13:12:30'),
(59, 'logout', 1, '::1', '2021-05-11 18:37:27'),
(60, 'login', 1, '::1', '2021-05-11 18:37:27'),
(61, 'logout', 1, '::1', '2021-05-12 11:23:02'),
(62, 'login', 1, '::1', '2021-05-12 11:23:02'),
(63, 'logout', 1, '::1', '2021-05-13 13:22:06'),
(64, 'login', 1, '::1', '2021-05-13 13:22:06'),
(65, 'login', 1, '116.206.202.126', '2021-05-13 16:53:18'),
(66, 'login', 1, '146.196.45.2', '2021-05-13 17:01:42'),
(67, 'logout', 1, '146.196.45.2', '2021-05-14 11:28:39'),
(68, 'login', 1, '146.196.45.2', '2021-05-14 11:28:39'),
(69, 'logout', 1, '146.196.45.2', '2021-05-14 16:58:12'),
(70, 'login', 1, '146.196.45.2', '2021-05-14 16:58:12'),
(71, 'logout', 1, '116.206.202.126', '2021-05-14 21:56:47'),
(72, 'login', 1, '116.206.202.126', '2021-05-14 21:56:47'),
(73, 'logout', 1, '146.196.45.2', '2021-05-17 13:40:06'),
(74, 'login', 1, '146.196.45.2', '2021-05-17 13:40:06'),
(75, 'logout', 1, '::1', '2021-07-31 16:45:44'),
(76, 'login', 1, '::1', '2021-07-31 16:45:44'),
(77, 'logout', 1, '::1', '2021-08-02 20:46:22'),
(78, 'login', 1, '::1', '2021-08-02 20:46:22'),
(79, 'logout', 1, '::1', '2022-08-09 18:14:01'),
(80, 'login', 1, '::1', '2022-08-09 18:14:01'),
(81, 'logout', 1, '::1', '2022-08-09 19:16:06'),
(82, 'login', 1, '::1', '2022-08-09 19:16:06'),
(83, 'logout', 1, '::1', '2023-02-28 05:21:40'),
(84, 'login', 1, '::1', '2023-02-28 05:21:40'),
(85, 'logout', 1, '::1', '2023-02-28 15:56:48'),
(86, 'login', 1, '::1', '2023-02-28 15:56:48'),
(87, 'logout', 1, '::1', '2023-03-01 04:41:08'),
(88, 'login', 1, '::1', '2023-03-01 04:41:08'),
(89, 'logout', 1, '::1', '2023-03-01 05:30:38'),
(90, 'login', 1, '::1', '2023-03-01 05:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `addon_categories` text DEFAULT NULL,
  `status` enum('0','1','3') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `photo`, `addon_categories`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Product', '100', '1677601282Porcelain-&-Ceramic-Tiles.png', '8', '1', '2023-02-28 16:21:22', '2023-02-28 16:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `type` set('text','textarea','password','select','select-multiple','radio','checkbox') COLLATE utf8_unicode_ci NOT NULL,
  `default` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL,
  `is_required` int(1) NOT NULL,
  `is_gui` int(1) NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `row_order` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `slug`, `title`, `description`, `type`, `default`, `value`, `options`, `is_required`, `is_gui`, `module`, `row_order`) VALUES
(1, 'admin_email', 'Admin Email', 'Admin Email', 'text', 'admin@admin.us', 'admin@mathswithmantusir.com', '', 1, 1, 'General', 1),
(2, 'admin_contact', 'Admin Contact', 'Admin Contact', 'text', '+9198454646474', '0123456789', '', 1, 1, 'General', 2),
(3, 'facebook_url', 'Facebook', '', 'text', 'https://www.facebook.com/', 'https://www.facebook.com', '', 1, 1, 'Social Link', 5),
(4, 'twitter_url', 'Twitter', '', 'text', 'https://twitter.com/', 'https://www.twitter.com', '', 1, 1, 'Social Link', 0),
(5, 'youtube_url', 'Youtube', '', 'text', 'https://www.youtube.com', 'https://www.youtube.com', '', 1, 1, 'Social Link', 0),
(6, 'instagram_url', 'Instagram', '', 'text', 'https://instagram.com/', 'https://www.instagram.com', '', 1, 1, 'Social Link', 0),
(14, 'support_email', 'Support Email', 'This would be used as a sender email.', 'text', 'info@mathwithmantusir.com', 'support@mathwithmantusir.com', '', 1, 1, 'Support', 4),
(15, 'support_name', 'Support Name', 'In mail this name will be use a sender name', 'text', 'admin', 'mathwithmantusir Support', '', 1, 1, 'Support', 3),
(20, 'site_location', 'Site Location', 'Site Location', 'text', 'Shop 1050,Westfield Hornsby 2077', 'N1/290, N1, Block N1, IRC Village, Nayapalli, Bhubaneswar, Odisha 751012', '', 1, 1, 'Location', 1),
(21, 'site_phone', 'Site Phone No', 'Site Phone No', 'text', '0451 771 768', '0123456789', '', 1, 1, 'Location', 2),
(22, 'site_email', 'Site Contact Email', 'Site Contact Email', 'text', 'info@mathwithmantusir.com', 'info@mathswithmantusir.com', '', 1, 1, 'Location', 3),
(24, 'razorpay_key', 'RAZORPAY KEY', 'RAZORPAY KEY', 'text', '', 'rzp_test_UwfMN3Y9VO0I5T', '', 1, 1, 'Razorpay', 0),
(25, 'razorpay_secret', 'RAZORPAY SECRET KEY', 'RAZORPAY SECRET KEY', 'text', '', 'rzq0nDoE1ukMuPOM9opZvzyu', '', 1, 1, 'Razorpay', 1),
(26, 'subscription_charge', 'Subscription', 'Subscription', 'text', '100', '200', '', 1, 1, 'Subscription Charge', 1);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE `static_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `slug`, `page_name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'about_us', 'About Us', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"text-align:justify\">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p><h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3><p style=\"text-align:justify\">&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p><h3>1914 translation by H. Rackham</h3><p style=\"text-align:justify\">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', NULL, NULL),
(2, 'return-refund-policy', 'Return & Refund Policy', '<h1>Return and Refund Policy</h1>\r\n\r\n<p>Last updated: May 13, 2021</p>\r\n\r\n<p>Thank you for shopping at mathswithmantusir.</p>\r\n\r\n<p>If, for any reason, You are not completely satisfied with a purchase We invite You to review our policy on refunds and returns.</p>\r\n\r\n<p>The following terms are applicable for any products that You purchased with Us.</p>\r\n\r\n<h1>Interpretation and Definitions</h1>\r\n\r\n<h2>Interpretation</h2>\r\n\r\n<p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>\r\n\r\n<h2>Definitions</h2>\r\n\r\n<p>For the purposes of this Return and Refund Policy:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot; or &quot;Our&quot; in this Agreement) refers to mathswithmantusir.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Goods</strong> refer to the items offered for sale on the Service.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Orders</strong> mean a request by You to purchase Goods from Us.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Service</strong> refers to the Website.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Website</strong> refers to mathswithmantusir, accessible from <a href=\"https://mathswithmantusir.com/\" rel=\"external nofollow noopener\" target=\"_blank\">https://mathswithmantusir.com/</a></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h1>Your Order Cancellation Rights</h1>\r\n\r\n<p>You are entitled to cancel Your Order within 7 days without giving any reason for doing so.</p>\r\n\r\n<p>The deadline for cancelling an Order is 7 days from the date on which You received the Goods or on which a third party you have appointed, who is not the carrier, takes possession of the product delivered.</p>\r\n\r\n<p>In order to exercise Your right of cancellation, You must inform Us of your decision by means of a clear statement. You can inform us of your decision by:</p>\r\n\r\n<ul>\r\n	<li>By email: info@mathswithmantusir.com</li>\r\n</ul>\r\n\r\n<p>We will reimburse You no later than 14 days from the day on which We receive the returned Goods. We will use the same means of payment as You used for the Order, and You will not incur any fees for such reimbursement.</p>\r\n\r\n<h1>Conditions for Returns</h1>\r\n\r\n<p>In order for the Goods to be eligible for a return, please make sure that:</p>\r\n\r\n<ul>\r\n	<li>The Goods were purchased in the last 7 days</li>\r\n	<li>The Goods are in the original packaging</li>\r\n</ul>\r\n\r\n<p>The following Goods cannot be returned:</p>\r\n\r\n<ul>\r\n	<li>The supply of Goods made to Your specifications or clearly personalized.</li>\r\n	<li>The supply of Goods which according to their nature are not suitable to be returned, deteriorate rapidly or where the date of expiry is over.</li>\r\n	<li>The supply of Goods which are not suitable for return due to health protection or hygiene reasons and were unsealed after delivery.</li>\r\n	<li>The supply of Goods which are, after delivery, according to their nature, inseparably mixed with other items.</li>\r\n</ul>\r\n\r\n<p>We reserve the right to refuse returns of any merchandise that does not meet the above return conditions in our sole discretion.</p>\r\n\r\n<p>Only regular priced Goods may be refunded. Unfortunately, Goods on sale cannot be refunded. This exclusion may not apply to You if it is not permitted by applicable law.</p>\r\n\r\n<h1>Returning Goods</h1>\r\n\r\n<p>You are responsible for the cost and risk of returning the Goods to Us. You should send the Goods at the following address:</p>\r\n\r\n<p>Company</p>\r\n\r\n<p>We cannot be held responsible for Goods damaged or lost in return shipment. Therefore, We recommend an insured and trackable mail service. We are unable to issue a refund without actual receipt of the Goods or proof of received return delivery.</p>\r\n\r\n<h1>Gifts</h1>\r\n\r\n<p>If the Goods were marked as a gift when purchased and then shipped directly to you, You&#39;ll receive a gift credit for the value of your return. Once the returned product is received, a gift certificate will be mailed to You.</p>\r\n\r\n<p>If the Goods weren&#39;t marked as a gift when purchased, or the gift giver had the Order shipped to themselves to give it to You later, We will send the refund to the gift giver.</p>\r\n\r\n<h2>Contact Us</h2>\r\n\r\n<p>If you have any questions about our Returns and Refunds Policy, please contact us:</p>\r\n\r\n<ul>\r\n	<li>By email: info@mathswithmantusir.com</li>\r\n</ul>', NULL, '2021-05-13 12:06:56'),
(3, 'privacy_policy', 'Privacy Policy', '<h1>Privacy Policy for mathswithmantusir</h1>\r\n\r\n<p>At mathswithmantusir.com, accessible from https://mathswithmantusir.com/, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by mathswithmantusir.com and how we use it.</p>\r\n\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in mathswithmantusir.com. This policy is not applicable to any information collected offline or via channels other than this website.&nbsp;</p>\r\n\r\n<h2>Consent</h2>\r\n\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n\r\n<h2>Information we collect</h2>\r\n\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n\r\n<h2>How we use your information</h2>\r\n\r\n<p>We use the information we collect in various ways, including to:</p>\r\n\r\n<ul>\r\n	<li>Provide, operate, and maintain our website</li>\r\n	<li>Improve, personalize, and expand our website</li>\r\n	<li>Understand and analyze how you use our website</li>\r\n	<li>Develop new products, services, features, and functionality</li>\r\n	<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n	<li>Send you emails</li>\r\n	<li>Find and prevent fraud</li>\r\n</ul>\r\n\r\n<h2>Log Files</h2>\r\n\r\n<p>mathswithmantusir.com follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services&#39; analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users&#39; movement on the website, and gathering demographic information.</p>\r\n\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of mathswithmantusir.com.</p>\r\n\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on mathswithmantusir.com, which are sent directly to users&#39; browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n\r\n<p>Note that mathswithmantusir.com has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n\r\n<h2>Third Party Privacy Policies</h2>\r\n\r\n<p>mathswithmantusir.com&#39;s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers&#39; respective websites.</p>\r\n\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n\r\n<p>Request that a business that collects a consumer&#39;s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n\r\n<p>Request that a business that sells a consumer&#39;s personal data, not sell the consumer&#39;s personal data.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>GDPR Data Protection Rights</h2>\r\n\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n\r\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n\r\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n\r\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\r\n\r\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>Children&#39;s Information</h2>\r\n\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n\r\n<p>mathswithmantusir.com does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', NULL, '2021-05-13 11:58:58'),
(4, 'terms_conditions', 'Terms & Conditions', '<h2><strong>Terms and Conditions</strong></h2>\r\n\r\n<p>Welcome to mathswithmantusir.com!</p>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of mathswithmantusir&#39;s Website, located at https://mathswithmantusir.com/.</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use mathswithmantusir.com if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &quot;Client&quot;, &quot;You&quot; and &quot;Your&quot; refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. &quot;The Company&quot;, &quot;Ourselves&quot;, &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot;, refers to our Company. &quot;Party&quot;, &quot;Parties&quot;, or &quot;Us&quot;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing mathswithmantusir.com, you agreed to use cookies in agreement with the mathswithmantusir&#39;s Privacy Policy.</p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, mathswithmantusir and/or its licensors own the intellectual property rights for all material on mathswithmantusir.com. All intellectual property rights are reserved. You may access this from mathswithmantusir.com for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n\r\n<ul>\r\n	<li>Republish material from mathswithmantusir.com</li>\r\n	<li>Sell, rent or sub-license material from mathswithmantusir.com</li>\r\n	<li>Reproduce, duplicate or copy material from mathswithmantusir.com</li>\r\n	<li>Redistribute content from mathswithmantusir.com</li>\r\n</ul>\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. mathswithmantusir does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of mathswithmantusir,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, mathswithmantusir shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>mathswithmantusir reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n	<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n	<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n	<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n	<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant mathswithmantusir a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n	<li>Government agencies;</li>\r\n	<li>Search engines;</li>\r\n	<li>News organizations;</li>\r\n	<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n	<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n	<li>commonly-known consumer and/or business information sources;</li>\r\n	<li>dot.com community sites;</li>\r\n	<li>associations or other groups representing charities;</li>\r\n	<li>online directory distributors;</li>\r\n	<li>internet portals;</li>\r\n	<li>accounting, law and consulting firms; and</li>\r\n	<li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of mathswithmantusir; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to mathswithmantusir. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n	<li>By use of our corporate name; or</li>\r\n	<li>By use of the uniform resource locator being linked to; or</li>\r\n	<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.</li>\r\n</ul>\r\n\r\n<p>No use of mathswithmantusir&#39;s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Your Privacy</strong></h3>\r\n\r\n<p>Please read Privacy Policy</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n	<li>limit or exclude our or your liability for death or personal injury;</li>\r\n	<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n	<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n	<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', NULL, '2021-05-13 12:02:17'),
(5, 'help', 'HELP', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"text-align:justify\">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p><h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3><p style=\"text-align:justify\">&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p><h3>1914 translation by H. Rackham</h3><p style=\"text-align:justify\">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` bigint(20) NOT NULL,
  `type_id` tinyint(2) DEFAULT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('1','2') DEFAULT NULL COMMENT '1=>"Male",2=>"Female"',
  `payment_status` enum('0','1') NOT NULL DEFAULT '0',
  `subscription_end` varchar(100) DEFAULT NULL,
  `password_token` varchar(128) DEFAULT NULL,
  `remember_token` varchar(128) DEFAULT NULL,
  `activation_token` varchar(128) DEFAULT NULL,
  `reset_password_token` varchar(128) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0' COMMENT '0=>NO ,  1=>Yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `type_id`, `full_name`, `email`, `image`, `password`, `phone`, `gender`, `payment_status`, `subscription_end`, `password_token`, `remember_token`, `activation_token`, `reset_password_token`, `status`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'Pj7L110VRIi9Xo.png', '$2y$10$7pc6FU.fN/koNZkCyDMoSOuZK4EI/JQqmuICTseHKO.doywx/iT.u', NULL, NULL, '0', NULL, NULL, 'FXX7P1OsWAd2GleplyYOSkSf4hOthjDHcZuUJA46wRYqXTvVMzBxagUNDB2x', NULL, NULL, '1', '2018-05-22 00:00:00', '2021-05-01 13:48:33', '2018-05-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` tinyint(2) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `status`) VALUES
(1, 'Super Admin', '1'),
(2, 'User', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_categories`
--
ALTER TABLE `addon_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_slug` (`slug`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addon_categories`
--
ALTER TABLE `addon_categories`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
