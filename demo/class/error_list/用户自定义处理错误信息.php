<?php
/**
 * 用户自定义处理错误信息
 * @param $level 错误级别
 * @param $msg 错误信息
 * @param $file 错误文件
 * @param $line 错误行号
 */
function customerError($level,$msg,$file,$line){
    switch ($level){
        case E_NOTICE:
        case E_USER_ERROR:
            echo '将错误屏蔽掉','<br>';
            break;
        case E_WARNING:
        case E_USER_WARNING:
            echo '发邮件给管理员','<br>';
            break;
        case E_ERROR:
        case E_USER_ERROR:
            echo '立马给管理员发信息','<br>';
            break;
    }
        echo '文件错误信息'.$msg,'<br>';
        echo '错误文件名'.$file,'<br>';
        echo '错误文件行号'.$line,'<pr>';
}

set_error_handler('customerError');
echo $num,'<br>';
trigger_error('警告你',E_USER_WARNING);
mysql-c();

