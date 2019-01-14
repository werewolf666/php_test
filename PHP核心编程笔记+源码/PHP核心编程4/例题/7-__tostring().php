<?php
header('content-type:text/html;charset=utf-8');
class Student {
	//将对象当成字符串使用的时候自动调用
	public function __tostring() {
		return '这是Student对象，不能当字符串使用';
	}
}
$stu=new Student;
echo $stu;



