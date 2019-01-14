<?php
/**
 * 说明：传递不同的参数获取不同的对象
 */

abstract class Product{
    abstract public function getName();
}


class ProductA extends Product{
    public function getName(){
        echo 'This is product A ','<br>';
    }
}

class ProductB extends Product{
    public function getName(){
        echo 'This is product B ','<br>';
    }
}

// 工厂模式
class ProductFactory{
    public static function create($num){
        switch($num){
            case 1:
                return new ProductA();
            case 2:
                return new ProductB();
        }
        return null;
    }
}

$obj=ProductFactory::create(1);
$obj->getName();
$obj=ProductFactory::create(2);
$obj->getName();