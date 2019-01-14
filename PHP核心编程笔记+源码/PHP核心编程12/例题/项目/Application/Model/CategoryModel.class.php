<?php
class CategoryModel extends Model{
    /*
     * 创建树型结构
     */
    private function createTree($list,$parentid=0,$deep=0) {
	static $tree=array();
	foreach($list as $rows) {
            if($rows['parentid']==$parentid){
                $rows['deep']=$deep;
                $tree[]=$rows;
                $this->createTree($list,$rows['id'],$deep+1);
            }
	}
	return $tree;
    }
    /*
     * 获得商品类别的树型结构
     */
    public function getCategoryTree($parentid=0){
        $list=  $this->select();
        return $this->createTree($list,$parentid);
    }
    /*
     * 判断一个节点是否是叶子节点
     */
    public function isLeaf($id){
        $sql="select count(*) from category where parentid=$id";
        return !$this->db->fetchColumn($sql);
    }
}