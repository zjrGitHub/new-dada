<?php
require 'nav.php';

$sql='SELECT s.*, u.header, u.smallname FROM share as s  LEFT JOIN users as u ON s.uid = u.uid WHERE s.status=1';
if($_GET['tag']){
$sql.=' AND tag LIKE "%'.$_GET['tag'].'%"';
}
$result=$mysql->query($sql);
$shares=$result->fetch_all(MYSQLI_ASSOC);


?>

<!--第二个导航条-->
<div class="second">
    <div class="layui-container nav2">
        <ul class="layui-nav">
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=小清新">小清新</a></li>
            <li class="layui-nav-item "><a href="./xiaoqingxin.php?tag=轻熟风">轻熟风</a></li>
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=职场风">职场风</a></li>
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=休闲风">休闲风</a></li>
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=森女风">森女风</a></li>
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=欧美风">欧美风</a></li>
            <li class="layui-nav-item"><a href="./xiaoqingxin.php?tag=机场风">机场风</a></li>
        </ul>
    </div>


    <div class="layui-container daquan_cont">
        <div class="layui-row">
<?php
foreach ($shares as $k=>$r){
//    var_dump($r['tag']);
//   if(strpos($r['tag'],$_GET['tag'])){
       ?>
       <a href="./each_detail.php?sid=<?php echo $r['sid']?> ">
           <div class="layui-col-md3 todetail" style="margin-bottom: 10px;">

               <img class="de_img" src='<?php echo explode(',',$r['picture'])[0]?>'>

               <div class="com_detail">
                   <div class="title1">
                   <span><?php echo explode(',',$r['title'])[0]?></span>
                   </div>
                   <div class="com_detail_fir">
                       <div class="com_detail_sec">
                           <img src="<?php echo $r['header']?>" class="layui-nav-img">
                       </div>
                       <span><?php echo $r['smallname']?></span>
                       <div class="com_detail_tir">
                           <img src="./images/dot.png">
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
</div>


<?php require 'bottom.php'?>