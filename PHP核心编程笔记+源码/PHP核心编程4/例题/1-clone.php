<?php
class Student {
}
$stu1=new Student();
var_dump($stu1);echo '<br>';	//object(Student)#1 (0) { } 
$stu2=$stu1;	//$stu1的地址付给$stu2,$stu1和$stu2指向同一个对象
var_dump($stu2);echo '<br>';	//object(Student)#1 (0) { } 
$stu3=clone $stu1;	//克隆一个新的对象
var_dump($stu3);echo '<br>';	//object(Student)#2 (0) { } 

