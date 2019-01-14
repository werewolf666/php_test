<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-28
 * Time: 下午3:35
 */

//首页,加载公共文件
include_once '/var/www/html/test/project/public/public.php';

//加载mysql文件
include_once  '/var/www/html/test/project/public/mysql.php';

//组织sql语句查询信息
$sql="select * from sline_member";

//执行
$res=my_error($sql);

include_once '/var/www/html/test/templates/index.html';
//去除所有数据
$members=array();
while( $row = mysql_fetch_assoc($res) ) {
    $members[] = $row;
}


