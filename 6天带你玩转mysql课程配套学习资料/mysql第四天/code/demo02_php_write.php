<?php

	//PHP操作mysql写操作
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
	$res = mysql_query($sql);

	//判断
	if(!$res){
		echo 'SQL语句有语法错误!<br/>';
		echo '错误编码是:' . mysql_errno(). '<br/>';
		//mysql获取到的错误信息默认是GBK编码
		echo '错误信息是:' . iconv('GBK','UTF-8',mysql_error()) . '<br/>';

		//终止脚本
		exit;
	}

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

	/*
	//新增数据
	$sql = "insert into my_student values(null,'itcast0007','周杨','男',23,180,1)";
	//错误处理
	my_error($sql);

	//获取自增长id
	$id = mysql_insert_id();

	//如果id为0: 说明没有自增长,返回受影响的行数: 如果都为0
	echo $id ? $id : mysql_affected_rows();
	*/

	//删改数据
	$sql = "update my_student set age=floor(rand()*20 + 20)";
	my_error($sql);

	//通过受影响的函数来判断数据
	echo mysql_affected_rows();