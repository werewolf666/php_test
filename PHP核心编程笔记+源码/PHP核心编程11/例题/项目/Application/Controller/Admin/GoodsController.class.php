<?php
class GoodsController extends Controller{
    //显示商品列表
    public function listAction(){
        $model=new GoodsModel();
        $list=$model->select();
        require __VIEW__.'goods_list.html';
    }
    //添加商品
    public function addAction(){
        if(!empty($_POST)){
            $data['name']=$_POST['goods_name'];
            $data['price']=$_POST['shop_price'];
            $data['categoryid']=$_POST['cat_id'];
            $data['status']=  isset($_POST['status'])?implode(',',$_POST['status']):'';
            $data['goods_desc']=$_POST['goods_desc'];
             //文件上传
            $upload=new UploadLib();
            if(!$path=$upload->upload($_FILES['goods_img'])){
                $this->error('index.php?p=Admin&c=Goods&a=add',$upload->getError());
                exit;
            }
            $data['img']=$path; //源图的路径
            //生成缩略图
            $image=new ImageLib();
            $src_path=$GLOBALS['config']['app']['upload_path'].$path;
            $data['img_thumb_sm']=$image->thumb($src_path, 100, 100,'sm_');
            $data['img_thumb_mid']=$image->thumb($src_path, 300, 300,'mid_');
            //写入数据库
            $model=new GoodsModel();
            if($model->insert($data))
                $this->success ('index.php?p=Admin&c=Goods&a=list');
            else
                $this->error ('index.php?p=Admin&c=Goods&a=add','添加失败');            
            exit;
        }
        $cat_Model=new CategoryModel();
        $cat_list=$cat_Model->getCategoryTree();
        require __VIEW__.'goods_add.html';
    }
}

