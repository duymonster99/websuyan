-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 21, 2024 lúc 08:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `suyandb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_type` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `fullname`, `password`, `acc_type`, `reset_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'toptrickduy189@gmail.com', 'Duy Huỳnh', '$2y$12$j8GMYqVn93hwRT9x0HAYuuLtH/UQAx.PEZyO7LkuYYUDR5nvxWhRa', 'admin', NULL, 'active', '2024-01-21 00:16:49', '2024-01-21 00:16:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', NULL, 0, '2024-01-18 17:19:36', '2024-01-18 17:19:36'),
(2, 'Khóa học', 'khoa-hoc', 0, '2024-01-18 17:20:00', '2024-01-18 17:20:00'),
(3, 'Lịch khai giảng', 'lich-khai-giang', 0, '2024-01-18 17:20:07', '2024-01-18 17:20:07'),
(4, 'Thư viện', NULL, 0, '2024-01-18 17:20:16', '2024-01-18 17:20:16'),
(5, 'Tuyển dụng', 'tuyen-dung', 0, '2024-01-18 17:20:22', '2024-01-18 17:20:22'),
(6, 'Liên hệ', 'lien-he', 0, '2024-01-18 17:20:28', '2024-01-18 17:20:28'),
(7, 'Về trung tâm', 've-trung-tam', 1, '2024-01-18 17:20:37', '2024-01-18 17:20:37'),
(8, 'Quyền lợi của học viên', 'quyen-loi-cua-hoc-vien', 1, '2024-01-18 17:21:05', '2024-01-18 17:21:05'),
(9, 'Thành tích học viên', 'thanh-tich-hoc-vien', 1, '2024-01-18 17:21:37', '2024-01-18 17:21:37'),
(10, 'Review từ học viên', 'review-tu-hoc-vien', 1, '2024-01-18 17:21:50', '2024-01-18 17:21:50'),
(11, 'Giảng viên', 'giang-vien', 1, '2024-01-18 17:21:59', '2024-01-18 17:21:59'),
(12, 'Khóa học online', NULL, 2, '2024-01-18 17:22:11', '2024-01-18 17:22:11'),
(13, 'Khóa học offline', 'khoa-hoc-offline', 2, '2024-01-18 17:22:32', '2024-01-18 17:22:32'),
(14, 'Từ vựng Tiếng Trung', 'tu-vung-tieng-trung', 4, '2024-01-18 17:22:57', '2024-01-18 17:22:57'),
(15, 'Ngữ pháp Tiếng Trung', 'ngu-phap-tieng-trung', 4, '2024-01-18 17:23:16', '2024-01-18 17:23:16'),
(16, 'Thành ngữ Tiếng Trung', 'thanh-ngu-tieng-trung', 4, '2024-01-18 17:23:35', '2024-01-18 17:23:35'),
(17, 'Du học Trung Quốc', 'du-hoc-trung-quoc', 4, '2024-01-18 17:23:59', '2024-01-18 17:23:59'),
(18, 'Kinh nghiệm thi HSK', 'kinh-nghiem-thi-hsk', 4, '2024-01-18 17:24:17', '2024-01-18 17:24:17'),
(19, 'Sơ cấp HSK0 - HSK2', 'so-cap-hsk0-hsk2', 12, '2024-01-18 17:43:02', '2024-01-18 17:43:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu1s`
--

CREATE TABLE `menu1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu2s`
--

CREATE TABLE `menu2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu3s`
--

CREATE TABLE `menu3s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_26_140511_create_accounts_table', 1),
(3, '2024_01_07_033718_create_contacts_table', 1),
(4, '2024_01_07_052729_create_notifies_table', 1),
(5, '2024_01_12_014034_create_categories_table', 1),
(6, '2024_01_18_150733_create_menu1s_table', 1),
(7, '2024_01_18_150735_create_menu2s_table', 1),
(8, '2024_01_18_150737_create_menu3s_table', 1),
(9, '2024_01_19_033126_posts', 1),
(10, '2024_01_19_033236_sliders', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifies`
--

CREATE TABLE `notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notify` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stt` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `status_banner` varchar(10) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `appendix` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status_home` varchar(255) DEFAULT NULL,
  `status_page` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `stt`, `menu_id`, `banner`, `status_banner`, `title`, `meta_description`, `appendix`, `content`, `image`, `status_home`, `status_page`, `created_at`, `updated_at`) VALUES
(1, NULL, 5, NULL, 'null', 'Tuyen dung nha', NULL, NULL, NULL, 'img-emp/tuyendung1.jpg', 'null', 'null', '2024-01-21 00:32:14', '2024-01-21 00:32:14'),
(2, NULL, 7, NULL, 'null', 'Trung tâm tiếng trung hàng đầu', '<p>Tự h&agrave;o l&agrave; trung t&acirc;m đầu ti&ecirc;n phong trong lĩnh vực đ&agrave;o tạo tiếng Trung chuẩn đại học. Cam kết đầu ra chất lượng h&agrave;ng đầu tại Việt Nam.</p>', NULL, NULL, 'img-procedure/procedure1.png', 'null', 'null', '2024-01-21 00:39:57', '2024-01-21 00:39:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stt` bigint(20) UNSIGNED DEFAULT NULL,
  `menu1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu1s`
--
ALTER TABLE `menu1s`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu2s`
--
ALTER TABLE `menu2s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu2s_menu1_id_foreign` (`menu1_id`),
  ADD KEY `menu2s_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `menu3s`
--
ALTER TABLE `menu3s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu3s_menu1_id_foreign` (`menu1_id`),
  ADD KEY `menu3s_menu2_id_foreign` (`menu2_id`),
  ADD KEY `menu3s_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_menu_id_foreign` (`menu_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_menu1_id_foreign` (`menu1_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu1s`
--
ALTER TABLE `menu1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu2s`
--
ALTER TABLE `menu2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu3s`
--
ALTER TABLE `menu3s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `notifies`
--
ALTER TABLE `notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menu2s`
--
ALTER TABLE `menu2s`
  ADD CONSTRAINT `menu2s_menu1_id_foreign` FOREIGN KEY (`menu1_id`) REFERENCES `menu1s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu2s_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu1s` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `menu3s`
--
ALTER TABLE `menu3s`
  ADD CONSTRAINT `menu3s_menu1_id_foreign` FOREIGN KEY (`menu1_id`) REFERENCES `menu1s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu3s_menu2_id_foreign` FOREIGN KEY (`menu2_id`) REFERENCES `menu2s` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu3s_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu2s` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_menu1_id_foreign` FOREIGN KEY (`menu1_id`) REFERENCES `menu1s` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
