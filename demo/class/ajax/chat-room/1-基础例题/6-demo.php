<?php
//var_dump($_FILES);
$path='./Uploads/'.$_FILES['face']['name'];
echo move_uploaded_file($_FILES['face']['tmp_name'],$path);