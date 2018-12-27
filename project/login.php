<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-27
 * Time: 下午4:06
 */
header('content-type:text/html;charset=utf-8');

//处理用户登录的所有请求
//判断用户提交信息
if(isset($_POST['submit'])){
    //判断用户信息


    //接受用户数据

    $usename=trim($_POST['usename']);
    $password=trim($_POST['password']);

    //合法性验证
    if(empty($usename)||empty($password)){
        //用户名密码不能为空
        header('refresh:1,url=login.php');
        echo '用户名密码不能为空';
        exit;
    }
    //查询用户名密码是否正确
    //加载数据库公共文件
    include_once 'var/www/html/test/project/public/mysql.php';
    $sql='select * from pr_

}else{
    //加载登录页面
    include_once '/var/www/html/test/templates/login.html';
}
