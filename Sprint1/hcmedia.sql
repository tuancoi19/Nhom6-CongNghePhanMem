-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2020 lúc 11:35 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hcmedia`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`id`, `name`, `categories_id`, `created_at`, `updated_at`) VALUES
(4, 'Chụp ảnh kỷ yếu', 1, NULL, NULL),
(5, 'Chụp ảnh phóng sự cưới', 1, NULL, NULL),
(6, 'Chụp ảnh tiệc sinh nhật', 1, NULL, NULL),
(7, 'Chụp ảnh kỷ yếu', 1, NULL, NULL),
(8, 'Chụp ảnh sự kiện', 1, NULL, NULL),
(9, 'Chụp ảnh kỷ yếu tại Thái Bình', 1, NULL, NULL),
(10, 'Bảng giá chụp ảnh kỷ yếu', 2, NULL, NULL),
(11, 'Bảng giá chụp ảnh phóng sự cưới', 2, NULL, NULL),
(12, 'Bảng giá chụp ảnh tiệc sinh nhật', 2, NULL, NULL),
(13, 'Bảng giá chụp ảnh sự kiện', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'album', 'album', 1, NULL, NULL),
(2, 'Bảng Giá', NULL, 2, NULL, NULL),
(3, 'Kỷ Yếu Miền Bắc', 'ky-yeu-mien-bac', 1, NULL, NULL),
(4, 'TOUR Kỷ Yếu', 'tour-ky-yeu', 1, NULL, NULL),
(5, 'Thuê Trang Phục', 'thue-trang-phuc', 1, NULL, NULL),
(6, 'Góc Tư Vấn', 'goc-tu-van', 1, NULL, NULL),
(13, 'Lien He', 'lien-he', 2, NULL, NULL),
(14, 'Bảng Giá', 'bang-gia', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 'CỘNG STUDIO - MỘT LẦN LƯU GIỮ - TRỌN ĐỜI KHẮC GHI', '✪ Trong mỗi bước ngoặt của cuộc đời, bạn sẽ mong muốn có những bức ảnh đẹp để lưu giữ kỷ niệm, dấu ấn của mình. Để 10 năm hay 20 năm nữa khi lật những trang album bạn vẫn luôn nhớ những dấu mốc ấy. Cộng Studio là địa chỉ tin cậy để ghi lại những dấu ấn đáng nhớ và hạnh phúc nhất của bạn qua từng bức ảnh. Chúng tôi hiểu khoảnh khắc trong những sự kiện hay mốc thời gian của từng người là khác nhau trong cuộc sống này, bởi vậy tấm hình không chỉ là tấm hình mà trong đó chứa cả những câu chuyện đằng sau đó nữa.\r\n\r\n✪ Cộng Studio là địa chỉ tin cậy để ghi lại những dấu ấn đáng nhớ và hạnh phúc của bạn qua từng bức ảnh. Với kinh nghiệm hơn 10 năm trong nghề dịch vụ, chúng tôi luôn luôn tự hào là điểm lựa chọn của nhiều khách hàng miền Bắc, miền Trung. Vì vậy, bạn hoàn toàn có thể tin tưởng vào dịch vụ cũng như chất lượng sản phẩm mà Cộng Studio mang đến cho bạn.\r\n\r\n✪ Cộng Studio tiên phong trong ngành dịch vụ chụp ảnh đẹp khi đưa những thiết bị chụp tiên tiến vào làm việc, không chỉ dừng lại đó chúng tôi khắt khe đến tay nghề người chụp cho đến hậu kì luôn được kiểm duyệt kỹ lưỡng để đưa ra những sản phẩm độc đáo. Ngoài ra, Cộng có đa dạng những gói chụp dịch vụ để khách hàng có nhiều sự lựa chọn phù hợp với túi tiền. Chúng tôi, cam kết mang tới cho khách hàng sự Chuyên nghiệp - Uy tín - Giá rẻ, trọn gói.', 1, NULL, NULL),
(2, 'CỘNG STUDIO | BẢNG GIÁ DỊCH VỤ CỘNG STUDIO\r\n\r\n MỘT LẦN LƯU GIỮ - TRỌN ĐỜI KHẮC GHI', '✪ Thời gian qua đi ai cũng muốn lưu lại cho mình những khoảnh khắc đẹp nhất trong cuộc đời. Để năm sau nhìn lại thấy 1 năm qua đi thật nhiều thay đổi.. Để 5 năm sau, 10 năm sau hay lâu hơn thế nữa, nhìn lại cùng đám bạn để thấy mình đã trải qua 1 mùa kỷ yếu nhiều cảm xúc...Hay để mãi về sau cùng ngắm nhìn những khoảnh khắc trong ngày lễ trọng đại của mình với phóng sự cưới cùng Cộng Studio. Hoặc chỉ đơn giản là những bức hình thời trang cùng gia đình, cùng những người bạn thân yêu.\r\n\r\n✪ Trong mỗi khoảnh khắc, bước ngoặt của cuộc đời ai cũng muốn lưu giữ cho riêng mình những tấm ảnh đẹp nhất làm kỷ niệm về sau. Cộng Studio là địa chỉ tin cậy để ghi lại những dấu ấn đáng nhớ và hạnh phúc của bạn qua từng bức ảnh. Chúng tôi luôn luôn tự hào là điểm lựa chọn chụp ảnh kỷ yếu hàng đầu Miền Bắc và Miền Trung trong những năm qua dành cho các bạn học sinh, sinh viên khi mùa tan trường đã đến vì vậy, Bạn hoàn toàn có thể lựa chọn được các gói chụp ảnh phù hợp với khả năng tài chính của mình.\r\n\r\n✪ Với nhiều năm kinh nghiệm trong nghề cùng Ekip chụp ảnh chuyên nghiệp, được đào tạo bài bản với quy trình làm việc chuyên nghiệp, tận tâm, Cộng tin tưởng sẽ mang đến cho các bạn những tấm hình đẹp nhất và thể hiện rõ nét dấu ấn riêng của từng cá nhân, tập thể được lưu lại trong mỗi bức hình và còn mãi theo thời gian.\r\n\r\n✪ Hiểu cả những gửi gắm của bạn, Cộng Studio – thương hiệu chụp ảnh, quay phim uy tín số 1 Hà Nội không ngừng nỗ lực để mang đến bạn những bức hình hoàn hảo nhất, những xúc cảm lắng đọng nhất cùng ekip phục vụ chuyên nghiệp, được đào tạo bài bản, song song với việc đó, chúng tôi đầu tư hệ thống trang thiết bị hiện đại nhằm mang đến khách hàng những sản phẩm với chất lượng tốt nhất !', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'xxxxxxxxx',
  `birthday` date DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `address`, `birthday`, `level`, `created_at`, `updated_at`) VALUES
(1, 'nguyen van cao', 'cao20cm@gmail.com', '123', 'ha noi', '0000-00-00', 1, NULL, NULL),
(2, 'nguyen thi thom', 'user02@gmail.com', '123', 'ho chi minh', '0000-00-00', 0, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_categories_id_foreign` (`categories_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_categories_id_foreign` (`categories_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;