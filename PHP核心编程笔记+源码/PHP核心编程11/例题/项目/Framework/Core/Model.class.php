<?php
/**
*基础模型类，用来封装所有模型的公共属性和方法
*/
abstract class Model {
    protected $db;	//用来保存MySQLDB的单例
    /**
    *构造函数初始化连接数据库
    */
    public function __construct() {
            $this->initDB();
    }
    //获取MySQLDBm类的实例
    private function initDB() {
            $this->db=MySQLDB::getInstance($GLOBALS['config']['database']);
    }
    //获取当前操作的表名
    private function getTable(){
        return substr(get_class($this),0,-5);  
    }
    //获取主键字段
    private function getPrimaryKey($table) {
        $rs=  $this->db->query("desc `{$table}`");
        while($rows=mysql_fetch_assoc($rs)) {
            if($rows['Key']=='PRI') {
                    return $rows['Field'];
            }
        }
    }
    /*
     * insert，封装一个万能的insert语句
     * @param $data array 有字段名和值组成的关联数组
     */
    public function insert($data){
        $fields=array_keys($data);		//获取所有的键，
        $values=array_values($data);	//获取所有值
        //将fields数组中的每个元素添加上反引号
        $fields=array_map(function($field){
                return "`{$field}`";
        },$fields);
        $fields_str=implode(',',$fields);	//将字段用逗号分隔
        //将values数组中的值每个元素都加上引号
        $values=array_map(function($value){
                return "'{$value}'";
        },$values);
        $values_str=implode(',',$values);
        //拼接字符串
        $table=$this->getTable();
        $sql="insert into `{$table}` ({$fields_str}) values ($values_str)";
        return $this->db->query($sql);
    }
    /*
     * update,万能的更新方法
     * @param $data array 关联数组
     */
    public function update($data){
        //获取字段
        $fields=array_keys($data);
        $table=$this->getTable();   //获取当前表
        $pk=$this->getPrimaryKey($table);   //获取表的主键
        //去除主键
        $index=array_search($pk,$fields);	//主键的下标
        unset($fields[$index]);	//销毁主键
        //遍历循环字段
        $fields=array_map(function($field) use ($data){
                return "`{$field}`='{$data[$field]}'";
        },$fields);
        $fields=implode(',',$fields);
        $sql="update `{$table}` set {$fields} where `{$pk}`=$data[$pk]";
        return $this->db->query($sql);           
    }
    /*
     * 封装一个万能的删除方法
     * @param $id mixed 主键字段的值
     */
    public function del($id){
        $table=  $this->getTable();
        $pk=  $this->getPrimaryKey($table);
        $sql="delete from `{$table}` where `{$pk}`=$id";
        return $this->db->query($sql);
    }
    /*
     * 封装一个万能的查询语句
     * @param $field string 排序字段
     * @param $order string 排序方法
     * @return array 二维数组
     */
    public function select($field='',$order='asc'){
        $table=  $this->getTable();
        $sql="select * from `{$table}`";
        if($field!=''){
            $sql.=" order by `{$field}` {$order}";
        }
        return $this->db->fetchAll($sql);
    }
    /*
     * 封装一个万能的查询语句，通过主键的值获取记录
     * @param $id mixid 主键的值
     * @return array 一维数组
     */
    public function find($id){
        $table=  $this->getTable();
        $pk=  $this->getPrimaryKey($table);
        $sql="select * from `{$table}` where `{$pk}`='{$id}'";
        return $this->db->fetchRow($sql);
    }
}
