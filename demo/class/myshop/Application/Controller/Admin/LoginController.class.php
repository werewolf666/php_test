<?php
class LoginController extends Controller{
    /**
     *进入登录页面
     */
    public function loginAction(){
        if (!empty($_POST)){
            //跳转管理员页面
            $this->success('index.php?p=admin&c=admin&a=admin');

        }else{
            require __VIEW__.'login.html';
        }
    }

    public function logoutAction(){
        $this->success('index.php?p=admin&c=login&a=login');
    }


}