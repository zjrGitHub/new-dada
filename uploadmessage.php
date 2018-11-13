<?php
require './common/mysql.php';
//var_dump($_POST);
$message = $_POST;
foreach ($message AS $key => $value) {
    $$key = $value;
}
$sql = 'UPDATE users SET smallname="' . $smallname . '",passwd="' . $passwd . '",gender="' . $gender . '",description="' . $description . '",header="' . $header . '" WHERE uid=' .$_SESSION['uid'];
//var_dump($sql);
$result=$mysql->query($sql);

if($result){
    echo json_encode(['r'=>'ok']);
}else{
    echo json_encode(['r'=>'fail']);
}