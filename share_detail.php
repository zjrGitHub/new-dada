<?php
require 'nav.php';
$sid=$_GET['sid'];
$sql='SELECT s.*, u.header, u.smallname FROM share as s  LEFT JOIN users as u ON s.uid = u.uid WHERE s.sid='.$sid;
$result=$mysql->query($sql);
$shares=$result->fetch_array(MYSQLI_ASSOC);
$p=explode(',',$shares['picture']);
$t=explode(',',$shares['tag']);

$sql='SELECT dnums FROM share WHERE sid='.$sid;
$result=$mysql->query($sql);
$dz=$result->fetch_array(MYSQLI_ASSOC);

?>
<div class="detail">
    <input type="hidden" name="sid" value="<?=$sid?>">
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

    <div class="left_tags">
        <span class="title">发布于 &nbsp;</span>
        <span class="time"><?=$shares['uploadtimes']?></span>
    </div>

    <div class="right_tags">
        <img src="./images/dot.png" ><span><?=$shares['dnums']?></span>
        <img src="./images/remark.png"><span>98</span>
        <img src="./images/collected.png"><span><?=$shares['cnums']?></span>
    </div>
</div>

<div class="fa_remark">
    <input type="text" placeholder="请输入评论内容...">
    <img src="./images/send.png" alt="">
</div>

    <div class="warn"><span>发送评论的内容不能为空！</span></div>

    <div class="all_tip">
        <img src="./images/laba.png"><span style="font-size: 30px">评论区</span>

        <div class="comment">
            <div class="comment_info">
                <div class="user">
                    <div style="float: left"><img src="//t.cn/RCzsdCq" style="width: 30px;height: 30px;border-radius: 50%"></div>
                    <div class="user_info">
                        <a href="">囧架架</a>
                        <span>10-18</span>
                    </div>
                </div>
                <div class="comment_stats">
                    <img src="./images/comm_dot.png">
                    <span>11 ·</span>
                    <p style="display: inline">回复</p>
                </div>
            </div>
            <p class="content">zeesea睫毛膏不错呀，两支装的，好用</p>
            <div class="replies">
                <div class="reply">

                    <span class="replier">Six-And-Twenty(作者) :</span>
                    <span>是的呢</span>

                </div>
            </div>

            <div class="fa_huifu">

                <input type="text" placeholder="请输入回复内容...">
                <img src="./images/huifu.png" width="20" height="20">

            </div>
        </div>

    </div>
</div>

<div class="aside">
    <hr>

    <div class="aside_one"><a href="./dzdetail.php?sid=<?=$sid?>">点赞总数</a></div>
    <hr>
    <div class="aside_two"><a href="">评论总数</a></div>
    <hr>
    <div class="aside_three"><a href="./cldetail.php?sid=<?=$sid?>">收藏总数</a></div>
</div>


<script src="./js/picture.js"></script>
<script src="js/detail.js"></script>
<script src="./js/send.js"></script>
<script src="layui/layui.all.js"></script>
<script>
    window.onload=function () {
        send();
        dianZan();
        picture();
    };

</script>

<?php require "./bottom.php"?>

