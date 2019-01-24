<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>

<body>
<?php
if(isset($_POST['button'])) {
    $error=$_FILES['image']['error'];
    //判断错误类型
    if($error) {
        switch($error) {
            case 1:
                echo '上传文件大小超过了配置文件中允许的最大值';
                break;
            case 2:
                echo '上传文件大小超过了表单允许的最大值';
                break;
            case 3:
                echo '文件没有上传完整';
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
//    //验证格式
//    $type_array=array('image/jpeg','image/png','image/gif');
//    if(!in_array($_FILES['image']['type'],$type_array)){
//        die('类型类型不正确,只能是'.implode(',',$type_array));
//    }
    //验证大小
    if($_FILES['image']['size']>1024*1024){
        die('文件不能超过1M');
    }
    //判断上传是否是http上传
    if(!is_uploaded_file($_FILES['image']['tmp_name']))
        die('文件必须是http上传');
    //文件上传
    $path='./uploads/'.uniqid('',true).strrchr($_FILES['image']['name'],'.');
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)) {
        echo '上传成功';
    }else {
        echo '上传失败';
    }
}
?>
<form method="post" enctype="multipart/form-data">
    文件：<input type="file" name="image" />
    <input type="submit" name="button" value="上传">
</form>
</body>
</html>