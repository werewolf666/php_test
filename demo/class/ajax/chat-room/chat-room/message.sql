-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2019-02-26 00:42:03
-- 服务器版本: 5.5.54-log
-- PHP 版本: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `project`
--

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  `sender` varchar(32) NOT NULL DEFAULT '',
  `receiver` varchar(32) NOT NULL DEFAULT '',
  `color` char(7) NOT NULL DEFAULT '',
  `biaoqing` varchar(32) NOT NULL DEFAULT '',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `msg`, `sender`, `receiver`, `color`, `biaoqing`, `add_time`) VALUES
(1, '晚上一起玩球去', 'tom', 'linken', '#774592', '高兴地', '2015-03-28 16:03:05'),
(2, '不去了，敲代码', 'linken', 'tom', '#77F316', '遗憾地', '2015-03-28 16:04:20'),
(3, '晚上一起玩球去', 'tom', 'linken', '#77FFEE', '高兴地', '2015-03-28 16:03:05'),
(4, '不去了，敲代码', 'linken', 'tom', '#77FFEE', '遗憾地', '2015-03-28 16:04:20'),
(5, '晚上一起玩球去', 'tom', 'linken', '#77F873', '高兴地', '2015-03-28 16:03:05'),
(6, '不去了，敲代码', 'linken', 'tom', '#77F128', '遗憾地', '2015-03-28 16:04:20'),
(7, 'hello,tom', 'aa', 'bb', '#0000', 'smile', '2019-02-13 00:00:00'),
(8, 'bbhhel', '22', '33', '', '微笑的', '2019-02-07 00:00:00'),
(9, 'bbhhel', '22', '33', '', '微笑的', '2019-02-07 00:00:00'),
(10, 'bbhhel', '22', '33', '', '微笑的', '2019-02-07 00:00:32'),
(11, '小情趣', 'gatsby', '帅哥：成就梦想', '#A52A2A', '很无辜', '2019-02-25 11:02:44'),
(12, '大大的妹妹', 'gatsby', '帅哥：恶魔', '#4400B3', '自言自语', '2019-02-25 11:02:26'),
(13, '小小的妹子', 'gatsby', '帅哥：诸葛', '#00BBFF', '有点脸红', '2019-02-25 11:02:08'),
(14, '锄禾日当午', 'gatsby', '靓妹：甜甜', '#DC143C', '很不服气', '2019-02-25 11:02:49'),
(15, '汗滴禾下土', 'gatsby', '帅哥：恶魔', '#A52A2A', '幸灾乐祸', '2019-02-25 11:02:28'),
(16, '铳枪', 'gatsby', '帅哥：诸葛', '#FF0000', '神秘兮兮', '2019-02-25 11:02:03'),
(17, '擦汗审查', 'gatsby', '帅哥：恶魔', '#DC143C', '幸灾乐祸', '2019-02-25 11:02:23'),
(18, 'dfd', 'gatsby', '靓妹：甜甜', '#FF0000', '不怀好意', '2019-02-25 11:02:05'),
(19, 'asxsaxsax', 'gatsby', '帅哥：恶魔', '#800080', '不怀好意', '2019-02-25 11:02:03'),
(20, '你好呀', 'gatsby', '帅哥：恶魔', '#FF0000', '很不服气', '2019-02-25 11:02:20'),
(21, '我很好', 'gatsby', '帅哥：恶魔', '#D2691E', '很不服气', '2019-02-26 12:02:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
