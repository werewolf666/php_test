<?php

	//PHP操作mysql基本步骤
$br='<br/>';
	//连接认证
	$link = mysql_connect('localhost:3306','root','root');
	//$link1 = mysql_connect('localhost:3306','root','root',true);	//产生新连接
	//var_dump($link,$link1);

	//SQL指令执行
	//设置字符集
	$sql = "set names utf8";	//SQL默认的报错方式:静默模式
	$res = mysql_query($sql);
	//var_dump($res);

	//查看所有数据库
	$sql = "show databases";
	$res = mysql_query($sql);
echo $br;
	var_dump($res);
echo $br;
	//结果集解析
	//mysql_fetch_array

	var_dump(mysql_fetch_array($res));
echo $br;

	//获取关联
	var_dump(mysql_fetch_array($res,MYSQL_ASSOC));
	//获取索引
	var_dump(mysql_fetch_array($res,MYSQL_NUM));

	//mysql_fetch_assoc:直接获取关联数组
	var_dump(mysql_fetch_assoc($res));

	//mysql_fetch_row:直接获取索引数组
	var_dump(mysql_fetch_row($res));
	var_dump(mysql_fetch_row($res));
	var_dump(mysql_fetch_row($res));
	var_dump(mysql_fetch_row($res));

	//重置指针
	var_dump(mysql_data_seek($res,0));

	//循环遍历所有内容
	$databases = array();
	
	while($row = mysql_fetch_assoc($res)){	//取出的结果:关联数组或者false
		//关联数组
		$databases[] = $row;	//$databases是一个二维数组
	}
	echo '<hr/>';
	var_dump($databases);

	$sql2="use project";
	$sql1="select * from sline_member";
	$r1=mysql_query($sql1);
    var_dump(mysql_fetch_array($r1));
echo $br;
	var_dump($r1);

echo $br;
    $r2=mysql_query($sql2);
	var_dump($r2);

	echo "<br/>";

	echo (mysql_fetch_array($r2));





	//释放资源
	var_dump(mysql_close($link));