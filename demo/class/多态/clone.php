<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 上午10:23
 */

class Person{
     private $is_clone=false;
     protected $name='alex';

     public function __clone()
     {
         // TODO: Implement __clone() method.
         $this->is_clone=true;
     }


}

// 克隆用来复制对象
$per=new Person();
var_dump($per);
echo '<br>';
$per1=clone $per;
var_dump($per1);