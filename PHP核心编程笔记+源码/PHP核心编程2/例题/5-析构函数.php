<?php
header('content-type:text/html;charset=utf-8');
class Student {
	private $name;
	//构造函数
	public function __construct($name) {
		$this->name=$name;
		echo "{$name}出生了<br>";
	}
	//析构函数
	public function __destruct() {
		echo "销毁{$this->name}<br>";
	}
}
//测试
$stu1=new Student('李白');
unset($stu1);	//销毁$stu1
$stu2=new Student('杜甫');
$stu2=10;	//销毁$stu2
$stu3=new Student('白居易');
