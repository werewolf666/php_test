<?php
header('content-type:text/html;charset=utf-8');
class Person {
	public static $national='中国';
	public static function show() {
		echo '这是一个父类的静态方法<br>';
	}
}
class Student extends Person {
	
}
echo Student::$national,'<br>';
Student::show();




