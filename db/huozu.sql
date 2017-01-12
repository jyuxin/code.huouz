/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : huozu

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-30 23:37:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ji_admin
-- ----------------------------
DROP TABLE IF EXISTS `ji_admin`;
CREATE TABLE `ji_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `login_name` varchar(255) NOT NULL DEFAULT '' COMMENT '登录名（md5加密）',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of ji_admin
-- ----------------------------
INSERT INTO `ji_admin` VALUES ('1', '11', '11', '22', '33');
INSERT INTO `ji_admin` VALUES ('2', '11', '', '', '0');

-- ----------------------------
-- Table structure for ji_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `ji_admin_menu`;
CREATE TABLE `ji_admin_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `parent_id` int(11) NOT NULL COMMENT '父id[上级id]',
  `layer_path` varchar(255) NOT NULL DEFAULT '' COMMENT '层级路径',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `controller` varchar(30) NOT NULL DEFAULT '' COMMENT '模块[类名]',
  `method` varchar(30) NOT NULL DEFAULT '' COMMENT '方法',
  `param` varchar(255) NOT NULL DEFAULT '' COMMENT '参数',
  `usort` int(11) NOT NULL COMMENT '自定义排序',
  `utime` int(11) NOT NULL COMMENT '更新时间',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of ji_admin_menu
-- ----------------------------
INSERT INTO `ji_admin_menu` VALUES ('1', '0', '0', '内容管理', 'article', 'index', '', '0', '0', '1467964252');
INSERT INTO `ji_admin_menu` VALUES ('2', '1', '0-1', '文章管理', 'article', 'index', '', '0', '0', '1467964312');
INSERT INTO `ji_admin_menu` VALUES ('3', '1', '0-1', '图片管理', 'photo', 'index', '', '0', '1477748971', '1467964962');
INSERT INTO `ji_admin_menu` VALUES ('4', '2', '0-1-2', '文章列表', 'article', 'index', '', '0', '1477748991', '1477636631');
INSERT INTO `ji_admin_menu` VALUES ('5', '4', '0-1-2-4', '编辑', 'article', 'edit', '', '0', '1477751820', '1477637969');
INSERT INTO `ji_admin_menu` VALUES ('6', '0', '0', '后台', 'admin', 'index', '', '0', '0', '1477744387');
INSERT INTO `ji_admin_menu` VALUES ('7', '6', '0-6', '管理员', 'admin', 'index', '', '0', '0', '1477744433');
INSERT INTO `ji_admin_menu` VALUES ('8', '7', '0-6-7', '管理员管理', 'admin', 'index', '', '0', '0', '1477744468');
INSERT INTO `ji_admin_menu` VALUES ('9', '7', '0-6-7', '后台菜单', 'menu', 'index', '', '0', '0', '1477744555');
INSERT INTO `ji_admin_menu` VALUES ('10', '9', '0-6-7-9', '编辑', 'menu', 'edit', '', '0', '1477748159', '1477746026');
INSERT INTO `ji_admin_menu` VALUES ('11', '3', '0-1-3', '图片列表', 'photo', 'index', '', '0', '1477749020', '1477749020');
INSERT INTO `ji_admin_menu` VALUES ('12', '0', '0', '主页', 'index', 'index', '', '0', '1477749210', '1477749210');
INSERT INTO `ji_admin_menu` VALUES ('13', '12', '0-12', '个人管理', 'index', 'index', '', '0', '1477749258', '1477749258');
INSERT INTO `ji_admin_menu` VALUES ('14', '13', '0-12-13', '个人资料', 'index', 'index', '', '0', '1477749286', '1477749286');
INSERT INTO `ji_admin_menu` VALUES ('15', '13', '0-12-13', '修改密码', 'index', 'password', '', '0', '1477749321', '1477749321');

-- ----------------------------
-- Table structure for ji_article
-- ----------------------------
DROP TABLE IF EXISTS `ji_article`;
CREATE TABLE `ji_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `picture` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图片',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '正文',
  `utime` int(11) NOT NULL COMMENT '更新时间',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of ji_article
-- ----------------------------
INSERT INTO `ji_article` VALUES ('1', '222', '', '', '', '', '0', '1472486084');
INSERT INTO `ji_article` VALUES ('2', '222', '', '', '', '', '1472486140', '1472486140');
INSERT INTO `ji_article` VALUES ('3', '333', '', '', '', '', '1472486170', '1472486170');
INSERT INTO `ji_article` VALUES ('4', '123p', '', '4456p', '2134p', '<p>132456</p>', '1477841479', '1472894060');
INSERT INTO `ji_article` VALUES ('5', '123p', '', '4456p', '2134p', '<h1><img src=\"http://img.baidu.com/hi/jx2/j_0001.gif\" _src=\"http://img.baidu.com/hi/jx2/j_0001.gif\"/>1132456787897878</h1><p>jkjhkjhkj开发看到辅导辅导fddfkm<br/></p><p>的看法快递费的发的麻烦的<span id=\"_baidu_bookmark_start_0\" style=\"display: none; line-height: 0px;\">‍</span><span id=\"_baidu_bookmark_start_2\" style=\"display: none; line-height: 0px;\">‍</span><img src=\"http://code.taobao/public/extend/umeditor/php/upload/20160920/1474300896184.jpg\" _src=\"http://code.taobao/public/extend/umeditor/php/upload/20160920/1474300896184.jpg\" style=\"width: 210px; height: 201px;\"/><span id=\"_baidu_bookmark_end_3\" style=\"display: none; line-height: 0px;\">‍</span><span id=\"_baidu_bookmark_end_1\" style=\"display: none; line-height: 0px;\">‍</span></p>', '1474301349', '1474299444');

-- ----------------------------
-- Table structure for ji_photo
-- ----------------------------
DROP TABLE IF EXISTS `ji_photo`;
CREATE TABLE `ji_photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '图片标题',
  `picture` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `picture_list` text NOT NULL COMMENT '图片（多个）',
  `utime` int(11) NOT NULL COMMENT '更新时间',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片表';

-- ----------------------------
-- Records of ji_photo
-- ----------------------------
