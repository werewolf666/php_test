-- 创建session数据表
create table sline_session(
id char(32) primary key comment '回话编号',
value text not null comment '回话的值',
expires int not null
)engine=innodb charset=utf8;