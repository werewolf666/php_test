<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午6:01
 */

// 类常量可以直接在文件当中直接调用
class Per{
    const name='alex';
    public function show(){
        echo self::name,'<br>';
        echo Per::name,'<br>';
    }
}

interface Stu{
    const type='man';
}

$ret=new Per();
$ret->show();
echo Stu::type,'<br>';
echo Per::name,'<br>';
echo '<hr>';

class Base{}
class A extends Base {}
class B extends Base {}

function show(Base $obj){
    var_dump($obj);
}

show(new A); //A对象
show(new B); //B对象
show(10); // 报错
