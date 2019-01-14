<?php
header('content-type:text/html;charset=utf-8');
class Person {
	protected $national='中国';
}
class Student extends Person {
	public function show() {
		//$p=new Person();	//实例化父类
		$p=new parent();	//实例化父类
		echo $p->national;
	}
}
//测试
$stu=new Student;
$stu->show();	//中国