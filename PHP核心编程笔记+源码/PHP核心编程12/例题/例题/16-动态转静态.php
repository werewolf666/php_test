<?php
$url="http://www.php.com/index.php";
$str=file_get_contents($url);
file_put_contents('./index.html',$str);
echo 'success';