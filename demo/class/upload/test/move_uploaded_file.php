<?php

////存储文件的唯一性
////方法一
//$path="./uploads/vultr.exp";
//echo time().strrchr($path,'.'),'<br>'; //1548302314.exp
////方法二 unique()基于当前微妙生成一个唯一id
//echo uniqid().strrchr($path,'.'),'<br>'; //5c4937ea92a17.exp
//echo uniqid('new_').strrchr($path,'.'),'<br>'; //new_5c4937ea92a52.exp
//echo uniqid('new_',true).strrchr($path,'.'),'<br>'; //new_5c49385d2ab5b4.58888955.exp 更加准确
//
///**
// * 判断上传文件类型
// */
//$path='F:\wamp\apache\htdocs\aa.jpg';
//$finfo=finfo_open(FILEINFO_MIME);	//创建一个finfo资源
//$info=finfo_file($finfo,$path);
//echo $info,'<br>';	//text/html; charset=us-ascii
//$array=explode(';',$info);
//echo $array[0];

if (isset($_POST['button'])){
    //判断文件上传错误类型
    $error=$_FILES['image']['error'];
    if ($error){
        switch ($error){
            case 1:
                echo '上传问价超过配置文件中允许的最大值';
                break;
            case 2:
                echo '上传文件超过表单允许的最大值';
                break;
            case 3:
                echo '文件上传不完整';
                break;
            case 4:
                echo '没有上传文件';
                break;
            case 6:
                echo '找不到临时文件';
                break;
            case 7:
                echo '文件写入失败';
                break;
            default:
                echo '未知错误';
        }
        exit;
    }
    //验证格式
    $type_array=array('image/jpeg','image/png','image/gif');
    if (!in_array($_FILES['image']['type'],$type_array)){
        die('上传文件类型不正确，只能上传'.implode(',',$type_array).'类型的文件');
    }
    //验证大小
    if ($_FILES['image']['size']>1024*1024){
        die('文件不能超过1M');
    }
    //验证是否是http上传
    if (!is_uploaded_file($_FILES['image']['tmp_name'])){
        die('文件必须是http上传');
    }
    //开始上传
    $path='./uploads/'.uniqid('upload_',true).strrchr($_FILES['image']['name'],'.');
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path))
        echo 'uploaded success';
    else
        echo 'uploaded error';
}
