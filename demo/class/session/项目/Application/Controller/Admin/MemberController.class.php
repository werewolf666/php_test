<?php
/**
 * 控制器
 */

//MemberController
class MemberController extends Controller {
    public function listAction(){
        // 获取数据
        $model=new MemberModel();
        $sql="select * from sline_member";
        $rs=$model->getList($sql);
        require __VIEW__."showList.php";
    }

    public function addAction(){
//        echo 'add member';
        require __VIEW__."add.php";
    }

    public function updateAction(){
//        echo 'update member';
        require __VIEW__."update.php";
    }

    /**
     * 删除函数
     *
     */
    public function delAction(){
//        echo 'update member';
        $id=$_GET['id'];
        $model=new MemberModel();
        if($model->delete($id)){
            //删除成功的跳转
            $this->success('index.php?p=Admin&c=Member&a=list',true,'删除成功',1);
//            header('location:index.php?c=member&a=list');
        }
        else{
            // 删除失败的跳转
            $this->error('index.php?p=Admin&c=Member&a=list',false,'删除失败',3);
//            echo '删除失败';
        }
    }

    // 测试session入库函数
    public function sessionAction(){
        $rs=new SessionLib();
        session_start();
        $_SESSION['name']='iphone';
        $rs->write($_SESSION,$_SESSION['name']);
    }
}

