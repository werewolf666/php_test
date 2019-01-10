<?php
/**
 * Created by PhpStorm.
 * User: gatsby
 * Date: 19-1-9
 * Time: 下午3:28
 */

class StudentInfomation{
    public $name='alex';
    public $sex='male';

    public $stu = array(
        'name'=>'alex',
        'sex'=>'male'
    );

    public function action(){
        echo $this->name='tom';
    }
}

$stu1=new StudentInfomation();//new实例化对象
$stu2=new StudentInfomation();

echo $stu1->name,'<br/>';
echo $stu1->action(),'<br/>';


//判断属性是否存在
//isset()判断变量是否存在
//unset() 删除属性
//unset($stu1->name);
var_dump(isset($stu1->name));
echo '<br>';
class TeacherInfomation{
    private $name;
    private $sex;

    //构造函数，生成对象时候自动执行
    public function __construct($name,$sex){
        $this->name=$name;
        $this->sex=$sex;
    }

    public function SetInfo($name,$sex){
        if($name=='' || $sex=='' or $sex!='男' && $sex!='女'){
            echo '参数错误','<br/>';
        }
        $this->name=$name;
        $this->sex=$sex;
    }

    public function GetInfo(){
        echo $this->name,'<br/>';
        echo $this->sex,'<hr>';
    }
    //不允许存在参数__destruct()
    public function __destruct(){
        echo '销毁初始化事物';
    }
}

$tea1=new TeacherInfomation('李四','女');
//$tea1->SetInfo('张三','男');
$tea1->GetInfo();

class DBClass{
    private $link;

    public function __construct(){
        $this->link=mysql_connect('localhost:3306','root','root');
        var_dump($this->link);
    }

    public function __destruct(){
        echo '<hr>';
        mysql_close($this->link);
    }
}

$r1=new DBClass();