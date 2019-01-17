<?php



class SessionLib{

    private $db;

    public function __construct()

    {

        session_set_save_handler(
            array($this,'open'),
            array($this,'close'),
            array($this,'read'),
            array($this,'write'),
            array($this,'destory'),
            array($this,'gc')
        );
//        echo '__construct';
    }

    /**
     * 打开回话
     */
    public function open(){
        $this->db=MYSQLDB::getInstance($GLOBALS['config']['database']);
//        var_dump($this->db);
    }

    /**
     * 关闭回话
     */
    public function close(){
        return true;
    }

    /**
     * @param $session_id string
     *
     */
    public function read($sess_id){
        $sql="select sess_value from sess where sess_id='$sess_id'";
        return $this->db->fetchColum($sql);//fetchColum
    }

    /**
     * @param $sesion_id string
     * 写入回话
     */
    public function write($sess_id,$sess_value){
        $time=time();
        $sql="insert into sess values ('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value'";
        return $this->db->query($sql);
    }

    /**
     * @param $sesion_id string
     * 销毁会话
     */
    public function destory($sess_id)
    {
        $sql = "delete from sess where sess_id='$sess_id'";
        return $this->db->query($sql);
    }


    /**
     * @param $maxlifetime string
     * 垃圾回收
     */
    public function gc($maxlifetime){
        $time=time()-$maxlifetime;
        $sql="delete from sess where sess_expires<$time";
        return $this->db->query($sql);
    }
}

//$s=new SessionLib();
//$s->open();
//var_dump($s->write('22323','write'));