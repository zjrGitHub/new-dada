<?php
require "./common/mysql.php";

$sql='SELECT uid,username,passwd,header,smallname FROM users WHERE username="'.$_POST["username"].'"  LIMIT 1';

$result=$mysql->query($sql);
$admin=$result->fetch_array(MYSQLI_ASSOC);
//var_dump($_POST['passwd']);
//var_dump($admin['passwd']);
//exit;
if(!$admin){
    echo json_encode(['r'=>'username_not_exit']);
    return;
}

if($admin['passwd']!=$_POST['passwd']){
    echo json_encode(['r'=>'passwd_error']);
    return;
}

//登录成功，记录个人信息
$_SESSION['uid'] = $admin['uid'];
$_SESSION['username'] = $admin['username'];
$_SESSION['header'] = $admin['header'];
$_SESSION['smallname'] = $admin['smallname'];
echo json_encode(['r'=>'ok']);
