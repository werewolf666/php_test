<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午5:15
 */

abstract class Good{
    abstract public function fun1();
}

abstract class Goods{
    // 这样每次都写很麻烦，可将将他们申明为接口 interface
    abstract public function add();
    abstract public function update();
    abstract public function showList();
    abstract public function delete();
    abstract public function fun1();
    abstract public function fun2();
    }

interface Goods1{
    public function add();
    public function update();
//    public function showList();
//    public function delete();
//    public function fun1();
//    public function fun2();
}

interface Goods2{
    public function showList();
    public function delete();
}

// 接口继承 implements
// 类不允许多重继承，但是接口interface允许多重继承
// 接口可以先实现在继承
class Goods3 extends Good implements Goods1,Goods2 {

    public function fun1()
    {
        // TODO: Implement fun1() method.
        echo 'fun1';
    }

    public function add()
    {
        // TODO: Implement add() method.
        echo 'add','<br>';
    }

    public function update()
    {
        // TODO: Implement update() method.
        echo 'update','<br>';
    }

    public function showList()
    {
        // TODO: Implement showList() method.
        echo 'showlist','<br>';
    }

    public function delete()
    {
        // TODO: Implement delete() method.
        echo 'delete','<br>';
    }
}

$ret= new Goods3();
$ret->add();
$ret->update();
$ret->showList();
$ret->delete();
$ret->fun1();
