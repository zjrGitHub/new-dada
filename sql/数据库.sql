-- --------------------------------------------------------
-- 主机:                           localhost
-- 服务器版本:                        5.5.53 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.5.0.5220
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 dada 的数据库结构
CREATE DATABASE IF NOT EXISTS `dada` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dada`;

-- 导出  表 dada.collect 结构
CREATE TABLE IF NOT EXISTS `collect` (
  `cid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '操作用户id',
  `username` char(20) NOT NULL COMMENT '用户名',
  `sid` int(10) NOT NULL COMMENT '分享用户id',
  `collecttimes` datetime DEFAULT NULL COMMENT '收藏时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态(1为正常，0为删除)',
  `collectnums` varchar(50) NOT NULL DEFAULT '0' COMMENT '收藏次数',
  `title` text NOT NULL COMMENT '收藏内容的title',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收藏表';

-- 正在导出表  dada.collect 的数据：0 rows
/*!40000 ALTER TABLE `collect` DISABLE KEYS */;
/*!40000 ALTER TABLE `collect` ENABLE KEYS */;

-- 导出  表 dada.dot 结构
CREATE TABLE IF NOT EXISTS `dot` (
  `did` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '操作用户id',
  `username` char(20) NOT NULL COMMENT '用户名',
  `sid` int(10) NOT NULL COMMENT '分享用户id',
  `dottimes` datetime DEFAULT NULL COMMENT '点赞时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态(1为正常，0为删除)',
  `dotnums` varchar(50) NOT NULL DEFAULT '0' COMMENT '点赞次数',
  `title` text COMMENT '点赞内容的title',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='点赞表';

-- 正在导出表  dada.dot 的数据：0 rows
/*!40000 ALTER TABLE `dot` DISABLE KEYS */;
/*!40000 ALTER TABLE `dot` ENABLE KEYS */;

-- 导出  表 dada.remark 结构
CREATE TABLE IF NOT EXISTS `remark` (
  `rid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '操作用户id（此时登陆的）',
  `username` char(20) NOT NULL COMMENT '用户名',
  `sid` int(10) NOT NULL COMMENT '分享用户id',
  `remarktimes` datetime DEFAULT NULL COMMENT '评论时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态(1为正常，0为删除)',
  `deltimes` datetime DEFAULT NULL COMMENT '删除时间',
  `content` text NOT NULL COMMENT '评论详情',
  `remarknums` varchar(50) NOT NULL DEFAULT '0' COMMENT '评论次数',
  `title` text NOT NULL COMMENT '评论内容的title',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表';

-- 正在导出表  dada.remark 的数据：0 rows
/*!40000 ALTER TABLE `remark` DISABLE KEYS */;
/*!40000 ALTER TABLE `remark` ENABLE KEYS */;

-- 导出  表 dada.share 结构
CREATE TABLE IF NOT EXISTS `share` (
  `sid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '操作用户id',
  `username` char(20) NOT NULL COMMENT '用户名',
  `title` text NOT NULL COMMENT '标题',
  `uploadtimes` datetime DEFAULT NULL COMMENT '上传时间',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '状态(1为正常，0为删除)',
  `deltimes` datetime DEFAULT NULL COMMENT '删除时间',
  `detail` text NOT NULL COMMENT '发布详情',
  `images` char(100) NOT NULL COMMENT '图片地址',
  `rid` int(10) NOT NULL COMMENT '评论ID',
  `did` int(10) NOT NULL COMMENT '点赞ID',
  `cid` int(10) NOT NULL COMMENT '收藏ID',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分享信息表';

-- 正在导出表  dada.share 的数据：0 rows
/*!40000 ALTER TABLE `share` DISABLE KEYS */;
/*!40000 ALTER TABLE `share` ENABLE KEYS */;

-- 导出  表 dada.users 结构
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` char(20) NOT NULL COMMENT '账号',
  `passwd` char(10) NOT NULL COMMENT '密码',
  `logintimes` datetime DEFAULT NULL COMMENT '登录时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态(1为正常，0为删除)',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户管理表';

-- 正在导出表  dada.users 的数据：0 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
