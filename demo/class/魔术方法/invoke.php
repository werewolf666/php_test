<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午5:03
 */

/**
 * invoke
 *
 */

class Student{
    public function __invoke($name)
    {
        echo 'This is A Student object,not a string';
        // TODO: Implement __invoke() method.
    }

}
$stu=new Student();

echo $stu($name);