<?php
/**
*控制器必须以Controller结尾(控制器名+Controller)
*方法名必须以Action结尾 （方法名+Action）
*/
class ProductsController {
	//获取商品的所有数据
	public function listAction() {
		$model=new ProductsModel();
		$rs=$model->getList();
		require './showList.html';
	}
	public function addAction() {
		require './add.html';
	}
	public function modifyAction() {
		require './modify.html';
	}
	public function delAction() {
		$id=$_GET['id'];
		$model=new ProductsModel();
		if($model->delProducts($id))
			header('location:index.php?c=Products&a=list');
		else {
			echo '删除失败';
		}
	}
}
