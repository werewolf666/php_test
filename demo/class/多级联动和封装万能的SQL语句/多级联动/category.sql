drop table if exists category;
    create table category(
    id int unsigned auto_increment primary key comment 'id',
    name varchar(50) not null comment '类别名称',
    sort_order int not null default 50 comment '排序',
    parent_id int unsigned not null comment '父级id'
)engine=innodb charset=utf8;

-- 插入数据
insert into category values (1,'图像，音响，数字商品',default,0);
insert into category values (2,'家用电器',default,0);
insert into category values (3,'手机数码',default,0);
insert into category values (4,'电子书',default,1);
insert into category values (5,'数字音乐',default,1);
insert into category values (6,'励志',default,4);
insert into category values (7,'文学',default,4);
insert into category values (8,'家电',default,2);
insert into category values (9,'苹果',default,3);
insert into category values (10,'小米',default,3);

-- 取出数据
