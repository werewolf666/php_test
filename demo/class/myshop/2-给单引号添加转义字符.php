<?php
$sql="' or 1=1 or '";
echo  mysql_escape_string($sql),'<br>';
echo addslashes($sql);	//已过期，不建议使用
