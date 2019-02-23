<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<script type="text/javascript">
    //当第一级选项发生变化的时候跳转
    function jump() {
        location.href='?firstid='+document.getElementById('first').value;
    }
</script>
<?php
$link=mysql_connect('localhost:3306','root','root');
mysql_select_db('project');
mysql_query('set names utf8');
$firstid=isset($_GET['firstid'])?$_GET['firstid']:'';	//获取提交的firstid
?>

<!--获取第一级-->
<select id="first" onchange="jump()">
    <option value="">----选择----</option>
    <?php
    $sql="select * from category where parent_id=0";
    $rs=mysql_query($sql);
    var_dump(mysql_num_rows($rs));
    while($rows=mysql_fetch_assoc($rs)):
    ?>
    <option value="<?php echo $rows['id']?>" <?php echo $rows['id']==$firstid?'selected':''?>><?php echo $rows['name']?></option>
    <?php endwhile;?>
</select>
<!--获取第二级-->
<?php
$sql="select * from category where parent_id=$firstid";
$rs=mysql_query($sql);
?>
<select id='second'>
    <option value="">---请选择---</option>
    <?php while($rows=mysql_fetch_assoc($rs)):?>
        <option value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>
    <?php endwhile;	?>
</select>
</body>
</html>