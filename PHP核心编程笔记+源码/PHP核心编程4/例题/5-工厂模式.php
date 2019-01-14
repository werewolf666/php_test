<?php
header('content-type:text/html;charset=utf-8');
abstract class Product {
	abstract public function getName();
}
class ProductA extends Product  {
	public function getName() {
		echo '这是A商品<br>';
	}
}
class ProductB extends Product {
	public function getName() {
		echo '这是B商品<br>';
	}
}
//工厂模式
class ProductFactory {
	public static function create($num) {
		switch($num) {
			case 1:
				return new ProductA();
			case 2:
				return new ProductB();
		}
		return null;
	}
}
//传递不同的参数获取不同的对象
$obj=ProductFactory::create(1);
$obj->getName();	//这是A商品
$obj=ProductFactory::create(2);
$obj->getName();	//这是B商品



