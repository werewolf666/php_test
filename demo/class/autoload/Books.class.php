<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午6:21
 */

class Books extends Goods{
    public function getName(){
        echo "《{$this->name}》";
    }
}