<?php
/**
*单例模式：一个类只能有一个对象
*三私一公
*/
class MySQLDB {
	private static $instance;			//私有的成员用来保存类的实例
	private function __construct() {	//私有的构造函数阻止在类的外部实例化
	}
	private function __clone() {		//私有的__clone()阻止clone对象
	}
	public static function getInstance() {	//公有的方法用来获取类的实例
		if(!self::$instance instanceof self )
			self::$instance=new self;
		return self::$instance;
	}
}
$db1=MySQLDB::getInstance();
$db2=MySQLDB::getInstance();
var_dump($db1,$db2);




