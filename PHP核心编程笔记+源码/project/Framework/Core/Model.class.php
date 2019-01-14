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
        $this->db=MYSQLDB::getInstance($GLOBALS['config']['database']);
    }
}