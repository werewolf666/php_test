<?php

class CategoryController extends Controller{
    /**
     * 显示商品页面
     */
    public function listAction(){
        $model=new CategoryModel();
        $list=$model->select(); //将list全部遍历出来 array形式
        require __VIEW__.'category_list.php';
    }

    /**
     * 添加商品页面
     */
    public function addAction(){
        $model=new CategoryModel();
        if (!empty($_POST)){
            $data['name']=$_POST['cat_name'];
            $data['parent_id']=$_POST['parent_id'];
            $data['sort_order']=$_POST['sort_order'];
            if ($model->insert($data))
                $this->success('index.php?p=admin&c=category&a=list','添加成功');
            else
                $this->error('index.php?p=admin&c=category&c=add','添加失败');
            exit;
        }
        $list=$model->getCategoryTree();
        require __VIEW__.'category_add.php';
    }

    /**
     * 更新商品函数
     * 重点是不能修改自己的父级为自己的子级 判断
     */
    public function updateAction(){
        $id=(int)$_GET['id'];
        $model=new CategoryModel();
        if (!empty($_POST)){
            $data['id']=$id;
            $data['name']=$_POST['cat_name'];
            $data['parent_id']=$_POST['parent_id'];
            $data['sort_order']=$_POST['sort_order'];
            if ($id==$data['parent_id']){
                $this->error('index.php?p=admin&c=category&a=list','不能修改自己为父级id为自己的id');
                exit;
            }
            $sublist=$model->getCategoryTree($id); //当前级别一下的所有商品
            foreach ($sublist as $rows){
                if ($rows['id']==$data['parent_id']){
                    $this->error('index.php?p=admin&c=category&a=list','指定的父级为自己的子级');
                    exit;
                }
            }
            if ($model->update($data))
                $this->success('index.php?p=admin&c=category&a=list','修改成功');
            else
                $this->error('index.php?p=admin&c=category&a=update','修改失败');
            exit;
        }
        $info=$model->find($id); //需要修改当前商品的id
        $list=$model->getCategoryTree(); //商品类别
        require __VIEW__.'category_update.php';
    }

    public function delAction(){
        $id=(int)$_GET['id'];
        $model=new CategoryModel();
        if ($model->isLeaf($id)){
            if($model->del($id)){
                $this->success('index.php?p=admin&c=category&a=list','删除成功',1);
            }
        }
        else{
            $this->error('index.php?p=admin&c=category&a=list','该节点存在子节点，必须先删除子节点才能删除该节点');
        }
    }


}