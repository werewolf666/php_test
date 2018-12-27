
CREATE database project charset utf8;
use project;
CREATE TABLE pr_admin(id int primary key auto_increment,
username VARCHAR(20) not null UNIQUE comment'用户名：具有唯一性',
password CHAR(32) not null comment '用户密码不能为空md5加密'
) charset utf8;

INSERT into pr_admin VALUES(null,'admin',md5('admin'));