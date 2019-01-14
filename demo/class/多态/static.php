<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午3:11
 */

//static 修饰静态方法,可以直接在外部进行调用—类名::方法or属性
class A{
    public $name;
    public static $name1='alex';
    public static function show(){
        echo 'this is a static function and values','<br>';
    }
}

A::show();
echo A::$name1;
