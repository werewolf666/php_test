<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午2:58
 */

//多态类型1：方法重写（同一个名字的方法重写,严格标准参数个数类型要一致，但不一致也是可以运行的）
class Person{
    public function show()
    {
        echo '父类','<br>';
    }
}

class Stu extends Person{
    public function show()
    {
        echo '学生类','<br>';
    }
}

//多态类型2：重载，但是PHP不支持方法重载（一个类中可以存在多个名字相同但是参数不同的函数）
