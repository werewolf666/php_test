<?php
//mkdir('./aa');	//在当前目录下创建aa文件夹
//mkdir('./aa/bb');	//在aa文件夹下创建bb文件夹【注意：aa文件夹必须要存在】
mkdir('./aa/bb',777,true);	//递归创建文件夹；777表示最高权限   true表示递归创建文件夹


