<?php
class DB1 {	
}
class DB2 {	
}
class DB3 {	
}
function getInstance($db_name) {
	static $array=array();	//通过数组来保存类的单例
	if(!isset($array[$db_name]))
		$array[$db_name]=new $db_name;
	return $array[$db_name];
}
$db1=getInstance('DB1');
$db2=getInstance('DB2');
$db3=getInstance('DB3');
var_dump($db1,$db2,$db3);	//object(DB1)#1 (0) { } object(DB2)#2 (0) { } object(DB3)#3 (0) { } 


