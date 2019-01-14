<?php

	//PHP操作mysql:查询
	header('Content-type:text/html;charset=utf-8');

	//连接认证
	$link = @mysql_connect('localhost','root','root');

	//判断连接结果
	if(!$link){
		//连接失败
		echo '数据库连接失败!<br/>';
		echo '错误编码是:' . mysql_errno(). '<br/>';
		//mysql获取到的错误信息默认是GBK编码
		echo '错误信息是:' . iconv('GBK','UTF-8',mysql_error()) . '<br/>';

		//终止脚本
		exit;
	}

	//操作数据库: 设置字符集,选择数据库
	$sql = "set names utf8";
	my_error($sql);

	/*
	 * 封装SQL错误处理函数
	 * @param1 string $sql,要执行的SQL语句
	 * @return mixed 执行结果, 如果错误直接终止脚本
	*/
	function my_error($sql){
		//执行sql语句
		$res = mysql_query($sql);

		//判断结果
		if(!$res){
			echo 'SQL语句有语法错误!<br/>';
			echo '错误编码是:' . mysql_errno(). '<br/>';
			//mysql获取到的错误信息默认是GBK编码
			echo '错误信息是:' . iconv('GBK','UTF-8',mysql_error()) . '<br/>';

			//终止脚本
			exit;
		}

		//返回执行正确的结果
		return $res;
	}

	//选择数据库
	$sql = "use mydatabase";
	my_error($sql);

	//查询数据: 所有学生
	$sql = "select * from my_student";
	$res = my_error($sql);

	//解析结果集
	//$students = array();
	//while ($row = mysql_fetch_assoc($res)){
	//	$students[] = $row;
	//}

	//显示结果
	include_once 'demo04_display.html';