/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : onethink

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-08 08:55:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for onethink_document
-- ----------------------------
DROP TABLE IF EXISTS `onethink_document`;
CREATE TABLE `onethink_document` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `name` char(40) NOT NULL DEFAULT '' COMMENT '标识',
  `title` char(80) NOT NULL DEFAULT '' COMMENT '标题',
  `category_id` int(10) unsigned NOT NULL COMMENT '所属分类',
  `group_id` smallint(3) unsigned NOT NULL COMMENT '所属分组',
  `description` char(140) NOT NULL DEFAULT '' COMMENT '描述',
  `root` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '根节点',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属ID',
  `model_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '内容模型ID',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT '内容类型',
  `position` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '推荐位',
  `link_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '外链',
  `cover_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '封面',
  `display` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '可见性',
  `deadline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '截至时间',
  `attach` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件数量',
  `view` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览量',
  `comment` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `extend` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '扩展统计字段',
  `level` int(10) NOT NULL DEFAULT '0' COMMENT '优先级',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  KEY `idx_category_status` (`category_id`,`status`),
  KEY `idx_status_type_pid` (`status`,`uid`,`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='文档模型基础表';

-- ----------------------------
-- Records of onethink_document
-- ----------------------------
INSERT INTO `onethink_document` VALUES ('1', '1', '', 'OneThink1.1开发版发布', '2', '0', '期待已久的OneThink最新版发布', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '16', '0', '0', '0', '1406001413', '1406001413', '1');
INSERT INTO `onethink_document` VALUES ('9', '1', 'BootstrapIntro', 'Bootstrap简介', '44', '0', 'Bootstrap 是一个用于快速开发 Web 应用程序和网站的前端框架。', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1459500046', '1459500046', '1');
INSERT INTO `onethink_document` VALUES ('3', '1', '', 'PHP 是什么？', '39', '0', '', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1459498238', '1459498238', '3');
INSERT INTO `onethink_document` VALUES ('4', '1', 'PHPintro', 'PHP简介', '39', '0', 'PHP 是服务器端脚本语言。', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '4', '0', '0', '0', '1459498513', '1459498513', '1');
INSERT INTO `onethink_document` VALUES ('5', '1', 'HTMLintro', 'HTML简介', '40', '0', 'HTML 是用来描述网页的一种语言。', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1459498735', '1459498735', '1');
INSERT INTO `onethink_document` VALUES ('6', '1', 'CSSintro', 'CSS简介', '41', '0', 'CSS 指层叠样式表 (Cascading Style Sheets)', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '3', '0', '0', '0', '1459499039', '1459499039', '1');
INSERT INTO `onethink_document` VALUES ('7', '1', 'JavaScriptIntro', 'JavaScript简介', '42', '0', 'JavaScript 是互联网上最流行的脚本语言', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1459499386', '1459499386', '1');
INSERT INTO `onethink_document` VALUES ('8', '1', 'jQueryIntro', 'jQuery 简介', '43', '0', 'jQuery是一个JavaScript函数库', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1459499640', '1459499640', '1');
INSERT INTO `onethink_document` VALUES ('10', '1', 'BootstarpInstall', 'Bootstrap 环境安装', '44', '0', '', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1459500345', '1459500345', '1');
INSERT INTO `onethink_document` VALUES ('11', '1', 'Mysql_intro', 'MySQL简介', '45', '0', 'Mysql是最流行的关系型数据库管理系统', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1459501114', '1459501114', '1');
INSERT INTO `onethink_document` VALUES ('12', '1', 'Python_intro', 'Python 简介', '46', '0', 'Python 是一个高层次的结合了解释性、编译性、互动性和面向对象的脚本语言。', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '3', '0', '0', '0', '1459501335', '1459501335', '1');
INSERT INTO `onethink_document` VALUES ('13', '1', '', '简介', '47', '0', '', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460007906', '1460007906', '3');
INSERT INTO `onethink_document` VALUES ('15', '1', 'intro', '简介', '47', '0', 'OneThink是一个开源的内容管理框架，基于最新的ThinkPHP3.2版本开发，提供更方便、更安全的WEB应用开发体验，采用了全新的架构设计和命名空间机制，融合了模块化、驱动化和插件化的设计理念于一体，开启了国内WEB应用傻瓜式开发的新潮流。', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460008680', '1460008769', '1');
INSERT INTO `onethink_document` VALUES ('16', '1', 'install', '安装', '47', '0', '简介-安装', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '5', '0', '0', '0', '1460008920', '1460009767', '1');
INSERT INTO `onethink_document` VALUES ('17', '1', 'Home', '首页', '47', '0', '后台使用帮助-首页', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '5', '0', '0', '0', '1460009160', '1460009854', '1');
INSERT INTO `onethink_document` VALUES ('18', '1', 'Content', '内容', '47', '0', '后台使用帮助-内容', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '4', '0', '0', '0', '1460009220', '1460009897', '1');
INSERT INTO `onethink_document` VALUES ('19', '1', 'Site_settings', '网站设置', '47', '0', '系统-网站设置', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '4', '0', '0', '0', '1460009400', '1460009534', '1');
INSERT INTO `onethink_document` VALUES ('20', '1', 'Configuration_management', '配置管理', '47', '0', '系统-配置管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460009980', '1460009980', '1');
INSERT INTO `onethink_document` VALUES ('21', '1', 'Menu_management', '菜单管理', '47', '0', '系统-菜单管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460010069', '1460010069', '1');
INSERT INTO `onethink_document` VALUES ('22', '1', 'Classification_management', '分类管理', '47', '0', '系统-分类管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460010248', '1460010248', '1');
INSERT INTO `onethink_document` VALUES ('23', '1', 'Model_management', '模型管理', '47', '0', '系统-模型管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460010299', '1460010299', '1');
INSERT INTO `onethink_document` VALUES ('24', '1', 'Navigation_Management', '导航管理', '47', '0', '系统-导航管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460010352', '1460010352', '1');
INSERT INTO `onethink_document` VALUES ('25', '1', 'Data_backup', '数据备份', '47', '0', '系统-数据备份', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460010467', '1460010467', '1');
INSERT INTO `onethink_document` VALUES ('26', '1', 'Extension', '扩展', '47', '0', '系统-扩展', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460010579', '1460010579', '1');
INSERT INTO `onethink_document` VALUES ('27', '1', 'Rights_management', '权限管理', '47', '0', '用户-权限管理', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460010960', '1460011032', '1');
INSERT INTO `onethink_document` VALUES ('28', '1', 'Action_log', '行为日志', '47', '0', '用户-行为日志', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460011621', '1460011621', '1');
INSERT INTO `onethink_document` VALUES ('29', '1', 'User_behavior', '用户行为', '47', '0', '用户-用户行为', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460011667', '1460011667', '1');
INSERT INTO `onethink_document` VALUES ('30', '1', 'user_info', '用户信息', '47', '0', '用户-用户信息', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460011804', '1460011804', '1');
INSERT INTO `onethink_document` VALUES ('31', '1', 'onethink_architecture', '架构设计', '47', '0', 'OneThink的功能架构设计', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '5', '0', '0', '0', '1460011860', '1460013591', '1');
INSERT INTO `onethink_document` VALUES ('32', '1', 'onethink_dir', '应用架构及目录结构', '47', '0', '架构设计-应用架构及目录结构', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460013660', '1460013730', '1');
INSERT INTO `onethink_document` VALUES ('33', '1', 'Independent_model', '独立模型', '47', '0', '架构设计-独立模型', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460013903', '1460013903', '1');
INSERT INTO `onethink_document` VALUES ('34', '1', 'Plugin_design', '插件设计', '47', '0', '架构设计-插件设计', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460013990', '1460013990', '1');
INSERT INTO `onethink_document` VALUES ('35', '1', 'Design_of_user_behavior', '用户行为', '47', '0', '架构设计-用户行为', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460014080', '1460014155', '1');
INSERT INTO `onethink_document` VALUES ('36', '1', 'Authority_design', '权限设计', '47', '0', '架构设计-权限设计', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460014235', '1460014235', '1');
INSERT INTO `onethink_document` VALUES ('37', '1', 'Document_model_design', '文档模型设计', '47', '0', '架构设计-文档模型设计', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460014344', '1460014344', '1');
INSERT INTO `onethink_document` VALUES ('38', '1', 'Design_classification', '分类设计', '47', '0', '架构设计-分类设计', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460014415', '1460014415', '1');
INSERT INTO `onethink_document` VALUES ('39', '1', 'Naming_coding_conventions', '命名规范与编码规范', '47', '0', '二次开发指南-命名规范与编码规范', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460014500', '1460014573', '1');
INSERT INTO `onethink_document` VALUES ('40', '1', 'The_data_dictionary', '数据字典', '47', '0', '二次开发指南-数据字典', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460014688', '1460014688', '1');
INSERT INTO `onethink_document` VALUES ('41', '1', 'Use_norms', '公共函数库，类库的使用规范', '47', '0', '二次开发指南-公共函数库，类库的使用规范', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '9', '0', '0', '0', '1460014800', '1460015233', '1');
INSERT INTO `onethink_document` VALUES ('42', '1', 'Templates_Developers_Guide', '模板开发指南', '47', '0', '二次开发指南-模板开发指南', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460015460', '1460015540', '1');
INSERT INTO `onethink_document` VALUES ('43', '1', 'Permissions_extended', '权限管理扩展指南', '47', '0', '二次开发指南-权限管理扩展指南', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460015649', '1460015649', '1');
INSERT INTO `onethink_document` VALUES ('44', '1', 'Plugin_development_guide', '插件开发指南', '47', '0', '插件开发指南', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '19', '0', '0', '0', '1460015760', '1460017013', '1');
INSERT INTO `onethink_document` VALUES ('45', '1', 'addon', '什么是插件？', '47', '0', '插件开发指南-什么是插件？', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460017200', '1460017200', '1');
INSERT INTO `onethink_document` VALUES ('46', '1', 'hook', '什么是钩子？', '47', '0', '插件开发指南-什么是钩子？', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460017285', '1460017285', '1');
INSERT INTO `onethink_document` VALUES ('47', '1', 'hook_development', '插件的开发流程', '47', '0', '插件开发指南-插件的开发流程', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460017537', '1460017537', '1');
INSERT INTO `onethink_document` VALUES ('48', '1', 'hook_back', '插件后台的开发', '47', '0', '插件开发指南-插件后台的开发', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460017620', '1460017702', '1');
INSERT INTO `onethink_document` VALUES ('49', '1', 'hook_development_note', '插件开发的注意事项', '47', '0', '插件开发指南-插件开发的注意事项', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460017860', '1460017860', '1');
INSERT INTO `onethink_document` VALUES ('50', '1', 'Matters_needing_attention', '模型扩展开发指南', '47', '0', '模型扩展开发指南', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460018046', '1460018046', '1');
INSERT INTO `onethink_document` VALUES ('51', '1', 'Ind_model', '独立模型扩展', '47', '0', '独立扩展开发指南-独立模型扩展', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460018215', '1460018215', '1');
INSERT INTO `onethink_document` VALUES ('52', '1', 'Document_models', '文档模型扩展', '47', '0', '模型扩展开发指南-文档模型扩展', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460018267', '1460018267', '1');
INSERT INTO `onethink_document` VALUES ('53', '1', 'Deployment_reference', '配置参考', '47', '0', '附录-配置参考', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '2', '0', '0', '0', '1460019120', '1460019221', '1');
INSERT INTO `onethink_document` VALUES ('54', '1', 'Common_function_library', 'Common函数库', '47', '0', '函数库参考-Common函数库', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460019335', '1460019335', '1');
INSERT INTO `onethink_document` VALUES ('55', '1', 'Admin_functions', 'Admin函数库', '47', '0', '函数库参考-Admin函数库', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '1', '0', '0', '0', '1460019409', '1460019409', '1');
INSERT INTO `onethink_document` VALUES ('56', '1', 'home_function', 'Home函数库', '47', '0', '函数库参考-Home函数库', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460019605', '1460019605', '1');
INSERT INTO `onethink_document` VALUES ('57', '1', 'Class_library_reference', '类库参考', '47', '0', '', '0', '0', '2', '2', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '1460020540', '1460020540', '1');
