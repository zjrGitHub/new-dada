<?php

require "./common/mysql.php";

$sql='SELECT * FROM dot WHERE sid='.$_POST['sid'].' AND uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$r=$result->fetch_array(MYSQLI_ASSOC);
if($r){
    $sql='UPDATE share SET dnums=dnums-1 WHERE sid='.$_POST['sid'];
    $mysql->query($sql);
    $sql='DELETE FROM dot WHERE did='.$r['did'];
    $result=$mysql->query($sql);
    if($result){
        echo json_encode(['r'=>'del']);
    }else{
        echo json_encode(['r'=>'fail']);
    }

}else{
    $sql='UPDATE share SET dnums=dnums+1 WHERE sid='.$_POST['sid'];
    $mysql->query($sql);

    $sql='INSERT INTO dot(uid,sid,dottimes) VALUES("'.$_SESSION['uid'].'","'.$_POST['sid'].'","'.date('Y-m-d H:i:s', time()).'")';

    $result=$mysql->query($sql);
    if($result){
        echo json_encode(['r'=>'add']);
    }else{
        echo json_encode(['r'=>'fail']);
    }

}

