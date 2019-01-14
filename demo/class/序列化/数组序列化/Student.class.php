<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:27
 */

class Student{
    private $name;
    private $sex;
    private $age;

    public function __construct($name,$sex,$age)
    {
        $this->name=$name;
        $this->sex=$sex;
        $this->age=$age;
    }

    public function show(){
        echo $this->name,'<br>';
        echo $this->sex,'<br>';
        echo $this->age,'<br>';
    }
}
