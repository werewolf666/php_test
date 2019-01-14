<?php
header('content-type:text/html;charset=utf-8');
class Student {
	public $name='tom';
	public function show() {
		echo '锄禾日当午<br>';
	}
	public static function display() {
		@self::show();
	}
}
//测试
Student::display();