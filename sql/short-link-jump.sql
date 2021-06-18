-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-06-18 15:12:40
-- 服务器版本： 8.0.12
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `short-link-jump`
--

-- --------------------------------------------------------

--
-- 表的结构 `jump_link`
--

CREATE TABLE `jump_link` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jump_url` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '需要跳转到url',
  `md5_data` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'url的md5值',
  `duration` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '持续时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT '是否删除'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='链接跳转数据表';

--
-- 转存表中的数据 `jump_link`
--

INSERT INTO `jump_link` (`id`, `jump_url`, `md5_data`, `duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '1231', '111', '0', '2021-06-16 08:24:46', '2021-06-16 08:24:46', NULL),
(4, '2131', '222', '0', '2021-06-16 08:24:46', '2021-06-16 08:24:46', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `jump_link`
--
ALTER TABLE `jump_link`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `jump_link`
--
ALTER TABLE `jump_link`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
