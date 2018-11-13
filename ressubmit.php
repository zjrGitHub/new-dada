<?php
require "./common/mysql.php";


//$sql='SELECT * FROM response WHERE sid='.$_POST['sid'].' AND uid='.$_SESSION['uid'];
//$result=$mysql->query($sql);
//$r=$result->fetch_array(MYSQLI_ASSOC);


//    $sql='UPDATE share SET rnums=rnums+1 WHERE sid='.$_POST['sid'];
//    $mysql->query($sql);

    $sql='INSERT INTO response(rid,rcontent) VALUES("'.$_POST['rid'].'","'.$_POST['res'].'")';
    $result=$mysql->query($sql);
    if($result){
        echo json_encode(['r'=>'add']);
    }else{
        echo json_encode(['r'=>'fail']);
    }
