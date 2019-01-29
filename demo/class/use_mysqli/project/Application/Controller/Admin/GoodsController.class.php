<?php
/**
 * 商品类
 */
class GoodsController extends Controller
{
    /**
     * 显示商品方法
     */
    public function listAction()
    {
        $model=new GoodsModel();
        $pageno=isset($_GET['pageno'])?$_GET['pageno']:1; //当前页
        $pagesize=$GLOBALS['config']['admin']['goods_pagesize']; //每一页显示的条数
        $count=$model->count(); //总记录数
        $pagecount=ceil($count/$pagesize);//总页数
        if ($pageno<1)
            $pageno=1;
        if ($pageno>$pagecount)
            $pageno=$pagecount;
        $list=$model->getPageList($pageno,$pagesize); //分页
        require __VIEW__ . 'goods_list.php';
    }

    /**
     * 添加商品方法
     */
    public function addAction()
    {
        if (!empty($_POST)) {
            //上传数据获取
            $data['name'] = $_POST['goods_name'];
            $data['price'] = $_POST['shop_price'];
            $data['categoryid'] = $_POST['cat_id'];
            $data['status'] = isset($_POST['status']) ? implode(',', $_POST['status']) : '';
            $data['goods_desc'] = $_POST['goods_desc'];
            //文件上传
            $upload=new UploadLib();
            if (!$path=$upload->upload($_FILES['goods_img']))
                echo $upload->getError();
            //生成缩略图
            $image=new ImageLib();
            $src_path=$GLOBALS['config']['application']['upload_path'].DS.$path;
            $data['img_thumb_sm']=$image->thumb($src_path,200,200,'sm_',true); //生成缩略图
            $data['img_thumb_mid']=$image->thumb($src_path,400,400,'mid_'); //生成中等图
            $mode = new GoodsModel();
            if (!empty($data)){
                if ($mode->insert($data))
                    $this->success('index.php?p=admin&c=goods&a=list', '添加成功');
                else
                    $this->error('index.php?p=admin&c=goods&a=add', '添加失败');
                exit;
            }
            else{
                $this->error('index.php?p=admin&c=goods&a=add', '商品信息不完整');
                exit;
            }
        }
        $cat_Model=new CategoryModel();
        $cat_list=$cat_Model->getCategoryTree();
        require __VIEW__ . 'goods_add.php';
    }

    /**
     * 修改商品信息
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
                $src_path=$GLOBALS['config']['application']['upload_path'].DS.$path;;
                $data['img_thumb_sm']=$image->thumb($src_path, 100, 100,'sm_');
                $data['img_thumb_mid']=$image->thumb($src_path, 300, 300,'mid_');
            }
            $data['goodsid']=$goodsid;
            //更改数据库
            $model=new GoodsModel();
            if($model->update($data))
                $this->success ('index.php?p=Admin&c=Goods&a=list','修改成功',1);
            else
                $this->error ('index.php?p=Admin&c=Goods&a=add','修改失败');
            exit;
        }
        //获取商品类别
        $cat_Model=new CategoryModel();
        $cat_list=$cat_Model->getCategoryTree();
        require __VIEW__.'goods_update.php';
    }

    public function delRubbishImage($goodsinfo){
        $img_path=$GLOBALS['config']['application']['upload_path'].DS.$goodsinfo['img'];
        $img_thumb_sm_path=$GLOBALS['config']['application']['upload_path'].DS.$goodsinfo['img_thumb_sm'];
        $img_thumb_mid_path=$GLOBALS['config']['application']['upload_path'].DS.$goodsinfo['img_thumb_mid'];
        if (file_exists($img_path))
            unlink($img_path); //删除文件
        if (file_exists($img_thumb_sm_path))
            unlink($img_thumb_sm_path);
        if (file_exists($img_thumb_mid_path))
            unlink($img_thumb_mid_path);
    }

    public function delAction(){
        $goodsid=$_GET['goodsid'];
        $model=new GoodsModel();
        $goodsinfo=$model->find($goodsid);
        if ($model->del($goodsid)){
            $this->delRubbishImage($goodsinfo);
            $this->success('index.php?p=admin&c=goods&a=list','删除成功');
        }
        else{
            $this->error('index.php?p=admin&c=goods&a=list','删除失败');
        }

    }
}