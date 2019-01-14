<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午6:03
 */


class A{
    /**
     * @param $name string
     * @param $arguments array
     */
    public function __call($name, $arguments)
    {
        echo "本类中没有{$name}方法,<br>";
        print_r( $arguments);
        // TODO: Implement __call() method.
    }

    /**
     * @param $name
     * @param $arguments
     * @return null
     */
    public static function __callStatic($name, $arguments)
    {
        echo "<br>没有这个{$name}静态方法<br>";

        // TODO: Implement __callStatic() method.
    }
}

$a1=new A;
$a1->show(10,20,30);
A::callstatic();