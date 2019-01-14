<?php
header('content-type:text/html;charset=utf-8');
//类
class Student {
	public $name='李白';	//访问修饰符  属性
	public $sex='男';
}
//实例化对象
$stu1=new Student();	//实例化一个对象，并且将对象付给$stu1变量
$stu2=new Student();
//给变量赋值
$stu1->name='tom';
$stu2->name='berry';
//调用属性
echo $stu1->name,'<br>';	
echo $stu2->name,'<br>';

echo '<br>---------增加属性---------------<br>';
$stu1->add='北京';
var_dump($stu1);

echo '<hr>---------删除属性---------------<br>';
unset($stu2->name);
var_dump($stu2);

echo '<hr>---------判断属性是否存在---------<br>';
var_dump(isset($stu1->name),isset($stu2->name));