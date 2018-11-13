<?php
require "./common/mysql.php";


$sql='SELECT * FROM collect WHERE sid='.$_POST['sid'].' AND uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$r=$result->fetch_array(MYSQLI_ASSOC);

if(!$r){
    $sql='UPDATE share SET cnums=cnums+1 WHERE sid='.$_POST['sid'];
    $mysql->query($sql);

    $sql='INSERT INTO collect(uid,sid,collecttimes) VALUES("'.$_SESSION['uid'].'","'.$_POST['sid'].'","'.date('Y-m-d H:i:s', time()).'")';
    $result=$mysql->query($sql);
    if($result){
        echo json_encode(['r'=>'add']);
    }else{
        echo json_encode(['r'=>'fail']);
    }
}