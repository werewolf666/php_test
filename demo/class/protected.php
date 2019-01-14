<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午1:39
 */


//protected 关键字
//class A{
//    protected $num=10;
//}
//
//class B extends A{
//    public function show(){
//        echo $this->num;
//    }
//}
//
////$ret=new B;
////$ret->show();
//
//class C{
//    public function show(){
//        echo $this->num;
//    }
//}
//
//class D extends C{
//    protected $num=11;
//}
//$r1=new D;
//$r1->show();

//给父类传递参数

class A{
    protected $num=10;
    protected $name;
    protected $age;
    public function __construct($name,$age){
        $this->name=$name;
        $this->age=$age;
    }
}

class B extends A{
    private $score;
    public function __construct($name, $age,$score)
    {
        parent::__construct($name, $age);
        $this->score=$score;
    }

    public function show(){
        echo "姓名：{$this->name}",'<br>';
        echo "年宁：{$this->age}",'<br>';
        echo "分数：{$this->score}",'<br>';
    }
}

$r1=new B('alex','20',80);
$r1->show();
