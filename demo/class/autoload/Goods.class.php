<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午6:19
 */
// 商品类

class Goods{
    protected $name;
    final public function setName($name){
        $this->name=$name;
    }

    abstract public function getName();
}