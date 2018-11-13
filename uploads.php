<?php
//var_dump($_FILES["mypicture"]["tmp_name"]);
$path = [];
foreach ($_FILES["mypicture"]["tmp_name"] as $k=>$f){
    $file = explode('.', $_FILES['mypicture']['name'][$k]);
    $ext = array_pop($file);
    $filename = './shareimg/'.date('Y/m').'/' . uniqid('img_') . '.' . $ext;
    move_uploaded_file($f, $filename);
    array_push($path,$filename);
}


echo json_encode(['path'=>$path]);
