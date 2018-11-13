<?php
require 'nav.php';
$sid=$_GET['sid'];
$sql='SELECT s.*, u.header, u.smallname FROM share as s  LEFT JOIN users as u ON s.uid = u.uid WHERE s.sid='.$sid;
$result=$mysql->query($sql);
$shares=$result->fetch_array(MYSQLI_ASSOC);
$p=explode(',',$shares['picture']);
$t=explode(',',$shares['tag']);


$sql='SELECT dotnums FROM dot WHERE sid='.$sid. ' AND uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$dz=$result->fetch_array(MYSQLI_ASSOC);
$src='./images/dot.png';
if($dz){
    $src="./images/dot_red.png";
}

$sql='SELECT  u.header, u.smallname,r.remarktimes,r.content,r.rid FROM remark as r
LEFT JOIN users as u  ON r.uid = u.uid 
WHERE r.sid='.$sid;
$result=$mysql->query($sql);
$r1=$result->fetch_all(MYSQLI_ASSOC);
$r1Arr = [];
foreach ($r1 as $rk=>$rv){
    array_push($r1Arr, $rv['rid']);
}
$redata = [];
if($r1Arr){
    $sql='SELECT  rid, rcontent FROM response WHERE rid IN ('.implode(',', $r1Arr).')';
    $result=$mysql->query($sql);
    $r2=$result->fetch_all(MYSQLI_ASSOC);
    foreach ($r2 as $rk=>$rv){
        $redata[$rv['rid']][] = $rv['rcontent'];
    }
}

?>
<div class="detail">

    <div class="change_pic">
        <div class="zhu_img"><img src="<?=$p[0]?>" ></div>
    </div>

    <div class="small_pic">
        <div class="each">
            <?php
            foreach ($p as $k=>$v) {
                ?>
                <div class="each_pic"><img src="<?=$v?>" alt=""></div>
                <?php
            }
            ?>
            </div>
    </div>

    <div class="related_tags">
        <?php
        foreach ($t as $k=>$v){

            ?>
            <div class="each_tags"><?=$v?></div>
            <?php
        }
        ?>

    </div>

    <!--详情内容-->
    <div class="detail_content">
        <p><?=$shares['detail']?></p>

    </div>

<div class="tips">
    <input type="hidden" name="sid" value="<?=$sid?>">
    <div class="left_tags">
        <span class="title">发布于 &nbsp;</span>
        <span class="time"><?=$shares['uploadtimes']?></span>
    </div>

    <div class="right_tags">
        <img src="<?= $src?>"><span> <?=$shares['dnums']?></span>
        <img src="./images/remark.png"><span><?=$shares['rnums']?></span>
        <img src="./images/collected.png"><span><?=$shares['cnums']?></span>
    </div>
</div>

<div class="fa_remark">
    <input type="text" placeholder="请输入评论内容..." name="remark" value="">
    <img src="./images/send.png" alt="">
</div>

    <div class="warn"><span>发送评论的内容不能为空！</span></div>

    <div class="all_tip">
        <img src="./images/laba.png"><span style="font-size: 30px">评论区</span>
<?php
foreach ($r1 as $k=>$v){

    ?>
    <input type="hidden" name="rid" value="<?=$v['rid']?>">
        <div class="comment">
            <div class="comment_info">

                <div class="user">
                    <div style="float: left"><img src="<?=$_SESSION['header']?>" style="width: 30px;height: 30px;border-radius: 50%"></div>
                    <div class="user_info">
                        <p><?=$_SESSION['smallname']?></p>
                        <p><?=$v['remarktimes']?></p>
                    </div>
                </div>
                <div class="comment_stats">
                    <img src="./images/comm_dot.png">
                    <span>11 ·</span>
                    <p style="display: inline;cursor: pointer">回复</p>
                </div>
            </div>
            <p class="content"><?=$v['content']?></p>
<?php
foreach ($redata[$v['rid']] as $key=>$value){
    ?>

            <div class="replies">
                <div class="reply">
                    <span class="replier"><?=$_SESSION['smallname']?>:</span>
                    <span><?=$value?></span>
                </div>
            </div>
    <?php
}
?>
            <div class="fa_huifu" style="display: none">
                <input type="text" placeholder="请输入回复内容..." name="res" value="">
                <img src="./images/huifu.png" width="20" height="20">

            </div>
            <div class="warn"><span>发送评论的内容不能为空！</span></div>
        </div>
    <?php
}
?>

    </div>

</div>


<script src="./js/picture.js"></script>
<script src="js/detail.js"></script>
<script src="./js/send.js"></script>

<script>
    window.onload=function () {
        send();
        res();
        dianZan();
        picture();
        collect();
    };

</script>

<?php require "./bottom.php"?>

