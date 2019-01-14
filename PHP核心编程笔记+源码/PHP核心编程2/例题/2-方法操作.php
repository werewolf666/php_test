<?php
header('content-type:text/html;charset=utf-8');
//类
class Student {
	//方法
	public function show() {
		echo '锄禾日当午<br>';
	}
}
//实例化
$stu1=new Student;	//()可以省略
$stu1->show();
$stu2=new Student;
$stu2->show();
