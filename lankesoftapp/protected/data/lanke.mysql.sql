CREATE TABLE admin (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(32) NOT NULL,
    last_login_ip VARCHAR(32) NOT NULL DEFAULT '',
    mtime INT(12) NOT NULL DEFAULT 0,
    ctime INT(12) NOT NULL DEFAULT 0
);


INSERT INTO admin (username, password) VALUES ('admin', MD5('admin'));