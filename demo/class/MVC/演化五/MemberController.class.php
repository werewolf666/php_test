<?php
/**
 * 控制器
 */

class MemberController{
    public function listAction(){
        // 获取数据
        $model=new MemberModel();
        $sql="select * from sline_member";
        $rs=$model->getList($sql);
        require __DIR__."/showList.php";
    }

    public function addAction(){
//        echo 'add member';
        require __DIR__."/add.php";
    }

    public function updateAction(){
//        echo 'update member';
        require __DIR__."/update.php";
    }

    public function delAction(){
//        echo 'update member';
        require __DIR__."/del.php";
    }

}