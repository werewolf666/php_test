<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:34
 */

class MYSQLDB{
    private $host;
    private $port;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $link;
    private static $instance;


    private function initParam($config){
        $this->host = ($config['host']) ? $config['host'] : '127.0.0.1';
        $this->port = ($config['port']) ? $config['port'] : 3306;
        $this->username = ($config['username']) ? $config['username'] : 'root';
        $this->password = ($config['password']) ? $config['password'] : 'root';
        $this->dbname = ($config['dbname']) ? $config['dbname'] : 'project';
        $this->charset = ($config['charset']) ? $config['charset'] : 'utf8';
    }


    private function connect(){
        $this->link=mysql_connect("{$this->host}:{$this->port}","{$this->username}","{$this->password}") or die('connect faile');
    }


    public function setcharset(){
        $sql="set names {$this->charset}";
        $this->query($sql);
    }


    /**
     * @param $sql
     */
    public function query($sql){

        if(!$result=mysql_query($sql,$this->link)){
            echo $sql.'执行失败','<br>';
            echo '错误代码信息：',mysql_error(),'<br>';
            exit;
        }
        return $result;
    }


    private function selectDB(){
        $sql="use {$this->dbname}";
        $this->query($sql);
    }


    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


    /**
     * @param array $config
     * @return MYSQLDB
     */
    public function getInstance($config=array()){
        if(!self::$instance instanceof self)
            self::$instance=new self($config);
        return self::$instance;
    }


    private function __construct($config){
        $this->initParam($config);
        $this->connect();
        $this->setcharset();
        $this->selectDB();
    }


    /**
     *
     */
    public function fetchAll($sql,$fetch_type='assoc'){
        $rs=$this->query($sql);
        $fetch_types=array('assoc','row','array');
        if(!in_array($fetch_type,$fetch_types))
            $fetch_type='assoc';
        $fetch_fun='mysql_fetch_'.$fetch_type;
//        echo $fetch_fun,'<br>';
        $array=array();
        while ($rows=$fetch_fun($rs)){
            $array[]=$rows;
        }
//        echo $array,'<br>';
        return $array;
    }

    /**
     *获取结果中的第一条记录
     */
    public function fetchRow($sql,$fetch_type='assoc'){
        $rs=$this->fetchAll($sql,$fetch_type);
        if(!empty($rs))
            return $rs[0];
        return null;
    }


    /**
     * 获取第一行第一列记录
     *
     */
    public function fetchColum($sql){
        $rs=$this->fetchRow($sql,'row');
        return empty($rs)?null:$rs[0];
    }
}

