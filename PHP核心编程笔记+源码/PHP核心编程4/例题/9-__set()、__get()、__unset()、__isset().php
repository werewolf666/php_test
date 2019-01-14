<?php
header('content-type:text/html;charset=utf-8');
class Student {
	private $name;
	private $sex;
	//当给无法访问的属性赋值的时候自动调用
	public function __set($key,$value) {
		$this->$key=$value;
	}
	//当给无法访问的属性取值的时候自动调用
	public function __get($key) {
		return $this->$key;
	}
	//当用unset()销毁无法访问的属性的时候自动调用
	public function __unset($key) {
		unset($this->$key);
		echo '销毁成功<br>';
	}
	//当用isset()函数判断无法访问的属性的时候自动调用
	public function __isset($key) {
		return isset($this->$key);
	}
}
$stu=new Student;
$stu->name='tom';
echo $stu->name,'<br>';		//tom
unset($stu->name);			//销毁成功
$stu->sex='男';
var_dump(isset($stu->sex));	//bool(true) 
