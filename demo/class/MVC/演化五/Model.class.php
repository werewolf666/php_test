<?php

/**
 * 基础模型类用来封装所有需要链接数据库的公共属性和方法
 * Class Model
 */

class Model{
    protected $db; // 保存MySQLDB类的单例

    /**
     * MemberModel constructor.
     * 构造函数初始化数据库
     */
    public function __construct()
    {
        $this->initDB();
    }

    // 获取MySQLDB类的实例化
    private function initDB(){
        $config = array(
            'host'=>'127.0.0.1',
            'port'=>3306,
            'username'=>'root',
            'password'=>'root',
            'dbname'=>'project',
            'charset'=>'utf8');
        $this->db=MYSQLDB::getInstance($config);
    }
}