<?php
require $_SERVER['DOCUMENT_ROOT'].'/inc/conn.php';	//连接数据库
$rs=mysql_query('select * from title');
?>
<table>
<tr>
	<?php 
	$n=0;
	while($rows=mysql_fetch_assoc($rs)):?>
		<td><a href="?titleid=<?php echo $rows['Id']?>"><?php echo $rows['Title']?></a></td>
	<?php 
		//$n++;
		if(++$n%9==0)
			echo '</tr><tr>';
	endwhile?>
</tr>
</table>
