<?php
class GoodsController extends Controller{
    //显示商品列表
    public function listAction(){
        $model=new GoodsModel();
        $pagesize=$GLOBALS['config']['admin']['goods_pagesize']; //页面大小
        $count=$model->count(); //总记录数
        $pagecount=  ceil($count/$pagesize);    //总页数
        $pageno=isset($_GET['pageno'])?$_GET['pageno']:1;   //当前页
        if($pageno<1)
            $pageno=1;
        if($pageno>$pagecount)
            $pageno=$pagecount;
        $list=$model->getPageList($pageno, $pagesize);  //分页
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
            try
            {
                $upload=new UploadLib();
                $upload->upload($_FILES['goods_img']);
            } catch (Exception $ex) {
                $this->error('index.php?p=Admin&c=Goods&a=add', $ex->getMessage());
              exit;
            }
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
    /*
     * 修改商品
     */
    public function modifyAction(){
        $goodsid=$_GET['goodsid'];
        //获取商品信息
        $goods_Model=new GoodsModel();
        $goods_info=$goods_Model->find($goodsid);
        if(!empty($_POST)){
            $data['name']=$_POST['goods_name'];
            $data['price']=$_POST['shop_price'];
            $data['categoryid']=$_POST['cat_id'];
            $data['status']=  isset($_POST['status'])?implode(',',$_POST['status']):'';
            $data['goods_desc']=$_POST['goods_desc'];
             //文件上传
            if($_FILES['goods_img']['name']!=''){
                $upload=new UploadLib();
                if(!$path=$upload->upload($_FILES['goods_img'])){
                    $this->error('index.php?p=Admin&c=Goods&a=add',$upload->getError());
                    exit;
                }
                $this->delRubbishImage($goods_info); //删除垃圾文件
                $data['img']=$path; //源图的路径
                //生成缩略图
                $image=new ImageLib();
                $src_path=$GLOBALS['config']['app']['upload_path'].$path;
                $data['img_thumb_sm']=$image->thumb($src_path, 100, 100,'sm_');
                $data['img_thumb_mid']=$image->thumb($src_path, 300, 300,'mid_');
            }
            $data['goodsid']=$goodsid;
            //更改数据库
            $model=new GoodsModel();
            if($model->update($data))
                $this->success ('index.php?p=Admin&c=Goods&a=list');
            else
                $this->error ('index.php?p=Admin&c=Goods&a=add','修改失败');            
            exit;
        }
        //获取商品类别
        $cat_Model=new CategoryModel();
        $cat_list=$cat_Model->getCategoryTree();
        require __VIEW__.'goods_update.html';
    }
    /*
     * 删除商品
     */
    public function delAction(){
        $goodsid=(int)$_GET['goodsid'];
        $model=new GoodsModel();
        $goodsinfo=$model->find($goodsid);
        if($model->del($goodsid)){
            $this->delRubbishImage($goodsinfo);
            $this->success('index.php?p=Admin&c=Goods&a=list', '删除成功',1);
        }else{
            $this->error('index.php?p=Admin&c=Goods&a=list', '删除失败');
        }
    }
    //删除垃圾图片
    private function delRubbishImage($goodsinfo){
        $img=$GLOBALS['config']['app']['upload_path'].$goodsinfo['img'];
        $img_thumb_sm=$GLOBALS['config']['app']['upload_path'].$goodsinfo['img_thumb_sm'];
        $img_thumb_mid=$GLOBALS['config']['app']['upload_path'].$goodsinfo['img_thumb_mid'];
        if(file_exists($img))
            unlink ($img);  //删除文件
        if(file_exists($img_thumb_sm))
            unlink ($img_thumb_sm);
        if(file_exists($img_thumb_mid))
            unlink ($img_thumb_mid);
    }
}

