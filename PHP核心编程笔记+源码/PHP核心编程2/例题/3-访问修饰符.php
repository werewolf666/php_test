<?php
header('content-type:text/html;charset=utf-8');
class Student {
	private $name;	//属性也叫成员变量
	private $sex;
	//赋值
	public function setInfo($name,$sex) {
		if($name==''){
			echo '姓名不能为空';
			exit;
		}
		if($sex!='男' && $sex!='女'){
			echo '性别不正确';
			exit;
		}
		//赋值
		$this->name=$name;	//$this表示调用当前方法的对象
		$this->sex=$sex;
	}
	//取值
	public function getInfo() {
		echo '姓名：'.$this->name,'<br>';
		echo '性别：'.$this->sex,'<hr>';
	}
}
$stu=new Student;
$stu->setInfo('tom','男');
$stu->getInfo();



