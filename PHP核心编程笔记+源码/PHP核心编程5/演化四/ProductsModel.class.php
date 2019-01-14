<?php
/**
*ProductsModel，用来操作Products表
*/
class ProductsModel extends Model {
	/**
	*获取Products表的所有商品
	*/
	public function getList() {
		return $this->db->fetchAll("select *  from products");
	}
}

