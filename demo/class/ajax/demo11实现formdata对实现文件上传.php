<?php
/**
 * 通过ajax 实例化formdata对象上传文件
 */
//
//var_dump($_FILES);
//var_dump($_POST);

//接收文件并且 move_uploaded_file()
$path='./upload/'.$_FILES['face']['name'];
if(move_uploaded_file($_FILES['face']['tmp_name'],$path)){
    echo 'upload success';
}