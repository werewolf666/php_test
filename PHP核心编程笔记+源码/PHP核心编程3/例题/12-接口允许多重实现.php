<?php
header('content-type:text/html;charset=utf-8');
interface IPict1 {
	function test1();
}
interface IPict2 {
	function test2();
}
//接口允许多重实现
class MyClass implements IPict1,IPict2 {
	public function test1() {
		echo '实现接口1的test1方法<br>';
	}
	public function test2() {
		echo '实现接口2的test2方法<br>';
	}
}
$obj=new MyClass();
$obj->test1();
$obj->test2();