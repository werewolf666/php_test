<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午4:18
 */

//finnal 修饰的类不能被继承
//finnal 修饰的累的成员不能被继承或者重写
// final public function == public final funtion
// static public function == static final funtion

class Person{
    public static $name='man';
}
class ChinesePerson extends Person{
}