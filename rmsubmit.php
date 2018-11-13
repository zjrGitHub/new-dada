<?php
require "./common/mysql.php";


$sql='SELECT * FROM remark WHERE sid='.$_POST['sid'].' AND uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$r=$result->fetch_array(MYSQLI_ASSOC);


    $sql='UPDATE share SET rnums=rnums+1 WHERE sid='.$_POST['sid'];
    $mysql->query($sql);

    $sql='INSERT INTO remark(uid,sid,content,remarktimes) VALUES("'.$_SESSION['uid'].'","'.$_POST['sid'].'","'.$_POST['remark'].'","'.date('Y-m-d H:i:s', time()).'")';
    $result=$mysql->query($sql);
    if($result){
        echo json_encode(['r'=>'add']);
    }else{
        echo json_encode(['r'=>'fail']);
    }
