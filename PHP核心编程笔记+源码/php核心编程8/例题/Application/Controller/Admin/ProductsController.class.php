<?php
/**
*控制器必须以Controller结尾(控制器名+Controller)
*方法名必须以Action结尾 （方法名+Action）
*/
class ProductsController extends Controller {
	//获取商品的所有数据
	public function listAction() {
		$model=new ProductsModel();
		$rs=$model->getList();
		require __VIEW__.'showList.html';
	}
	public function delAction() {
		$id=$_GET['id'];
		$model=new ProductsModel();
		if($model->delProducts($id))
                    $this->success('index.php?p=Admin&c=Products&a=list', '删除成功',1);
		else {
                    $this->error('index.php?p=Admin&c=Products&a=list', '删除失败');
		}
	}
        //测试session入库
        public function testAction(){
            $_SESSION['name']='tom';
            echo $_SESSION['name'];
        }

}
