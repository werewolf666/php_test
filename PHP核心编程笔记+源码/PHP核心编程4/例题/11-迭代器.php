<?php
header('content-type:text/html;charset=utf-8');
//学生类
class Student {
	private $name;
	public function __construct($name) {
		$this->name=$name;
	}
	public function __get($key) {
		return $this->$key;
	}
}
//班级类
class PHP implements Iterator {
	private $stu_list=array();	//学生数组
	//给班级添加学生
	public function addStu(Student $stu) {
		$this->stu_list[]=$stu;
	}
	//实现Iterator的抽象方法
	public function rewind() {
		reset($this->stu_list);	//指针复位到迭代器的第一个元素
	}
	public function valid () {	//判断当前指针位置是否合法
		return key($this->stu_list)!==null;
	}
	public function current() {	//返回当前元素
		return current($this->stu_list);
	}
	public function key() {	//返回当前元素的键
		return key($this->stu_list);	
	}
	public function next() {	//向前移动到下一个元素
		next($this->stu_list);
	}
}
//给班级添加3名学生
$class=new PHP();
$class->addStu(new Student('李白'));
$class->addStu(new Student('杜甫'));
$class->addStu(new Student('白居易'));
//遍历班级
foreach($class as $stu) {
	echo $stu->name,'<br>';
}
