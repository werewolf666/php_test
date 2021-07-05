<?php

class AdminModel extends Model{

    /**
     * 通过用户名和密码获取用户信息
     * @param $username
     * @param $pwd
     * @return bool
     */
    public function getAdminByUserNameAndPwd($username,$pwd){
        $pwd=md5($pwd);
        $sql="select * from admin where name='$username' and pwd='$pwd'";
        $info=$this->db->fetchRow($sql);
        if ($info){
            return $info;
        }else{
            return false;
        }
    }

    /**
     * 通过cookie登录
     */
    public function getAdminByCookie(){
        if (!isset($_COOKIE['id'])||!isset($_COOKIE['pwd']) ||isset($_SERVER['HTTP_REFERER'])){ //三个条件HTTP_REFERER:从哪个页面跳转过来不用去cookie
            return false;
        }
        $id=mysql_escape_string($_COOKIE['id']);// 放sql注入
        $pwd=$_COOKIE['pwd'];
        $sql="select * from admin where id=$id";
        if ($info=$this->db->fetchRow($sql)){
            var_dump($info);
            exit;
//            return md5($info['name'].$info['pwd'].$GLOBALS['config']['application']['key'])==$pwd?$info:false; //如果cookie值相等返回
        }
    }

    /**
     * @return mixed
     */
    public function updateLoginInfo(){
        $ip=ip2long($_SERVER['REMOTE_ADDR']);
        $time=time();
        $id=$_SESSION['admin']['id'];
        $sql="update admin set last_login_ip=$ip,last_login_time=$time where id=$id";
        return $this->db->query($sql);
    }


}