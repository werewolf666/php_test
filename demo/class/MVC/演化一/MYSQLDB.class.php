<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-11
 * Time: 下午7:34
 */

class MYSQLDB{
    private $host;
    private $port;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $link;
    private static $instance;


    private function initParam($config){
        $this->host = ($config['host']) ? $config['host'] : '127.0.0.1';
        $this->port = ($config['port']) ? $config['port'] : 3306;
        $this->username = ($config['username']) ? $config['username'] : 'root';
        $this->password = ($config['password']) ? $config['password'] : 'root';
        $this->dbname = ($config['dbname']) ? $config['dbname'] : 'project';
        $this->charset = ($config['charset']) ? $config['charset'] : 'utf8';
    }


    private function connect(){
        $this->link=mysql_connect("{$this->host}:{$this->port}","{$this->username}","{$this->password}") or die('connect faile');
    }


    public function setcharset(){
        $sql="set names {$this->charset}";
        $this->query($sql);
    }


    /**
     * @param $sql
     */
    public function query($sql){

        if(!$result=mysql_query($sql,$this->link)){
            echo $sql.'执行失败','<br>';
            echo '错误代码信息：',mysql_error(),'<br>';
            exit;
        }
        return $result;
    }


    private function selectDB(){
        $sql="use {$this->dbname}";
        $this->query($sql);
    }


    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


    /**
     * @param array $config
     * @return MYSQLDB
     */
    public function getInstance($config=array()){
        if(!self::$instance instanceof self)
            self::$instance=new self($config);
        return self::$instance;
    }


    private function __construct($config){
        $this->initParam($config);
        $this->connect();
        $this->setcharset();
        $this->selectDB();
    }


    /**
     *
     */
    public function fetchAll($sql,$fetch_type='assoc'){
        $rs=$this->query($sql);
        $fetch_types=array('assoc','row','array');
        if(!in_array($fetch_type,$fetch_types))
            $fetch_type='assoc';
        $fetch_fun='mysql_fetch_'.$fetch_type;
//        echo $fetch_fun,'<br>';
        $array=array();
        while ($rows=$fetch_fun($rs)){
            $array[]=$rows;
        }
//        echo $array,'<br>';
        return $array;
    }

    /**
     *获取结果中的第一条记录
     */
    public function fetchRow($sql,$fetch_type='assoc'){
        $rs=$this->fetchAll($sql,$fetch_type);
        if(!empty($rs))
            return $rs[0];
        return null;
    }


    /**
     * 获取第一行第一列记录
     *
     */
    public function fetchColum($sql){
        $rs=$this->fetchRow($sql,'row');
        return empty($rs)?null:$rs[0];
    }
}

$config = array(
    'host'=>'127.0.0.1',
    'port'=>3306,
    'username'=>'root',
    'password'=>'root',
    'dbname'=>'project',
    'charset'=>'utf8'
);
$sql="select * from sline_member";
$db1=MYSQLDB::getInstance($config);
$rs=$db1->fetchAll($sql,'assoc');
//var_dump($fet);
//$rs=$db1->fetchRow($sql,'assoc');
//var_dump($rs);
//$r1=$db1->fetchAll($sql,'array');
//var_dump($r1);
//echo '<br/>';
//echo $r1[0]['name'];
//echo '<br/>';
//echo $r1[0]['price'];
//echo '<hr>';
//
//echo $r1[1]['name'];
//echo '<br/>';
//echo $r1[1]['price'];
//echo '<br/>';

?>

// 显示模板
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员列表</title>
    <style type="text/css">
        table,td,th{
            border:#000 solid;
        }
        table{
            width: 780px;
            margin:auto;
        }
    </style>
</head>

<body>
<table>
    <tr>
        <th>编号</th>
        <th>昵称</th>
        <th>加入时间</th>
        <th>上次登录时间</th>
        <th>登录IP</th>
    </tr>
    <?php foreach($rs as $rows):?>
        <img>
            <td><?php echo $rows['mid']?></td>
            <td><?php echo $rows['nickname']?></td>
<!--            <td>-->
<!--                --><?php //echo empty($rows['litpic'])?'暂无图片':'<img scr="'.$rows['litpic'].'">'?>
<!--            </td>-->
            <td><?php echo date("Y-m-d h:m:s",$rows['jointime'])?></td>
            <td><?php echo date("Y-m-d h:m:s",$rows['logintime'])?></td>
            <td><?php echo empty($rows['loginip'])? '登录地址被隐藏':$rows['loginip']?></td>
        </tr>


    <?php endforeach;?>
</table>




</body>
</html>
