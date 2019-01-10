<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午4:06
 */

class Person{
    public static $type='man';
    public function showPer()
    {
        echo self::$type;
        echo static::$type;//static::静态成员 表示运行时的类名
    }
}

class Student extends Person{
    public static $type='学生';
    public function showStu(){
        echo self::$type;
    }
}

$stu=new Student();
$stu->showPer();
echo '<hr>';
$stu->showStu();