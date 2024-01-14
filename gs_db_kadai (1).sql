-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-01-14 12:40:45
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_image`
--

CREATE TABLE `gs_kadai_image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(256) NOT NULL,
  `image_type` varchar(64) NOT NULL,
  `image_content` mediumblob NOT NULL,
  `image_size` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_image`
--

INSERT INTO `gs_kadai_image` (`image_id`, `image_name`, `image_type`, `image_content`, `image_size`, `created_at`) VALUES

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_table`
--

CREATE TABLE `gs_kadai_table` (
  `id` int(12) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `book_url` text NOT NULL,
  `book_comment` text NOT NULL,
  `reg_date` datetime NOT NULL,
  `image` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_table`
--

INSERT INTO `gs_kadai_table` (`id`, `book_name`, `book_url`, `book_comment`, `reg_date`, `image`) VALUES
(1, 'わたなべ', 'ここ', 'ここ', '2023-12-11 00:37:22', NULL),
(2, 'a', '  a', 'aaassssss', '2024-01-02 21:47:48', NULL),
(12, 'AA', '', '', '2023-12-23 13:03:59', NULL),
(14, '', '', '', '2024-01-14 17:38:57', NULL),
(15, 'AA', 'DDDD', 'okokkkook', '2024-01-14 20:17:04', ''),
(16, 'ABC', 'ABC', 'ABBBCCC', '2024-01-14 20:19:31', 'img/65a3c343be459.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_kadai_user_table`
--

CREATE TABLE `gs_kadai_user_table` (
  `id` int(12) NOT NULL,
  `u_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `u_pw` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_kadai_user_table`
--

INSERT INTO `gs_kadai_user_table` (`id`, `u_name`, `u_id`, `u_pw`, `life_flg`, `indate`) VALUES
(1, '渡辺', 'watanabe', 'test1', 0, '2024-01-03 04:21:35'),
(2, 'wata', 'ikkei', 'test', 0, '0000-00-00 00:00:00'),
(6, 'tttt', 'ikkei2', '$2y$10$eOUOJbX5f//5C6Y.UBDyVO.QldRdDQifOOvboXzyeO6gILAYOr.ie', 0, '0000-00-00 00:00:00'),
(7, '渡辺さん', 'watanabesan', '$2y$10$MlZz9p6yLKD7i5FDHWEIw.1gXNOhZHSkvW2Nz8MbCwS7a7tybWY7u', 0, '0000-00-00 00:00:00'),
(8, '渡辺さん', 'watanabe-san', '$2y$10$7SCnjlmKK1PtebGggzQPTuuylwZpATVc1cD1feq/4Ow3ye2ao3Aka', 0, '0000-00-00 00:00:00'),
(9, '', '', '', 0, '2024-01-14 09:46:18'),
(10, 'wata', 'ikkei', '$2y$10$DERlB1NDuC8lxhKDA8Eovuniq0f5PzcC96VE/91xC2U4Mie2t/Mpa', 0, '0000-00-00 00:00:00'),
(11, 'わた', 'wata', '$2y$10$RAOW/GbV9i12VkHdLsXLj.3GmybkLeTyEuxnC9R4kLfH8iesDPbTC', 0, '0000-00-00 00:00:00');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_kadai_image`
--
ALTER TABLE `gs_kadai_image`
  ADD PRIMARY KEY (`image_id`);

--
-- テーブルのインデックス `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_kadai_user_table`
--
ALTER TABLE `gs_kadai_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_kadai_image`
--
ALTER TABLE `gs_kadai_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `gs_kadai_table`
--
ALTER TABLE `gs_kadai_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `gs_kadai_user_table`
--
ALTER TABLE `gs_kadai_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;