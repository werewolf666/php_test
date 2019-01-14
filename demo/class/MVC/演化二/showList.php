<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>会员列表</title>
    <style type="text/css">
    table,td,th{
    border:#000 solid;
}
        table{
    width: 780px;
            margin:auto;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>编号</th>
        <th>昵称</th>
        <th>加入时间</th>
        <th>上次登录时间</th>
        <th>登录IP</th>
    </tr>
    <?php foreach($rs as $rows):?>
    <img>
    <td><?php echo $rows['mid']?></td>
    <td><?php echo $rows['nickname']?></td>
    <!--            <td>-->
    <!--                --><?php //echo empty($rows['litpic'])?'暂无图片':'<img scr="'.$rows['litpic'].'">'?>
    <!--            </td>-->
    <td><?php echo date("Y-m-d h:m:s",$rows['jointime'])?></td>
    <td><?php echo date("Y-m-d h:m:s",$rows['logintime'])?></td>
    <td><?php echo empty($rows['loginip'])? '登录地址被隐藏':$rows['loginip']?></td>
    </tr>
<?php endforeach;?>
</table>
</body>
</html>
