<?php
require './conn.php';
$maxid=$_GET['maxid'];
$rs=mysql_query("select * from message where id>$maxid order by id ");
$info=array();
while($rows=mysql_fetch_assoc($rs)){
	$info[]=$rows;
}
echo json_encode($info);