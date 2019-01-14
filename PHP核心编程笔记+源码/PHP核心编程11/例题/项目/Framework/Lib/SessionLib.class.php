<?php
/*
 * session入库的工具类
 */
class SessionLib{
    private $db;    //用来保存MySQLDB类的示例
    public function __construct(){
        //用户自定义存储
        session_set_save_handler(
            array($this,'open'),
            array($this,'close'),
            array($this,'read'),
            array($this,'write'),
            array($this,'destroy'),
            array($this,'gc')
        );
    }
    /**
    *打开会话
    */
    public function open() {
        $this->db=  MySQLDB::getInstance($GLOBALS['config']['database']);
    }
    /**
    *关闭会话
    */
    public function close() {
       return true;
    }
    /**
    *读取会话
    *@param $sess_id string 会话编号
    */
    public function read($sess_id) {
            $sql="select sess_value from sess where sess_id='$sess_id'";
            return $this->db->fetchColumn($sql);
    }
    /**
    *写入会话
    @param $sess_id string 会话编号
    @param $sess_value string 会话值
    */
    public function write($sess_id,$sess_value) {
            $time=time();
            $sql="insert into sess values ('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value'";
            return $this->db->query($sql);
    }
    /**
    *销毁会话，销毁自己的会话
    */
    public function destroy($sess_id) {
            //echo 'destroy<br>';
            $sql="delete from sess where sess_id='$sess_id'";
            return $this->db->query($sql);
    }
    /**
    *垃圾回收，所有的过期会话
    */
    public function gc($maxlifetime) {
            $time=time()-$maxlifetime;
            $sql="delete from sess where sess_expires<$time";
            return $this->db->query($sql);
    }    
}