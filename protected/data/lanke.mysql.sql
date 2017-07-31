DROP TABLE admin;
CREATE TABLE admin (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL COMMENT '登录用户名',
    password VARCHAR(32) NOT NULL COMMENT '登录密码',
    salt VARCHAR(128) NOT NULL COMMENT '密码盐值',
    last_login_ip VARCHAR(32) NOT NULL DEFAULT '' COMMENT '最后登录ip 地址',
    mtime INT(12) NOT NULL DEFAULT 0,
    ctime INT(12) NOT NULL DEFAULT 0,
    UNIQUE (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 初始化管理员账号
INSERT INTO admin(id, username, password, salt, last_login_ip, mtime, ctime) VALUES (1, 'admin', '7da662894de55656092233800f47c57f', 'MDI5OWE4MjNmOTJiMmU3ZDE3Yjg1OGU2MzZlMTE0ZDY=', '127.0.0.1', 1501168232, 1501168232);

DROP TABLE `cate`;
CREATE TABLE `cate` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '分类名称',
  `type` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '分类类型，产品列表|',
  `parent` INTEGER NOT NULL DEFAULT 0 COMMENT '多级父分类，0 代表自己是父亲',
  `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '通用分类表';

-- 初始化 分类
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (1,'屈曲约束支撑', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (2,'软钢阻尼器', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (3,'墙板阻尼器', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (4,'软件报价', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (5,'多高层结构', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (6,'厂房结构', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (7,'空间结构', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (8,'MTStool工具箱', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (9,'涉外项目', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (10,'国内项目', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (11,'减震演示', 1);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (12,'软件演示', 1);
-- 减震演示
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (13,'减震演示', 2);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (14,'软件演示', 2);

-- 常见问题
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (15,'减震常见问题', 3);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (16,'软件常见问题', 3);

-- 工程案例
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (17,'钢框架支撑结构', 5);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (18,'混凝土框架支撑结构', 5);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (19,'框架筒体结构', 5);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (20,'空间结构', 5);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (21,'结构加固', 5);
INSERT INTO `cate`(`id`,`name`,`type`) VALUES (22,'其他', 5);



DROP TABLE `product`;
CREATE TABLE `product` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(128) NOT NULL DEFAULT '' COMMENT '文章标题',
    `cate_id` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '产品分类',
    `type` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '分类类型，产品列表|产品演示表|常见问题',
    `keywords` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '关键字',
    `thumbnail` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '缩略图',
    `describe` TINYTEXT NOT NULL COMMENT '描述',
    `content` TEXT NOT NULL COMMENT '内容',
    `sort` INT(10) NOT NULL DEFAULT 0 COMMENT '显示顺序',
    `views` INT(10) NOT NULL DEFAULT 0 COMMENT '浏览次数',
    `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
    `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品表 & 产品演示表 & 常见问题';


CREATE TABLE `projectcase` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '文章标题',
  `cate_id` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '产品分类',
  `provice_code` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '省code',
  `city_code` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '市code',
  `area_code` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '区code',
  `bid_time` INT(12) NOT NULL DEFAULT 0 COMMENT '中标时间',
  `scale` TINYTEXT NOT NULL COMMENT '项目规模',
  `address` TINYTEXT NOT NULL COMMENT '项目地址',
  `overview` TINYTEXT NOT NULL COMMENT '项目概况',
  `situation` TINYTEXT NOT NULL COMMENT '项目应用情况',
  `completion` TINYTEXT NOT NULL COMMENT '项目完成情况',
  `sort` INT(10) NOT NULL DEFAULT 0 COMMENT  '排序',
  `thumbnail` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '缩略图',
  `views` INT(10) NOT NULL DEFAULT 0 COMMENT '浏览次数',
  `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间',
  KEY (sort)
) ENGINE=InnoDB DEFAULT CHARSET=utf8  COMMENT '工程案例';

