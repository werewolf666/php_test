<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午4:34
 */

//abstruct(抽象的)修饰抽象类
// 抽象类
// 抽象类允许直接实例化，需要重写抽象方法才能被实例化，主要是防止实例化和规范方法名

abstract class Teacher{
    protected $name;
    public function setName($name){
        $this->name=$name;
    }
    abstract public function showName();
}

class Student extends Teacher{
    public function showName()
    {
        // TODO: Implement showName() method.
        echo "{$this->name}";
    }
}

$stu=new Student();
$stu->setName('alex');
$stu->showName();