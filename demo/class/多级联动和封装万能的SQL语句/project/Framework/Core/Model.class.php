<?php

/**
 * 基础模型类用来封装所有需要链接数据库的公共属性和方法
 * Class Model
 */

class Model
{
    protected $db; // 保存MySQLDB类的单例

    /**
     * MemberModel constructor.
     * 构造函数初始化数据库
     */
    public function __construct()
    {
        $this->initDB();
    }

    // 获取MySQLDB类的实例化
    private function initDB()
    {
        $this->db = MYSQLDB::getInstance($GLOBALS['config']['database']);
    }

    /**
     * 获取当前模型的表明
     * get_class()获取当前对象的类名，去掉Model之后就是表名字，并且使用函数strtolower(string)小写表明：
     */
    private function getTable()
    {
        return strtolower(substr(get_class($this), 0, -5));
    }

    /**
     *获取主键字段，目的是为了在updata语句中去掉这个主键
     * desc category 结果：
     * Field    Type    Null    Key    Default    Extra
     * id    int(10) unsigned    NO    PRI    NULL    auto_increment
     * name    varchar(50)    NO        NULL
     * sort_order    int(11)    NO        50
     * parent_id    int(10) unsigned    NO        NULL
     */
    private function getPrimaryKey($table)
    {
        $sql = "desc {$table}";
        $rs = $this->db->query($sql);
        while ($rows = mysql_fetch_assoc($rs)) {
            if ($rows['Key'] == 'PRI') {
                return $rows['Field'];
            }
        }
    }

    /**
     * 万能的insert语句函数
     * @param $data array 有字段名和值组成的数组
     *
     */
    public function insert($data)
    {
        $fields = array_keys($data); //获取所有键
        $values = array_values($data); //获取所有值

        // 将数组的里面的数据按照一定的格式封装（将每个键对加上反引号）
        $fields = array_map(function ($field) {
            return "`{$field}`"; // mysql中表需要用``括起来
        }, $fields);

        //将值加上引号
        $values = array_map(function ($value) {
            return "'{$value}'"; //mysql表中值需要用''括起来
        }, $values);

        $fields_str = implode(',', $fields); // 将数组内容按照指定符号（','）分开
        $values_str = implode(',', $values); // 将数组内容按照指定符号（','）分开

        $table = $this->getTable();
        $sql = "insert into `{$table}` ($fields_str) values ($values_str)";
        return $this->db->query($sql);
        //echo $sql; //insert into `category` (`name`,`sort_order`,`parent_id`) values ('电视机','30','8')
    }

    /**
     * 万能的update语句
     * @param $data array 有字段名和值组成的数组
     * @return mixed
     */
    public function update($data)
    {
        //获取字段
        $fields = array_keys($data);
        //去除主键
        $table = $this->getTable(); //获取当前表明
        $pk = $this->getPrimaryKey($table); //获取当前主键
        $index = array_search($pk, $fields);//找出主键下标
        unset($fields[$index]);//销毁主键，销毁数据内的值

        //遍历循环数组内容并给字段加上引号‘’，应该去掉主键，否则updata语句是这样：updata 'category' set 'id'='10','name'='电视机','sort_order'='30','parent_id'='8'
        // 重点：匿名函数想要访问外部的数据，可以在函数名字后面使用use 外部变量 解决
        $fields = array_map(function ($field) use ($data) {
            return "`{$field}`='{$data[$field]}'"; // mysql中表需要用``括起来 ,mysql表中值需要用''括起来
        }, $fields);

        $fields_str = implode(',', $fields); // 将数组内容按照指定符号（','）分开

        $sql = "update `{$table}` set {$fields_str} where {$pk}=$data[$pk]";
        return $this->db->query($sql);
        //echo $sql; //update `category` set `name`='电视机',`sort_order`='30',`parent_id`='8' where id=10
    }

    /**
     * 王能的del方法
     * @param $id 删除id
     * @return mixed
     */
    public function del($id)
    {
        $table = $this->getTable(); //获取当前表明
        $pk = $this->getPrimaryKey($table); //获取当前主键
        $sql = "delete from `{$table}` where `{$pk}`=$id";
        return $this->db->query($sql);
    }

    /**
     *万能的select语句
     * @param string $field string 排序字段，一般是字段名称
     * @param string $order string 排序方法，一般是esc
     * @return mixed 返回一个二维数组
     *
     */
    public function select($field = '', $order = 'asc')
    {
        $table = $this->getTable();//获取表
        $sql = "select * from `{$table}`";
        if ($field != '') {
            $sql .= " order by `{$field}` {$order}"; //如果field不为空，则需要排序
        }
        return $this->db->fetchAll($sql);
    }

    public function find($id){
        $table = $this->getTable();//获取表
        $pk=$this->getPrimaryKey($table);
        $sql="select * from `{$table}` where `{$pk}`='{$id}'";
        return $this->db->fetchRow($sql);//获取第一行数据
    }
}
