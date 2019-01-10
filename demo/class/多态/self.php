<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-10
 * Time: 下午3:30
 */

// self 表示当前类的名字  A::$num==self::$num------new A==new self
// 非静态方法被self调用时候主动转换成为静态方法
class A{
    public static $num=0;
    public function __construct()
    {
        A::$num++;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        A::$num--;
    }

    /**
     * @return int
     */
    public static function getNum()
    {
        return self::$num;
//        return A::$num;
    }
}

$user=new A;
$user1=new A;
$user2=new A;
unset($user1);
echo "{$user->getNum()}人在线";