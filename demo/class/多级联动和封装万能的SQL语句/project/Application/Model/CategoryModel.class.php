<?php

class CategoryModel extends Model{

    /**
     * 创建树型结构
     * @param $list
     * @param int $parent_id
     * @param int $deep
     * @return array
     */
    private function createTree($list,$parent_id=0,$deep=0)
    {
        static $tree = array();
        foreach ($list as $rows)
        {
            if ($rows['parent_id'] == $parent_id)
            {
                $rows['deep'] = $deep;
                $tree[] = $rows;
                $this->createTree($list, $rows['id'], $deep + 1);
            }
            return $tree;
        }
    }

    public function getCategoryTree($parent_id=0){
        $list=$this->select(); //获得数据【array】
        return $this->createTree($list,$parent_id); //返回树型结构
    }

    public function isLeaf($id){
        $sql="select count(*) from category where parent_id=$id";
        return !$this->db->fetchColum($sql); //如果是true则返回该结果，如果是false（包括0），就返回false
    }

}