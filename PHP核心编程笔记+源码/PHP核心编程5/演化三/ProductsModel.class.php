<?php
/**
*ProductsModel，用来操作Products表
*/
class ProductsModel {
	protected $db;	//用来保存MySQLDB的单例
	/**
	*构造函数初始化连接数据库
	*/
	public function __construct() {
		$this->initDB();
	}
	//获取MySQLDBm类的实例
	private function initDB() {
		$config=array(
			'host'	=>	'127.0.0.1',
			'user'	=>	'root',
			'pwd'	=>	'aa',
			'dbname'=>	'php4'
		);
		$this->db=MySQLDB::getInstance($config);
	}
	/**
	*获取Products表的所有商品
	*/
	public function getList() {
		return $this->db->fetchAll("select *  from products");
	}
}

