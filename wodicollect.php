<?php
require "./nav.php";
$sql='SELECT s.*, u.header, u.smallname FROM share as s  
LEFT JOIN users as u ON s.uid = u.uid 
LEFT JOIN collect as c ON s.sid = c.sid 
WHERE s.status=1 AND s.sid = c.sid AND c.uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$shares=$result->fetch_all(MYSQLI_ASSOC);
?>



<div class="layui-container" style="min-height: 165px">
    <img src="images/snob.png">
    <h1 style="margin:0 0 30px 0">我滴收藏:</h1>
    <div class="layui-row">
<?php
foreach ($shares as $k=>$r){
    ?>
    <a href="./each_detail.php?sid=<?php echo $r['sid']?> ">
        <div class="layui-col-md3">
            <img src="<?php echo explode(',',$r['picture'])[0]?>" height="330" width="250">
            <div class='title1' style="width:250px;margin:20px 0 20px 0">

                <span><?php echo explode(',',$r['title'])[0]?></span>
              <div>
                  <div style="width:30px;height:30px;border-radius:50%;float:left;margin-right: 10px">
                      <img src="<?php echo $r['header']?>" class="layui-nav-img">
                  </div>
                  <span><?php echo $r['smallname']?></span>

                  <div style="float:right">
                      <img src="images/dot.png" height="16" width="16">
                      <span><?php echo $r['dnums']?></span>
                  </div>
              </div>
            </div>
        </div>
    </a>
    <?php
}

?>
    </div>
</div>
<?php
require "./bottom.php"
?>