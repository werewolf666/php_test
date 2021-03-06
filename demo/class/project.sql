-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2019-01-29 18:04:48
-- 服务器版本： 5.6.30-1
-- PHP Version: 5.6.26-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` char(32) NOT NULL,
  `last_login_ip` int(11) NOT NULL,
  `last_login_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`, `last_login_ip`, `last_login_time`) VALUES
(1, 'aa', '4124bc0a9335c27f086f24ba207a4912', 2130706433, 1548752821);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id',
  `name` varchar(50) NOT NULL COMMENT '类别名称',
  `sort_order` int(11) NOT NULL DEFAULT '50' COMMENT '排序',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT '父级id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `parent_id`) VALUES
(1, '图像，音响，数字商品', 50, 0),
(2, '家用电器', 50, 0),
(3, '手机数码', 50, 0),
(4, '电子书', 50, 1),
(5, '数字音乐', 50, 1),
(6, '励志', 50, 4),
(7, '文学', 50, 4),
(8, '家电', 50, 2),
(10, '电视机', 30, 0),
(11, '电视1', 30, 8),
(12, '电视机1', 30, 8);

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE `goods` (
  `goodsid` int(10) UNSIGNED NOT NULL COMMENT '商品编号',
  `name` varchar(50) NOT NULL COMMENT '商品名称',
  `price` decimal(10,2) NOT NULL COMMENT '商品价格',
  `img` varchar(500) DEFAULT NULL COMMENT '源图地址',
  `img_thumb_sm` varchar(200) DEFAULT NULL COMMENT '缩略图1',
  `img_thumb_mid` varchar(200) DEFAULT NULL COMMENT '缩略图2',
  `categoryid` int(10) UNSIGNED NOT NULL COMMENT '商品类别id',
  `status` set('best','new','hot') NOT NULL COMMENT '商品类别 精品,新品,热销',
  `goods_desc` text COMMENT '商品描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`goodsid`, `name`, `price`, `img`, `img_thumb_sm`, `img_thumb_mid`, `categoryid`, `status`, `goods_desc`) VALUES
(3, '电脑', 200.00, NULL, '2019-01-29/sm_upload_5c4fdf5e92f4a7.61736853.jpg', '2019-01-29/mid_upload_5c4fdf5e92f4a7.61736853.jpg', 1, 'best,new', '电脑'),
(4, '1', 1.00, NULL, '2019-01-29/sm_upload_5c4fefa447ef88.64530492.jpg', '2019-01-29/mid_upload_5c4fefa447ef88.64530492.jpg', 1, 'best,new', '1'),
(5, '2', 2.00, NULL, '2019-01-29/sm_upload_5c4fefb495c9a8.20591532.jpg', '2019-01-29/mid_upload_5c4fefb495c9a8.20591532.jpg', 1, 'best', '2'),
(6, '3', 3.00, NULL, '2019-01-29/sm_upload_5c4fefce8f9d77.66132134.jpg', '2019-01-29/mid_upload_5c4fefce8f9d77.66132134.jpg', 1, 'best,new', '3'),
(7, '4', 4.00, NULL, '2019-01-29/sm_upload_5c4fefe1d7b115.21888869.jpg', '2019-01-29/mid_upload_5c4fefe1d7b115.21888869.jpg', 0, 'best', '4'),
(8, '5', 5.00, NULL, '2019-01-29/sm_upload_5c4ff00eb47fd0.94724261.jpg', '2019-01-29/mid_upload_5c4ff00eb47fd0.94724261.jpg', 1, 'new', '5');

-- --------------------------------------------------------

--
-- 表的结构 `my_goods`
--

CREATE TABLE `my_goods` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` decimal(10,2) DEFAULT '1.00',
  `inv` int(11) DEFAULT NULL COMMENT '库存'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_goods`
--

INSERT INTO `my_goods` (`id`, `name`, `price`, `inv`) VALUES
(1, 'iphone6s', 5288.00, 90),
(2, 's6', 9888.00, 95);

-- --------------------------------------------------------

--
-- 表的结构 `my_order`
--

CREATE TABLE `my_order` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL COMMENT '商品id',
  `g_num` int(11) DEFAULT NULL COMMENT '商品数量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_order`
--

INSERT INTO `my_order` (`id`, `g_id`, `g_num`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 1, 10);

--
-- 触发器 `my_order`
--
DELIMITER $$
CREATE TRIGGER `after_order` AFTER INSERT ON `my_order` FOR EACH ROW begin
    
    update my_goods set inv = inv - new.g_num where id = new.g_id;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_order` BEFORE INSERT ON `my_order` FOR EACH ROW begin



select inv from my_goods where id = new.g_id into @inv;


if @inv < new.g_num then

insert into XXX values(XXX);

end if;

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `pr_admin`
--

CREATE TABLE `pr_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL COMMENT '用户名：具有唯一性',
  `password` char(32) NOT NULL COMMENT '用户密码不能为空md5加密'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pr_admin`
--

INSERT INTO `pr_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `sess`
--

CREATE TABLE `sess` (
  `sess_id` varchar(32) NOT NULL,
  `sess_value` text NOT NULL,
  `sess_expires` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sess`
--

INSERT INTO `sess` (`sess_id`, `sess_value`, `sess_expires`) VALUES
('2e1a273t832iobdtl69lv88060', 'code|s:4:\"lHL6\";admin|a:5:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:2:\"aa\";s:3:\"pwd\";s:32:\"4124bc0a9335c27f086f24ba207a4912\";s:13:\"last_login_ip\";s:10:\"2130706433\";s:15:\"last_login_time\";s:10:\"1548222769\";}', 1548224735),
('41or81erngd8i4m37h7gc3bl94', 'code|s:4:\"J95L\";admin|a:5:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:2:\"aa\";s:3:\"pwd\";s:32:\"4124bc0a9335c27f086f24ba207a4912\";s:13:\"last_login_ip\";s:10:\"2130706433\";s:15:\"last_login_time\";s:10:\"1548737075\";}', 1548736969),
('49f92vir01v7pii2h4ceg7egd5', 'code|s:4:\"t31c\";admin|a:5:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:2:\"aa\";s:3:\"pwd\";s:32:\"4124bc0a9335c27f086f24ba207a4912\";s:13:\"last_login_ip\";s:10:\"2130706433\";s:15:\"last_login_time\";s:10:\"1548224741\";}', 1548320390),
('504q853dk54n1b14ejtbf1ogh6', '', 1548065427),
('6g2dj0o8ku7jr9e963c39ee583', '', 1548063825),
('8gd2el74j4mvhtdlorijnbuvv1', 'code|s:4:\"23cE\";', 1548404298),
('a0fls9elajhedlnijefo0ph0q2', 'admin|a:5:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:2:\"aa\";s:3:\"pwd\";s:32:\"4124bc0a9335c27f086f24ba207a4912\";s:13:\"last_login_ip\";s:10:\"2130706433\";s:15:\"last_login_time\";s:10:\"1547809837\";}', 1547809974),
('Array', 'alex', 1548139829),
('b8tf93vom5gbbmpf5tkfkc9ac3', 'code|s:4:\"E9NI\";', 1548139684),
('ia2u7o9fjnr5d9p2ug00pq4732', 'code|s:4:\"gHaR\";', 1548134974),
('jjer6clp3klmf6fltpvhasqq70', 'code|s:4:\"uoAz\";', 1548072259),
('kj8qrn34vblvbsfpmk4iug4bp4', '', 1548048927),
('r1ffr579vvj86soigbbm9dff22', 'admin|a:5:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:2:\"aa\";s:3:\"pwd\";s:32:\"4124bc0a9335c27f086f24ba207a4912\";s:13:\"last_login_ip\";s:10:\"2130706433\";s:15:\"last_login_time\";s:10:\"1548055102\";}', 1548054994),
('tsn3o55lb8i8dteuurqm3c6t23', '', 1548070600);

-- --------------------------------------------------------

--
-- 表的结构 `sline_member`
--

CREATE TABLE `sline_member` (
  `mid` mediumint(8) UNSIGNED NOT NULL,
  `mtype` varchar(20) DEFAULT NULL COMMENT '会员类型(弃用)',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `pwd` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `truename` varchar(36) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密' COMMENT '姓名',
  `rank` smallint(5) UNSIGNED NOT NULL DEFAULT '0' COMMENT '会员等级',
  `money` double(16,2) NOT NULL DEFAULT '0.00' COMMENT '钱包总额',
  `email` char(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `mobile` varchar(15) NOT NULL DEFAULT '' COMMENT '手机号',
  `jifen` mediumint(8) UNSIGNED NOT NULL DEFAULT '0' COMMENT '积分',
  `litpic` varchar(255) NOT NULL DEFAULT '' COMMENT '会员头像',
  `safequestion` varchar(255) NOT NULL DEFAULT '0' COMMENT '安全问题',
  `safeanswer` char(30) NOT NULL DEFAULT '' COMMENT '安全答案',
  `jointime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '加入时间',
  `joinip` char(16) NOT NULL DEFAULT '' COMMENT '加入ip',
  `logintime` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上次登陆时间',
  `loginip` char(16) NOT NULL DEFAULT '' COMMENT '登陆ip',
  `checkmail` smallint(6) NOT NULL DEFAULT '0' COMMENT 'email是否通过验证',
  `checkphone` int(1) UNSIGNED DEFAULT '0' COMMENT '手机是否验证',
  `province` varchar(50) DEFAULT NULL COMMENT '省份',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `cardid` varchar(20) DEFAULT NULL COMMENT '身份证号',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `postcode` varchar(8) DEFAULT NULL COMMENT '邮政编码',
  `connectid` varchar(255) DEFAULT '' COMMENT '第三方登陆连接id',
  `from` varchar(255) DEFAULT '' COMMENT '新浪/QQ登陆',
  `remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  `regtype` tinyint(1) DEFAULT '0' COMMENT '注册类型(0为手机，1为邮箱)',
  `constellation` char(3) DEFAULT NULL COMMENT '星座',
  `qq` char(15) DEFAULT NULL COMMENT 'QQ号',
  `signature` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `birth_date` char(10) DEFAULT NULL COMMENT '出生年月',
  `idcard_pic` varchar(255) DEFAULT NULL COMMENT '身份证照片url地址',
  `verifystatus` tinyint(1) DEFAULT '0' COMMENT '实名认证状态，0->未认证，1->审核中,2->通过,3->未通过',
  `wechat` char(50) DEFAULT NULL COMMENT '微信号',
  `native_place` char(30) DEFAULT NULL COMMENT '籍贯',
  `money_frozen` double(15,2) DEFAULT '0.00' COMMENT '冻结金额',
  `virtual` int(2) DEFAULT '1' COMMENT '是否为虚拟用户 1普通用户 2虚拟用户',
  `reg_from` int(2) DEFAULT NULL COMMENT '默认null:未知,0,admin,1,pc;2,mobile;3,wx;4,xcx,',
  `reg_time` int(10) DEFAULT NULL COMMENT '注册时间,默认未知'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

--
-- 转存表中的数据 `sline_member`
--

INSERT INTO `sline_member` (`mid`, `mtype`, `nickname`, `pwd`, `truename`, `sex`, `rank`, `money`, `email`, `mobile`, `jifen`, `litpic`, `safequestion`, `safeanswer`, `jointime`, `joinip`, `logintime`, `loginip`, `checkmail`, `checkphone`, `province`, `city`, `cardid`, `address`, `postcode`, `connectid`, `from`, `remarks`, `regtype`, `constellation`, `qq`, `signature`, `birth_date`, `idcard_pic`, `verifystatus`, `wechat`, `native_place`, `money_frozen`, `virtual`, `reg_from`, `reg_time`) VALUES
(2, NULL, '退銗しovё', '43ec517d68b6edd3015b3edc9a11367b', '', '保密', 0, 456.00, '', '', 0, '//thirdwx.qlogo.cn/mmopen/vi_32/LricIxYhlhvg7sG2a5cYBcXe7pRjibt4c3ibOnNbygGicO5N1MxKYAp2Dn9bnl0WQrRxoLxlxAR8jiaS8wNU4brrp1g/132', '0', '', 1531817408, '', 1545716681, '220.197.193.145', 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0.00, 1, NULL, NULL),
(3, NULL, '时代+梁山伯', '168908dd3227b8358eababa07fcaf091', '', '保密', 0, 0.00, '', '', 0, '//thirdwx.qlogo.cn/mmopen/vi_32/XgDtWeiaKW61RJkmTY4SicXoCibqJjRP8kobEGQdYI2iaibLkw3yDVicQRk5ia3Xl29BTy30uXSKyQ08hNNOJ4BbzalXQ/132', '0', '', 1531819177, '', 1545663725, '58.16.228.19', 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0.00, 1, NULL, NULL),
(4, NULL, '18786***', '4de237c9e64ede19627423ee3734bc28', '', '保密', 0, 0.00, '', '187867442476', 0, '', '0', '', 1531891645, '1.204.210.4', 1531891645, '', 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0.00, 1, NULL, NULL),
(5, NULL, 'HMQ', '1ce927f875864094e3906a4a0b5ece68', '', '保密', 0, 0.00, '', '', 0, '//thirdwx.qlogo.cn/mmopen/vi_32/gt7f11MRWxmCiaSXxicx4h26mWUf3lv3r8ia3sPkLzpIqgBiaT1mhWQZBGSYxJCkImzuuPcRkA2lXKvbDKCgawjqew/132', '0', '', 1531893661, '', 1545468384, '223.104.94.225', 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0.00, 1, NULL, NULL),
(6, NULL, '不负倾城时光', '0266e33d3f546cb5436a10798e657d97', '', '保密', 0, 0.00, '', '', 0, '//thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTL3Sp9KvfNyDHdcEG9NOgSPYtibCa9icnB5EwQGBbdkDRaHRibXdkHJRlXanBaIOeMpk21SkNOCFdX9g/132', '0', '', 1531893678, '', 1545736222, '117.188.14.91', 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0.00, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goodsid`);

--
-- Indexes for table `my_goods`
--
ALTER TABLE `my_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_admin`
--
ALTER TABLE `pr_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `sess`
--
ALTER TABLE `sess`
  ADD PRIMARY KEY (`sess_id`);

--
-- Indexes for table `sline_member`
--
ALTER TABLE `sline_member`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `logintime` (`logintime`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `goodsid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品编号', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `my_goods`
--
ALTER TABLE `my_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `my_order`
--
ALTER TABLE `my_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `pr_admin`
--
ALTER TABLE `pr_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sline_member`
--
ALTER TABLE `sline_member`
  MODIFY `mid` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
