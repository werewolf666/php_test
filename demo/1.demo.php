<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 18-12-3
 * Time: 下午8:06
 */

//自动创建函数 creat_function,只加载需要的函数，避免内存浪费。
function fun_ch($name){
   echo '你好'.$name;
}
function fun_eng($name){
   echo 'hello'.$name;
}
$lang='eng';
if($lang=='ch'){
    $fn=create_function('$name','echo \'你好\'.$anme;');
}
elseif ($lang=='eng'){
    $fn=create_function('$name','echo \'hello\'.$anme;');
};

//function_exists:判断这个函数是否存在，避免报错或者重复

function fun(){
    echo 'fun';
}
if(function_exists('fun1')){
    echo '创建fun1';
}

elseif(function_exists('fun')){
    fun();
}