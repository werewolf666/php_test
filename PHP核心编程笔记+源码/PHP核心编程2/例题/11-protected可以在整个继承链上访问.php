<?php
class A {
	public function show() {
		echo $this->num;
	}
}
class B extends A{
	protected $num=10;
}
//测试
$obj=new B();
$obj->show();	//10
