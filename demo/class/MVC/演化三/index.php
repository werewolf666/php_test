<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-12
 * Time: 下午3:58
 */

function __autoload($class_name){
    require __DIR__."/{$class_name}.class.php";
}


// 获取数据
$model=new MemberModel();
$sql="select * from sline_member";
$rs=$model->getList($sql);
require __DIR__."/showList.php";


