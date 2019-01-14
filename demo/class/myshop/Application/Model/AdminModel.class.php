<?php
class AdminModel extends Model{
    /*
     * 通过用户名和密码获取用户信息
     * @param $username string 用户名
     * @param $pwd string 密码
     * @return array 用户的信息
     */
    public function getAdminByUserNameAndPwd($username,$pwd){
        $username=  mysql_real_escape_string($username);    //防止SQL注入
        $pwd=md5($pwd); //将密码进行md5加密 
        $sql="select * from pr_admin where username='$username' and password='$pwd'";
        return $this->db->fetchRow($sql);   //返回用户信息
    }
    /*
     * 通过cookie获取用户信息
     */
    public function getAdminByCookie(){
        if(!isset($_COOKIE['id']) || !isset($_COOKIE['pwd']) || isset($_SERVER["HTTP_REFERER"])){
            return false;
        }
        $id=  mysql_real_escape_string($_COOKIE['id']);
        $pwd=$_COOKIE['pwd'];
        $sql="select * from pr_admin where id=$id";
        if($info=  $this->db->fetchRow($sql)){
            return md5($info['name'].$info['pwd'].$GLOBALS['config']['app']['key'])==$pwd?$info:false;
        }
        return false;
    }
    /*
     * 登录成功后，更新登陆信息
     */
    public function updateLoginInfo(){
        $ip=  ip2long($_SERVER['REMOTE_ADDR']);
        $time=time();
        $id=$_SESSION['admin']['id'];
        $sql="update admin set last_login_ip=$ip,last_login_time=$time where id=$id";
        return $this->db->query($sql);
    }
}
