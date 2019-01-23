<?php

/**
 * 总控制器基础类，所有控制器都继承这个类
 */

class Controller{
    //这是一个基础控制器类

    public function __construct()
    {

        $this->initSession();//初始化sessionLib
        $this->checkLogin();//初始化checkLogin方法
    }

    /**
     * 初始化sessionLib类
     *
     */
    public function initSession(){
        require LIB_PATH.'SessionLib.class.php';
        new SessionLib();
        session_start();
    }


    /**
     * 防止翻墙，将用户信息写入session中，用户如果没有回话记录的话是需要登录的。
     */
    private function checkLogin(){
        if (strtolower(CONTROLLER_NAME=='login' or strtoupper(CONTROLLER_NAME=='Login')))
            return;
        if(empty($_SESSION['admin'])){
            header('location:index.php?p=Admin&c=login&a=login');
            exit;
        }
    }


    /**
     * @param $url
     * @param $flag
     * @param string $msg
     * @param int $time
     * 操作成功方法
     */
    public function success($url,$msg='',$time=3){
        $this->jump($url,$flag=true,$msg);
    }

    /**
     * @param $url
     * @param $flag
     * @param string $msg
     * @param int $time
     * 失败跳转方法
     */
    public function error($url,$msg='',$time=1){
        $this->jump($url,$flag=false,$msg);
    }

    /**
     * 跳转方法
     */
    private function jump($url,$flag,$msg='',$time=3){
//        require __VIEW__.'jump.php';

        if($msg==''){
            header("location:{$url}");
        }else{
            if($flag)
                $path='<img src="../../Public/images/success.jpg" title="success" />';
            else
                $path='<img src="../../Public/images/error.jpg" title="error" />';
            echo <<<jump
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta http-equiv="refresh" content="{$time};{$url}" />
    <title>跳转页面</title>
    <style type="text/css">
        body{
            text-align:center;
            font-size:36px;
            background-color: darkgray;
            color:#f00;
            padding-top: 30px;
            font-family: "Microsoft YaHei UI"
        }
    </style>
</head>
<body>
<div class="path">{$path}</div>
<div class="msg">{$msg}</div> 
</body>
</html>
jump;
        }
    }
}
