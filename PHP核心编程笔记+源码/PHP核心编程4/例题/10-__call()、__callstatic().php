<?php
header('content-type:text/html;charset=utf-8');
class Student {
	/**
	*当调用一个不存在的普通方法时自动调用
	*@param $fn_name string 方法名
	*@param $fn_args array	参数数组
	*/
	public function __call($fn_name,$fn_args) {
		echo "学生类中没有{$fn_name}方法<br>";
		print_r($fn_args);
	}
	/**
	*当调用一个不存在的的静态方法的时候自动调用
	*/
	public static function __callstatic($fn_name,$fn_args) {
		echo "<br>没有{$fn_name}静态方法<br>";
	}
}
$stu=new Student;
$stu->show(10,20,30);
Student::display();


