<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 上午11:37
 */

class Person{
    protected $name='alex';

    public function __construct(){
        echo '父类构造函数','<br>';
    }

    protected function getName(){
        echo '人必然存在名字','<br>';
    }
}

class Student extends Person{


    public function __construct(){
        echo '子类的构造函数','<br>';
        Person::__construct();//调用父类的构造函数
        parent::__construct();//调用父类的构造函数：parent父类名字


    }


    public function show(){
        echo $this->name,'<br>';
        $this->GetName();

    }
}

//$stu=new Student();
//$stu->show();

//如果子类存在自己的构造函数，调用自己的构造函数。如果没有，就调用父类的构造函数，可以使用类名：：构造函数名调用函数。


class Person1 extends Person{
    protected $name='Person1';
    public function show(){
        $p=new Person();
        echo $p->name,'<br>';
    }
}

$s=new Person1();
$s->show();