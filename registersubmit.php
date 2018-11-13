<?php


require "./common/mysql.php";

$sql='SELECT username FROM users WHERE username="'.$_POST["username"].'" LIMIT 1';
$result=$mysql->query($sql);
$r=$result->fetch_array(MYSQLI_ASSOC);
if($r){
    echo json_encode(['r'=>'username_exited']);
    return;
}


$sql='INSERT INTO users(username,passwd,logintimes) VALUES("'.$_POST["username"].'","'.$_POST["passwd"].'","'.date('Y-m-d H:i:s').'")';
$result=$mysql->query($sql);



if($result){
    echo json_encode(['r'=>'ok']);
}else{
    echo json_encode(['r'=>'fail']);
}