-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2014 at 07:56 上午
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vcrsy`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPhotos`(in num int)
begin
select * from photos where sign=0 order by date desc limit num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVideos`(in num int)
begin
select * from videos where sign=0 order by date desc limit num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertPhotos`(in idu char(50),in tit char(50),in des char(200), in aut char(50),in ads char(50),in len int,in sig bit,in ida char(11))
begin
insert into photos values (NULL,idu,tit,des,aut,now(),ads,len,sig,ida);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVideos`(in idu char(50),in tit char(50),in des char(200), in aut char(50),in typ char (50),in lan char(50),in len int,in ads char(50),in sig bit)
begin
insert into videos values (NULL,idu,tit,des,aut,now(),typ,lan,len,ads,sig);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectEmail`(in ema char(50))
begin
select email from user where email=ema;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUser`(IN `e` CHAR(50))
begin
select iduser,email,nickname,rank,reg_date from user where email=e;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `testUser`(in e char(50), in p char(50))
begin
select iduser,email,rank from user where email=e and password=p;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`idarticle` int(11) NOT NULL COMMENT '文章编号',
  `iduser` int(11) NOT NULL COMMENT '文章编号',
  `title` char(50) CHARACTER SET latin1 NOT NULL COMMENT '文章名称',
  `content` text CHARACTER SET latin1 NOT NULL COMMENT '内容',
  `author` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT '作者',
  `date` datetime NOT NULL COMMENT '发表日期',
  `length` int(11) NOT NULL COMMENT '大小',
  `sign` bit(1) NOT NULL DEFAULT b'1' COMMENT '标记（草稿/正式发表）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `articles_has_labels`
--

CREATE TABLE IF NOT EXISTS `articles_has_labels` (
  `idarticle` int(11) NOT NULL COMMENT '文章编号',
  `idlabel` int(11) NOT NULL COMMENT '标签编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
`idlabel` int(11) NOT NULL COMMENT '标签编号',
  `iduser` int(11) NOT NULL COMMENT '创建标签者',
  `content` char(50) CHARACTER SET latin1 NOT NULL COMMENT '标签内容',
  `date` datetime NOT NULL COMMENT '标签产生的日期',
  `hot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '标签热度'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `iduser1` int(11) NOT NULL COMMENT '发送者',
  `iduser2` int(11) NOT NULL COMMENT '接收者',
  `date` datetime NOT NULL COMMENT '发送日期',
  `contents` text NOT NULL COMMENT '消息内容',
  `sign` tinyint(4) DEFAULT '1',
  `accept` bit(1) NOT NULL DEFAULT b'1' COMMENT '接收标志位(标志消息是否已经被接\r\n收,默认未被接收)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8
/*!50100 PARTITION BY RANGE (YEAR(date))
(PARTITION part0 VALUES LESS THAN (201410) ENGINE = InnoDB,
 PARTITION part1 VALUES LESS THAN (201502) ENGINE = InnoDB,
 PARTITION part2 VALUES LESS THAN (201506) ENGINE = InnoDB,
 PARTITION part3 VALUES LESS THAN (201510) ENGINE = InnoDB,
 PARTITION part4 VALUES LESS THAN (201602) ENGINE = InnoDB,
 PARTITION part5 VALUES LESS THAN (201606) ENGINE = InnoDB,
 PARTITION part6 VALUES LESS THAN (201610) ENGINE = InnoDB,
 PARTITION part7 VALUES LESS THAN (201702) ENGINE = InnoDB) */;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`iduser1`, `iduser2`, `date`, `contents`, `sign`, `accept`) VALUES
(1, 1, '2014-08-31 13:54:29', '你好', 0, b'0'),
(1, 1, '2014-08-31 13:55:20', '你好', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
`idphoto` int(11) NOT NULL COMMENT '图片编号',
  `iduser` int(11) NOT NULL COMMENT '用户id',
  `title` char(50) CHARACTER SET latin1 NOT NULL COMMENT '标题',
  `description` char(200) CHARACTER SET latin1 DEFAULT NULL COMMENT '简介',
  `author` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT '作者（为空时默认上传者为作者）',
  `date` datetime NOT NULL COMMENT '上传日期',
  `address` char(50) CHARACTER SET latin1 NOT NULL COMMENT '地址',
  `length` int(11) NOT NULL COMMENT '大小',
  `sign` bit(1) DEFAULT b'1' COMMENT '标记（草稿/正式发表）',
  `idarticle` int(11) DEFAULT NULL COMMENT '文章编号'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`idphoto`, `iduser`, `title`, `description`, `author`, `date`, `address`, `length`, `sign`, `idarticle`) VALUES
(1, 1, 'IMG_20140410_220022.jpg', NULL, NULL, '2014-08-31 12:00:59', 'upload/310980654@qq.com/10389659.jpg', 780322, b'1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos_has_labels`
--

CREATE TABLE IF NOT EXISTS `photos_has_labels` (
  `idphoto` int(11) NOT NULL COMMENT '图片编号',
  `idlabel` int(11) NOT NULL COMMENT '标签编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `iduser1` int(11) NOT NULL COMMENT '关注者',
  `iduser2` int(11) NOT NULL COMMENT '被关注者',
  `sign` tinyint(4) DEFAULT NULL COMMENT '关系类型(0表示1关注2,1表示1和2互相关注,设为tingint型方便后期扩展关系类型如:师从)',
  `date` datetime NOT NULL COMMENT '关系建立时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`iduser1`, `iduser2`, `sign`, `date`) VALUES
(1, 1, 0, '2014-08-31 13:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` int(11) NOT NULL COMMENT '用户ID',
  `email` char(50) CHARACTER SET latin1 NOT NULL COMMENT '邮箱',
  `nickname` char(50) CHARACTER SET latin1 NOT NULL COMMENT '姓名',
  `password` char(50) CHARACTER SET latin1 NOT NULL COMMENT '密码',
  `reg_date` datetime NOT NULL COMMENT '注册日期',
  `rank` tinyint(4) DEFAULT '1' COMMENT '等级'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `nickname`, `password`, `reg_date`, `rank`) VALUES
(1, '310980654@qq.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2014-08-30 22:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_labels`
--

CREATE TABLE IF NOT EXISTS `user_labels` (
  `iduser` int(11) NOT NULL COMMENT '用户id',
  `idlabel` int(11) NOT NULL COMMENT '标签id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`idvideo` int(11) NOT NULL COMMENT '影片编号',
  `iduser` int(11) NOT NULL COMMENT '用户id',
  `title` char(50) CHARACTER SET latin1 NOT NULL COMMENT '片名',
  `description` char(200) CHARACTER SET latin1 DEFAULT NULL COMMENT '影片简介',
  `author` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT '作者',
  `date` datetime NOT NULL COMMENT '上传时间',
  `type` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT '影片类型(科幻/惊悚......)',
  `language` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT '语言',
  `length` int(11) NOT NULL COMMENT '影片长度',
  `address` char(50) CHARACTER SET latin1 NOT NULL COMMENT '影片地址',
  `sign` bit(1) DEFAULT b'1' COMMENT '标记（草稿/正式发表）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `videos_has_labels`
--

CREATE TABLE IF NOT EXISTS `videos_has_labels` (
  `idvedio` int(11) NOT NULL COMMENT '影片编号',
  `idlabel` int(11) NOT NULL COMMENT '标签编号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`idarticle`);

--
-- Indexes for table `articles_has_labels`
--
ALTER TABLE `articles_has_labels`
 ADD PRIMARY KEY (`idarticle`,`idlabel`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
 ADD PRIMARY KEY (`idlabel`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`date`,`iduser1`,`iduser2`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
 ADD PRIMARY KEY (`idphoto`);

--
-- Indexes for table `photos_has_labels`
--
ALTER TABLE `photos_has_labels`
 ADD PRIMARY KEY (`idphoto`,`idlabel`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
 ADD PRIMARY KEY (`iduser1`,`iduser2`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_labels`
--
ALTER TABLE `user_labels`
 ADD PRIMARY KEY (`iduser`,`idlabel`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`idvideo`);

--
-- Indexes for table `videos_has_labels`
--
ALTER TABLE `videos_has_labels`
 ADD PRIMARY KEY (`idvedio`,`idlabel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章编号';
--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
MODIFY `idlabel` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签编号';
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
MODIFY `idphoto` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片编号',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT COMMENT '影片编号';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
