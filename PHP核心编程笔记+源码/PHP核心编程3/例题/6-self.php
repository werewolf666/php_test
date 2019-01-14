<?php
class Student {
	private $name='tom';
	public static function show() {
		$stu=new self;
		echo $stu->name;
	}
}
Student::show();