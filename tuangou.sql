-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2020-07-06 05:36:17
-- 服务器版本： 5.7.26
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `tuangou`
--

-- --------------------------------------------------------

-- 商圈表
-- 表的结构 `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '城市ID',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '子类ID',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商圈表';

-- --------------------------------------------------------

-- 商户表
-- 表的结构 `bis`
--

DROP TABLE IF EXISTS `bis`;
CREATE TABLE IF NOT EXISTS `bis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `licence_logo` varchar(255) NOT NULL DEFAULT '' COMMENT '营业执照图片',
  `description` text NOT NULL COMMENT '描述',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '城市ID',
  `city_path` varchar(50) NOT NULL DEFAULT '' COMMENT '城市联动',
  `bank_info` varchar(50) NOT NULL DEFAULT '' COMMENT '银行账号',
  `bank_name` varchar(50) NOT NULL DEFAULT '' COMMENT '开户行名称',
  `bank_user` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `faren` varchar(20) NOT NULL DEFAULT '' COMMENT '法人',
  `faren_tel` varchar(20) NOT NULL DEFAULT '' COMMENT '法人联系方式',
  `money` decimal(20,2) NOT NULL COMMENT '金额',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户表';

-- --------------------------------------------------------

-- 商户账号表
-- 表的结构 `bis_account` 
--

DROP TABLE IF EXISTS `bis_account`;
CREATE TABLE IF NOT EXISTS `bis_account` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `code` varchar(10) NOT NULL DEFAULT '' COMMENT '密码辅助',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商户ID',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `is_main` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否为总管理员',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `bis_id` (`bis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户账号表';

-- --------------------------------------------------------

-- 商户门店表
-- 表的结构 `bis_location`
--

DROP TABLE IF EXISTS `bis_location`;
CREATE TABLE IF NOT EXISTS `bis_location` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `tel` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `contact` varchar(20) NOT NULL DEFAULT '' COMMENT '联系人',
  `xpoint` varchar(20) NOT NULL DEFAULT '' COMMENT '经纬度 X',
  `ypoint` varchar(20) NOT NULL DEFAULT '' COMMENT '经纬度 Y',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商户ID',
  `open_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '营业时间',
  `content` text NOT NULL COMMENT '门店介绍',
  `is_main` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否为总店',
  `api_address` varchar(255) NOT NULL DEFAULT '0' COMMENT '地址',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `category_path` varchar(50) NOT NULL DEFAULT '' COMMENT '栏目联动',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '城市ID',
  `city_path` varchar(50) NOT NULL DEFAULT '' COMMENT '城市联动',
  `bank_info` varchar(50) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `city_id` (`city_id`),
  KEY `bis_id` (`bis_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商户门店表';

-- --------------------------------------------------------

-- 生活服务分类表
-- 表的结构 `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '子类ID',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='生活服务分类表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(1, '美食', 0, 111, 0, 1588147074, 1593591764),
(2, '娱乐', 1, 0, 1, 1588148315, 1593335898),
(3, '外卖', 0, 222, 1, 1588148743, 1593591775),
(4, '团购', 0, 555, 1, 1588148751, 1593591770),
(5, '超市', 0, 222, 1, 1588148762, 1593591779),
(6, '跑腿', 0, 0, -1, 1588148774, 1588148774),
(7, '111', 0, 333, -1, 1593479660, 1593586823),
(8, '111', 0, 0, -1, 1593479674, 1593586836),
(9, '大幅度发', 0, 222, -1, 1593479688, 1593587142),
(10, '222', 0, 1, -1, 1593483599, 1593586830),
(11, '会更好', 0, 444, 1, 1593587150, 1593591773),
(12, '广告费', 0, 0, 1, 1593587178, 1593587178),
(13, '发给', 0, 0, 0, 1593587248, 1593587248);

-- --------------------------------------------------------

-- 城市表
-- 表的结构 `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '中文名称',
  `uname` varchar(50) NOT NULL DEFAULT '' COMMENT '英文名称',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '子类ID',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市表';

-- --------------------------------------------------------

-- 团购商品表
-- 表的结构 `deal`
--

DROP TABLE IF EXISTS `deal`;
CREATE TABLE IF NOT EXISTS `deal` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '栏目ID',
  `se_category_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '二级栏目ID',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商户ID',
  `location_ids` varchar(100) NOT NULL DEFAULT '' COMMENT '所属店面',
  `image` varchar(200) NOT NULL DEFAULT '' COMMENT '商品图片',
  `description` text NOT NULL COMMENT '商品描述',
  `start_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '结束时间',
  `origin_price` decimal(20,2) NOT NULL COMMENT '商品原价',
  `current_price` decimal(20,2) NOT NULL COMMENT '折扣价',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '所属城市',
  `but_count` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '购买数量',
  `total_count` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商品库存',
  `coupons_end_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '团购券结束时间',
  `coupons_begin_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '团购券开始时间',
  `xpoint` varchar(20) NOT NULL DEFAULT '' COMMENT '经纬度 X',
  `ypoint` varchar(20) NOT NULL DEFAULT '' COMMENT '经纬度 Y',
  `bis_account_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '商户账号ID',
  `balance_price` decimal(20,2) NOT NULL COMMENT '平台结算价',
  `notes` text NOT NULL COMMENT '商品提示',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `name` (`name`) USING BTREE,
  KEY `city_id` (`city_id`) USING BTREE,
  KEY `bis_id` (`bis_id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `se_category_id` (`se_category_id`) USING BTREE,
  KEY `start_time` (`start_time`) USING BTREE,
  KEY `end_time` (`end_time`) USING BTREE,
  KEY `create_time` (`create_time`) USING BTREE,
  KEY `coupons_begin_time` (`coupons_begin_time`) USING BTREE,
  KEY `coupons_end_time` (`coupons_end_time`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='团购商品表' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

-- 推荐位表
-- 表的结构 `featured`
--

DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类',
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '标题',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '图片',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '网址',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐位表';

-- --------------------------------------------------------

-- 用户表
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `code` varchar(10) NOT NULL DEFAULT '' COMMENT '密码辅助',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
