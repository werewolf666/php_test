<?php
class DBClass {
	private $link;	//连接对象
	//创建连接对象
	public function __construct() {
		$this->link=mysql_connect('localhost:3306','root','aa');
	}
	//销毁连接对象
	public function __destruct() {
		echo 'delete link object<br>';
		mysql_close($this->link);
	}
}
//测试
$db=new DBClass();
var_dump($db);
echo '<hr>';
unset($db);
echo '<hr>';
var_dump($db);