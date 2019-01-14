<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午3:03
 */

class DB1{

}

class DB2{

}

class DB3{
    protected $name;
    public function __construct()
    {
    }
};

function getInstance($db_name){
    /**  // 方案1：
    switch($db_name){
        case 'DB1':
            $array[$db_name]=DB1;
        case 'DB2':
            $array[$db_name]=DB2;
        case 'DB3':
            $array[$db_name]=DB3;
    }*/


    // 方案2
    static $array=array();
    if(!isset($array[$db_name]))
        $array[$db_name]=new $db_name;
    return $array[$db_name];
}

$db1=getInstance('DB1');
$db2=getInstance('DB2');
$db3=getInstance('DB3');
var_dump($db1,$db2,$db3);

