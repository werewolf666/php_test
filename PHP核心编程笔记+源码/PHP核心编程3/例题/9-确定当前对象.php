<?php
header('content-type:text/html;charset=utf-8');
class Person {
	public static $type='人类';
	public function showPerson() {
		//var_dump($this);	//object(Student)#1 (0) { } 
		//echo self::$type;	//人类
		echo static::$type;	//学生	【静态延时绑定】
	}
}
class Student extends Person {
	public static $type='学生';
	public function showStu() {
		//var_dump($this);	//object(Student)#1 (0) { } 
		//echo self::$type;	//学生
		echo static::$type;	//学生	【静态延时绑定】
	}
}
//测试
$stu=new Student;
$stu->showPerson();
echo '<hr>';
$stu->showStu();







