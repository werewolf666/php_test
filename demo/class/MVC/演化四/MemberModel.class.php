<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-12
 * Time: 下午4:13
 */

class MemberModel extends Model {

     /**
      * 获取表中的所有数据
      *
      */
     public function getList($sql){
         return $this->db->fetchAll($sql);
     }


     /**
      * 添加数据
      */
     public function add(){

     }

     /**
      * 删除数据
      *
      */
     public function delete(){

     }
}

