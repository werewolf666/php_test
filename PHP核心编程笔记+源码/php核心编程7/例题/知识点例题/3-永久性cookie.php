<?php
setcookie('name','tom',time()+3600);	//此cookie保存1小时
echo $_COOKIE['name'];

