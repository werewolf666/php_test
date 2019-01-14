<?php
header('content-type:text/html;charset=utf-8');
$age=200;
if($age>100){
	trigger_error('年龄不能超过100');	//默认提示级别
	trigger_error('年龄不能超过100',E_USER_WARNING);	//用户警告性错误
	trigger_error('年龄不能超过100',E_USER_ERROR);		//用户致命性错误
}
