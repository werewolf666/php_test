


<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 上午11:31
 */

/**
 * Class MYSQLDB
 * 单例模式:---三私一公
 * 1：必须要有私有的静态成员（保存当前对象）
 * 2：必有要有私有的构造函数（防止实例化）
 * 3：必须要有私有的克隆函数（防止克隆）
 * 4：必须要有一个共有函数（用来实例化当前对象）
 */


class MYSQLDB{

    private static $instance;
     private function __construct() //阻止实例化
    {
     //阻止实例化
    }

    private function __clone() //阻止克隆
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance(){
        if(!self::$instance instanceof self)
            self::$instance=new MYSQLDB();
        return self::$instance;
    }
}

$db1=MYSQLDB::getInstance();
//$db2=clone $db1;
var_dump($db1);