<?php
class LoginController extends Controller{
    /**
     *进入登录页面
     */
    public function loginAction(){
        $model=new AdminModel(); //实例化Adminmodel
        if (!empty($_POST)){
            // 获取验证码
            $captcha=new CaptchaLib();
            $code=$_POST['captcha'];
            if(!$captcha->checkCaptcha($code)){
                $this->error('index.php?p=Admin&c=Login&a=login','验证码错误');
                exit;
            };
            //跳转管理员页面
            $username=mysql_escape_string($_POST['username']); //防止sql注入，将引号注释掉
            $pwd=$_POST['password'];
            $info=$model->getAdminByUserNameAndPwd($username,$pwd);
            if($info)
            {
                // ------------记录登录开始--------------
                if (isset($_POST['remember'])){
                    setcookie('id',$info['id'],5000);
                    setcookie('pwd',md5($info['name'].$info['pwd'].$GLOBALS['config']['application']['key']),5000);
                }
                // -----------记录登录结束-----------------

                $this->success('index.php?p=admin&c=admin&a=admin','登陆成功',1);
                $_SESSION['admin']=$info;//只要登录成功，就将session记录
                $model->updateLoginInfo(); //更新登录信息
            }
            else
            {
                $this->error('index.php?p=admin&c=login&a=login','登录失败');
            }
        }else
        // 如果有cookie，通过cookie登录
        if ($info=$model->getAdminByCookie()){
            $this->success('index.php?p=admin&c=admin&a=admin');
            $_SESSION['admin']=$info;//只要登录成功，就将session记录
            $model->updateLoginInfo(); //更新登录信息
        }else{
            require __VIEW__.'login.html';
        }
    }

    /**
     * 安全退出登录
     */
    public function logoutAction(){
        session_destroy();
        $this->success('index.php?p=admin&c=login&a=login');
    }

    /**
     * 获取验证码
     */
    public function generalCapchaAction(){
        $captcha=new CaptchaLib();
        $captcha->generalCaptcha();
    }
}