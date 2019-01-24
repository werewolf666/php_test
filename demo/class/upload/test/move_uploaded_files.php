<?php
echo '<pre>';
var_dump($_FILES['image']);
if (isset($_POST['button'])){
    foreach ($_FILES['image']['name'] as $index=>$name){
        var_dump($_FILES['image']['name']);
        echo '<br>';
        var_dump($index);
        echo '<br>';
        var_dump($name);
        $path='./uploads/'.uniqid('upload_',true).strrchr($name,'.');
        if(move_uploaded_file($_FILES['image']['tmp_name'][$index],$path))
            echo 'uploaded success';
        else
            echo 'uploaded error';
    }
}
