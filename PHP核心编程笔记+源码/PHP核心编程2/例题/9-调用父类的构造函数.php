<?php
header('content-type:text/html;charset=utf-8');
class Person {
	public function __construct() {
		echo '这是人类的构造方法<br>';
	}
}
class Student extends Person {
	public function __construct() {
		parent::__construct();	//调用父类的构造函数
		Person::__construct();	//调用父类的构造函数
		echo '这是子类的构造函数<br>';
	}
}
$stu=new Student();
