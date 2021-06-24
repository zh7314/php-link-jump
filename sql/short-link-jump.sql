-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-06-24 19:23:55
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
  `jump_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '需要跳转到url',
  `md5_data` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'url的md5值',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  `deleted_at` datetime DEFAULT NULL COMMENT '是否删除',
  `short_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '短连接ID 62进制',
  `end_time` datetime DEFAULT NULL COMMENT '最后存活时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='链接跳转数据表';

--
-- 转存表中的数据 `jump_link`
--

INSERT INTO `jump_link` (`id`, `jump_url`, `md5_data`, `created_at`, `updated_at`, `deleted_at`, `short_id`, `end_time`) VALUES
(3, '1231', '111', '2021-06-16 16:24:46', '2021-06-16 16:24:46', NULL, '', NULL),
(4, '2131', '222', '2021-06-16 16:24:46', '2021-06-18 18:40:20', '2021-06-30 18:40:18', '', NULL),
(5, 'https%3A%2F%2Fwww.baidu.com%2F', 'e81c1f5749545c5f7d247b3a100ffe62', '2021-06-24 19:15:54', '2021-06-24 19:15:54', NULL, '5', '2021-06-30 00:00:00'),
(6, 'https%3A%2F%2Fwww.baidu.com%2F', 'e81c1f5749545c5f7d247b3a100ffe62', '2021-06-24 19:22:45', '2021-06-24 19:22:45', NULL, '6', '2021-06-30 00:00:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
