<?php
class CategoryController extends Controller{
    //显示商品类别类别
    public function listAction(){
        $model=new CategoryModel();
        $list=$model->getCategoryTree();
        require __VIEW__.'category_list.html';
    }
    //添加商品类别
    public function addAction(){
        $model=new CategoryModel();
        if(!empty($_POST)){ //执行添加逻辑
            $data['name']=$_POST['cat_name'];
            $data['parentid']=$_POST['parent_id'];
            $data['sort_order']=$_POST['sort_order'];
            if($model->insert($data))
                $this->success ('index.php?p=Admin&c=Category&a=list', '添加成功',1);
            else
                $this->error ('index.php?p=Admin&c=Category&a=add', '添加失败');
            exit;
        }
        $list=$model->getCategoryTree();
        require __VIEW__.'category_add.html';
    }
    //更新商品类别
    public function updateAction(){
        $id=(int)$_GET['id'];
        $model=new CategoryModel();
        if(!empty($_POST)){
            $data['name']=$_POST['cat_name'];
            $data['parentid']=$_POST['parent_id'];
            $data['sort_order']=$_POST['sort_order'];
            $data['id']=$id;
            //自己不能是自己的子级
            if($id==$data['parentid']){
                $this->error('index.php?p=Admin&c=Category&a=list', '自己不能是自己的子级', 3);
                exit;
            }
            //指定的父级不能是自己的后代
            $sublist=$model->getCategoryTree($id);  //当前节点下的所有子元素
            foreach($sublist as $rows){
                if($rows['id']==$data['parentid']){
                    $this->error('index.php?p=Admin&c=Category&a=list', '指定的父级是自己的后代');
                    exit;
                }
            }
            if($model->update($data))
                $this->success ('index.php?p=Admin&c=Category&a=list', '修改成功',1);
            else
                $this->error ('index.php?p=Admin&c=Category&a=add', '修改失败');
            exit;
        }
        $info=$model->find($id);    //需要修改的商品类别信息
        $list=$model->getCategoryTree();    //商品类别树型结构
        require __VIEW__.'category_update.html';
    }
    /*
     * 删除商品类别
     */
    public function delAction(){
        $id=(int)$_GET['id'];
        $model=new CategoryModel();
        if($model->isLeaf($id)){
            if($model->del($id))
                $this->success ('index.php?p=Admin&c=Category&a=list', '删除成功',1);
            else
                $this->error ('index.php?p=Admin&c=Category&a=list', '删除失败');
        }
        else
            $this->error ('index.php?p=Admin&c=Category&a=list', '此节点下有节点，不允许删除');
    }
}
