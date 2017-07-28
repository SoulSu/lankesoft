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


CREATE TABLE `product` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(128) NOT NULL DEFAULT '' COMMENT '文章标题',
    `cate_id` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '产品分类',
    `keywords` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '关键字',
    `describe` TINYTEXT NOT NULL COMMENT '描述',
    `content` TEXT NOT NULL COMMENT '内容',
    `views` INT(10) NOT NULL DEFAULT 0 COMMENT '浏览次数',
    `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
    `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间'
) COMMENT '产品表';


CREATE TABLE `product_demo` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '文章标题',
  `cate_id` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '产品分类',
  `sort` INT(10) NOT NULL DEFAULT 0 COMMENT  '排序',
  `thumbnail` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '缩略图',
  `content` TEXT NOT NULL COMMENT '内容',
  `views` INT(10) NOT NULL DEFAULT 0 COMMENT '浏览次数',
  `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间',
  KEY (sort)
) COMMENT '产品演示表';

CREATE TABLE `question` (
  `id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '文章标题',
  `cate_id` TINYINT(4) NOT NULL DEFAULT 0 COMMENT '产品分类',
  `sort` INT(10) NOT NULL DEFAULT 0 COMMENT  '排序',
  `content` TEXT NOT NULL COMMENT '内容',
  `views` INT(10) NOT NULL DEFAULT 0 COMMENT '浏览次数',
  `mtime` INT(12) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `ctime` INT(12) NOT NULL DEFAULT 0 COMMENT '创建时间',
  KEY (sort)
) COMMENT '常见问题';

