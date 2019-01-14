<?php
/**
 * 设置cookie
 *
 */
setcookie('name','tome');
setcookie('sex','man');
setcookie('age','10');
setcookie('stu');
var_dump($_COOKIE) ;
setcookie('name',false);//删除cookie

