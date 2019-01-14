<?php
header('content-type:text/html;charset=utf-8');
//当将对象当成函数调用的时候自动调用
class Student {
	public function __invoke($name) {
		echo "这是一个学生对象，不是函数,你给我一个'{$name}'也没用";
	}
}
$stu=new Student();
$stu('李白');



