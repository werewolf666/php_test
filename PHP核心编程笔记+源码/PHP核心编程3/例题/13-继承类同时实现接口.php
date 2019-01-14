<?php
//抽象类
abstract class ABSClass{
	abstract function test1();
}
//接口
interface IPict {
	function test2();
}
class MyClass extends ABSClass implements IPict {
	public function test1() {		
	}
	public function test2() {		
	}
}



