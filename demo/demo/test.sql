-- mysql触发器：
-- 事件类型

-- 创建商品表

CREATE table my_goods(
id int primary key auto_increment,
name varchar(20) not null,
price decimal(10,2) default 1,
inv int comment '库存'
)charset utf8;

INSERT into my_goods values(NULL ,'iphone6s',5288,100),(NULL ,'s6',9888,100);


create table my_order(
id int primary key auto_increment,
g_id int not NULL comment '商品id',
g_num int comment '商品数量'
)charset utf8;


-- 创建触发器
-- delimiter $$
delimiter $$
create trigger after_order after insert on my_order for each row
BEGIN
      -- update my_goods set inv = inv - 1 where id = 2;
      select * from my_goods;
END
$$
delimiter  ;

-- 插入订单
insert into my_order values(null,1,3);


-- 删除触发器
drop trigger after_order;

-- 临时修改语句结束符
delimiter $$

create trigger after_order after insert on my_order for each row
begin
    -- 触发器内容开始: 新增一条订单: old没有,new代表新的订单记录
    update my_goods set inv = inv - new.g_num where id = new.g_id;

end
-- 结束触发器
$$

-- 修改临时语句结束符
delimiter ;

insert into my_order values(null,2,3);


-- if结构（顺序，分支，循环）

-- if分支
-- if 条件判断 then
  --代码
-- end if
-- 创建if判断的触发器

-- 修改语句结束符
delimiter %%

create trigger before_order before insert on my_order for each row
begin
	-- 判断商品库存是否足够

	-- 获取商品库存: 商品库存在表中
	select inv from my_goods where id = new.g_id into @inv;

	-- 比较库存
	if @inv < new.g_num then
		-- 库存不够: 触发器没有提供一个能够阻止事件发生的能力(暴力报错)
		insert into XXX values(XXX);

	end if;

end
%%
-- 改回语句结束符
delimiter ;

-- 插入订单
insert into my_order values(null,1,1000);

-- 循环结构
-- while 条件判断 do
  -- 满足代码
  -- 变更循环条件
-- end while

-- 用法
-- 定义循环名字
