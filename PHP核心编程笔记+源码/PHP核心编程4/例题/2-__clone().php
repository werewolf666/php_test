<?php
class Student {
	private $is_clone=false;
	public function __clone() {//当执行clone命令的时候会自动执行__clone()函数
		$this->is_clone=true;
	}
}
$stu1=new Student;
var_dump($stu1);echo '<br>';//object(Student)#1 (1) { ["is_clone":"Student":private]=> bool(false) } 
$stu2=clone $stu1;
var_dump($stu2);echo '<br>';//object(Student)#2 (1) { ["is_clone":"Student":private]=> bool(true) } 

