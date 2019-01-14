<?php
header('content-type:text/html;charset=utf-8');
//抽象类
abstract class Goods {
	protected $name;
	public function setName($name) {
		$this->name=$name;
	}
	abstract public function getName();	//抽象方法
}
//实现抽象类
class Book extends Goods {
	public function getName() {	//抽象方法必须被重写后才能被实例化
		echo "《{$this->name}》";
	}
}
//测试
$book=new Book();
$book->setName('PHP入门到精通');
$book->getName();

