-- 创建session数据表
create table sess(
sess_id char(32) primary key comment '回话编号',
sess_value text not null comment '回话的值',
sess_expires int not null
)engine=innodb charset=utf8;