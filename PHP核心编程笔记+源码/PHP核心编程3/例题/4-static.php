<?php
header('content-type:text/html;charset=utf-8');
class Person {
	public static $national='中国';	//静态属性
	public static function show() {//静态方法
		echo '这是一个静态方法<br>';
	}
}
//测试
echo Person::$national,'<br>';
Person::show();




