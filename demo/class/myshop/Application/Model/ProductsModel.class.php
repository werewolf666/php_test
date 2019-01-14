<?php
/**
*ProductsModel，用来操作Products表
*/
class ProductsModel extends Model {
	/**
	*获取Products表的所有商品
	*/
	public function getList() {
		return $this->db->fetchAll("select *  from sline_member");
	}
	//删除商品
	public function delProducts($id) {
		$sql="delete from sline_member where mid=$id";
		return $this->db->query($sql);
	}
}

