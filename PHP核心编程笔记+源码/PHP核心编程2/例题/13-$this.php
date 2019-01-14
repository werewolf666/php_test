<?php
class Goods {
	public function __construct() {
		var_dump($this);
	}
}
class Book extends Goods {
}
//测试
new Goods();	//object(Goods)#1 (0) { }
echo '<hr>';
new Book();		//object(Book)#1 (0) { }

