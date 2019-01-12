<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-12
 * Time: 下午4:13
 */

class MemberModel{
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

     /**
      * 获取表中的所有数据
      *
      */
     public function getList($sql){
         return $this->db->fetchAll($sql);
     }


     /**
      * 添加数据
      */
     public function add(){

     }

     /**
      * 删除数据
      *
      */
     public function delete(){

     }
}

