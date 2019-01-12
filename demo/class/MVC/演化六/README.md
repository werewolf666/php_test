
MVC架构

M:model;
V:view;
C:controller

演化四更新要点：
1、增加基础模型类Model用来封装所有需要链接的数据库的公共方法和属性

演化五更新要点：
1、增加控制器controller
控制器中的方法以action结尾


2、增加参数分发
$c=isset($_GET['c'])?ucfirst($_GET['c']):'Member';   // 获取控制器,让首字母大写 ucfirst()
$a=isset($_GET['a'])?lcfirst($_GET['a']):'list';     //获取方法,让所有首字母小写 lcfirst()
$controller_name=$c.'Controller';           //拼接控制器名字
$action_name=$a.'Action';           //拼接方法名字
$controller=new $controller_name;   //实例化控制器
$controller->$action_name();        //调用方法


 <td><input type="button" value="删除" onclick="if(confirm('该删除无法恢复，确定删除吗'))location.href='index.php?c=member&a=del&id=<?php echo $rows['mid'];?>'"></td>

3、增加删除功能（
删除获取参数，组合成url分发到控制器，让后调用相应的模型，执行相应的方法，最后返回页面
onclick="if(confirm('是否删除'))location:href='index.php?c=member&a=del&id=<?php echo $rows['mid'];?>'''"")
）