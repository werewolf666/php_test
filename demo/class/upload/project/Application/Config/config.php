<?php
return array(
    //数据库配置
    'database'=>array(
        'host'=>'127.0.0.1',
        'port'=>3306,
        'username'=>'root',
        'password'=>'root',
        'dbname'=>'project',
        'charset'=>'utf8'
    ),
    //app配置
    'application'=>array(
        'default_platform'      =>'Admin',
        'default_controller'    =>'Login',
        'default_action'        =>'login',
        'key'                   =>'php',
        'upload_path'           =>PUBLIC_PATH.'uploads',
        'upload_type'           =>array('image/png','image/jpeg','image/gif'),
        'upload_size'           =>10000000
    ),
    //后台显示配置
    'admin'=>array(
        'goods_pagesize'        =>1
    )

);