<?php
header('content-type:text/html;charset=utf-8');
class Student {
	private $name;
	private $sex;
	//构造函数
	public function __construct($name,$sex) {
		$this->name=$name;
		$this->sex=$sex;
	}
	//显示值
	public function show() {
		echo "姓名:{$this->name}<br>";
		echo "性别:{$this->sex}<br>";
	}
}
//测试
$stu=new Student('tom','男');
$stu->show();
echo '<hr>';
$stu=new Student('berry','女');
$stu->show();




