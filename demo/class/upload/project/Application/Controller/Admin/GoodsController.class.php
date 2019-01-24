<?php
/**
 * 商品类
 */
class GoodsController extends Controller{
    /**
     * 显示商品方法
     */
    public function listAction(){
        require __VIEW__.'goods_list.php';
    }

    /**
     * 添加商品方法
     */
    public function addAction(){
        require __VIEW__.'goods_add.php';
    }

}