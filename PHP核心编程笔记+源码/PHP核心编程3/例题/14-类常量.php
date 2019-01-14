<?php
header('content-type:text/html;charset=utf-8');
class Student {
	const type='学生';
	public function show() {
		echo self::type,'<br>';
		echo Student::type,'<br>';
	}
}
$stu=new Student;
$stu->show();
echo '<hr>';
interface IPict {
	const type='人类';
}
echo Ipict::type;






