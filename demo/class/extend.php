<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 上午11:27
 */

class Person{
    private $name='josn';
    protected $age=18;
    public function GetName(){
        echo '生必有名字';

    }
}

class Student extends Person {
    //继承父类所有属性但没有权限使用，$name无法在子类中直接调用
    public function show(){
        echo $this->age;
    }
}

$stu=new Student();
$stu->GetName();