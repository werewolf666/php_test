<?php
/*
 * 登陆的控制器
 */
class LoginController extends Controller{
    //登陆页面
    public function loginAction(){
        $model=new AdminModel();
        if(!empty($_POST)){
            $username=$_POST['username'];   //获取用户名
            $pwd=$_POST['password'];        //获取密码
            $info=$model->getAdminByUserNameAndPwd($username, $pwd);    //通过用户名和密码获取管理员信息
            if($info){
                //--------------------记住登陆开始----------------------------
                if(isset($_POST['remember'])){
                    sleep(20);
                    setcookie('id',$info['id'],PHP_INT_MAX);
                    setcookie('pwd',md5($info['name'].$info['pwd'].$GLOBALS['config']['app']['key']),PHP_INT_MAX);
                }
                //--------------------记住登陆结束----------------------------
                $_SESSION['admin']=$info;   //用户信息放到session中
                $model->updateLoginInfo();  //更新登陆信息
                $this->success('index.php?p=Admin&c=Admin&a=admin','登陆成功',1);  //跳转到管理界面
            }
            else
                $this->error ('index.php?p=Admin&c=Login&a=login', '登陆失败');
            exit;
        }
        //如果有cookie，通过cookie登陆
        if($info=$model->getAdminByCookie()){
            $_SESSION['admin']=$info;   //用户信息放到session中
            $model->updateLoginInfo();  //更新登陆信息
            $this->success ('index.php?p=Admin&c=Admin&a=admin');
            exit;
        }
        require __VIEW__.'login.html';
    }
    //退出
    public function logoutAction(){
        session_destroy();  //销毁登陆凭证
        $this->success('index.php?p=Admin&c=Login&a=login');
    }
}
