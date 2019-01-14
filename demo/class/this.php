<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午2:18
 */

//$this 代表当前类的当前对象，相当于 $ret =new 类
class A {
    function __construct()
    {
        var_dump($this);
    }
}
new A;
