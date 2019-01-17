<?php

/**
 * 总控制器基础类，所有控制器都继承这个类
 */

class Controller{
    //这是一个基础控制器类

    public function __construct()
    {
        //初始化sessionLib
        $this->initSession();
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
     * @param $url
     * @param $flag
     * @param string $msg
     * @param int $time
     * 操作成功方法
     */
    public function success($url,$flag,$msg='',$time=3){
        $this->jump($url,$flag=true,$msg);
    }

    /**
     * @param $url
     * @param $flag
     * @param string $msg
     * @param int $time
     * 失败跳转方法
     */
    public function error($url,$flag,$msg='',$time=1){
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
                $path='<img src="/Public/image/success.jpg" alt="success" />';
            else
                $path='<img src="/Public/image/error.jpg" alt="error" />';
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
{$path}
{$msg}
</body>
</html>
jump;
        }
    }
}