<?php
header('content-type:text/html;charset=utf-8');
class Person {
	protected $name='李白';
	protected function getName() {
		echo '人总是有名字的<br>';
	}
}
class Student extends Person {
	public function show() {
		echo $this->name,'<br>';	//调用父类的属性
		$this->getName();	//调用父类的方法
	}
}
//测试
$stu=new Student;
$stu->show();