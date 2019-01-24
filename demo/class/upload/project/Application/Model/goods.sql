drop table if exists goods;
create table goods(
    goodsid int unsigned auto_increment primary key comment '商品编号',
    name varchar(50) not null comment '商品名称',
    price decimal(10,2) not null comment '商品价格',
    img varchar(500) null comment '源图地址',
    img_thumb_sm varchar(200) null comment '缩略图1',
    img_thumb_mid varchar(200) null comment '缩略图2',
    categoryid int unsigned not null comment '商品类别id',
    status set('best','new','hot') not null comment '商品类别 精品,新品,热销',
    goods_desc text comment '商品描述'
)engine=innodb charset=utf8;