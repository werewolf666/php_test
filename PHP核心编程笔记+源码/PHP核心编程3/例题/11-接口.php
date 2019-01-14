<?php
header('content-type:text/html;charset=utf-8');
interface Goods {
	function add();
	function update();
}
class GoodsA implements Goods {
	public function add() {
		echo '实现add<br>';
	}
	public function update() {
		echo '实现update<br>';
	}
}
//测试
$goods=new GoodsA();
$goods->add();
$goods->update();


