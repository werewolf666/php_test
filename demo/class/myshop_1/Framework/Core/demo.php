<?php
//echo ip2long('127.0.0.1'),'<br>';
//echo long2ip('2130706433'),'<br>';
//<img src="../Public/images/success.jpg" title="success">

/**
 * 总控制器基础类，所有控制器都继承这个类
 */

class Controller{
    //这是一个基础控制器类

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
        echo getcwd(),'<br>';
        if($msg==''){
            header("location:{$url}");
        }else{
            if($flag)
                $path='<img src="../../Public/images/success.jpg" atl="success" />';
            else
                $path='<img src="../../Public/images/error.jpg" atl="error" />';
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

$rs=new Controller();
$rs->success('https://www.baidu.com','ok');