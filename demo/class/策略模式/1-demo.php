<?php
/**
 * 传递不同的参数调用不同的函数
 */

interface Istrategy{
    function ontheway();
}

class Walk implements Istrategy{
    public function ontheway()
    {
        echo 'By Walk','<br>';
        // TODO: Implement ontheway() method.
    }
}

class Bike implements Istrategy{
    public function ontheway()
    {
        echo 'By bike','<br>';
        // TODO: Implement ontheway() method.
    }
}

class Bus implements Istrategy{
    public function ontheway()
    {
        echo 'By bus','<br>';
        // TODO: Implement ontheway() method.
    }
}

// 策略模式；传递不同的参数调用不同的参数
class Strategy{
    public function getWay(Istrategy $obj){
        $obj->ontheway();
    }
}

$way=new Strategy();
$way->getWay(new Walk());
$way->getWay(new Bike());
$way->getWay(new Bus());