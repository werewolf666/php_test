<?php

class AdminController extends Controller{

    public function adminAction(){
        // 登录成功跳转页面
        require __VIEW__.'admin.php';
    }

    public function topAction(){
        require __VIEW__.'top.php';
    }

    public function menuAction(){
        require __VIEW__.'menu.php';
    }

    public function dragAction(){
        require __VIEW__.'drag.php';
    }

    public function mainAction(){
        require __VIEW__.'main.php';
    }
}