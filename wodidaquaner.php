<?php
require "./nav.php";
$sql='SELECT * FROM share  WHERE uid='.$_SESSION['uid'];
$result=$mysql->query($sql);
$shares=$result->fetch_all(MYSQLI_ASSOC);


?>


    <div class="layui-container"  style="min-height: 165px">
        <img src="images/snob.png">
        <h1>我滴搭圈儿记录:</h1>
        <div class="layui-row">
<?php
foreach ($shares as $k=>$r){
    ?>
            <a href="./share_detail.php?sid=<?php echo $r['sid']?>">
            <div class="layui-col-md3">
                <img src="<?php echo explode(',',$r['picture'])[0]?>" height="330" width="250"/>
                <div class='title1' style="width:250px;margin:20px 0 20px 0">
                    <span><?php echo explode(',',$r['detail'])[0]?></span>
                    <div>
                        <div style="width:30px;height:30px;border-radius:50%;float:left;margin-right: 10px">
                            <img src="<?php echo $_SESSION['header']?>" class="layui-nav-img">
                        </div>
                        <span><?php echo $_SESSION['smallname']?></span>

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