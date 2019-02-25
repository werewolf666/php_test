<meta charset='utf-8'>
<?php
//1、将索引数组转成json格式
$stu=array('tom','berry','ketty','rose');
$str=json_encode($stu);	//将PHP数组转成JSON格式
echo $str,'<br>';		//["tom","berry","ketty","rose"]
print_r(json_decode($str));//Array ( [0] => tom [1] => berry [2] => ketty [3] => rose )
echo '<hr>';
//2、将关联数组转成json格式
$stu=array('name'=>'tom','sex'=>'男','age'=>20);
$str=json_encode($stu);	//{"name":"tom","sex":"\u7537","age":20}
echo $str,'<br>';
print_r(json_decode($str));//stdClass Object ( [name] => tom [sex] => 男 [age] => 20 )
echo '<hr>';
//3、既有索引数组，又有关联数组
$stu=array('name'=>'tom','berry','ketty');
$str=json_encode($stu);	//{"name":"tom","0":"berry","1":"ketty"}
echo $str,'<br>';
print_r(json_decode($str));//stdClass Object ( [name] => tom [0] => berry [1] => ketty )
echo '<hr>';
//4、转换二维数组
echo json_encode(array(
	array('name'=>'tom','sex'=>'M'),
	array('name'=>'berry','sex'=>'F')
	)),'<br>';//[{"name":"tom","sex":"M"},{"name":"berry","sex":"F"}]
echo json_encode(array(
	'stu1'=>array('name'=>'tom','sex'=>'M'),
	'stu2'=>array('name'=>'berry','sex'=>'F')
	)),'<hr>';//{"stu1":{"name":"tom","sex":"M"},"stu2":{"name":"berry","sex":"F"}}
//5、转换对象
class Stu{
	public $name='tom';
	private $sex='M';
	public function getName(){}
}
$stu=new Stu();
$str=json_encode($stu);	
echo $str,'<br>';	//{"name":"tom"}
print_r(json_decode($str));	//stdClass Object ( [name] => tom )
echo '<br>';
print_r(json_decode($str,true));	//Array ( [name] => tom )，true表示反编译成数组

