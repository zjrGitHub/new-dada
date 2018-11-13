<?php

require "./nav.php";
$sid=$_GET["sid"];
$sql='SELECT s.title FROM share as s WHERE s.sid='.$sid;
$result=$mysql->query($sql);
$r=$result->fetch_array(MYSQLI_ASSOC);

$sql='SELECT  u.header, u.smallname,c.collecttimes FROM users as u LEFT JOIN collect as c ON c.uid = u.uid WHERE c.sid='.$sid;
$result=$mysql->query($sql);
$r1=$result->fetch_all(MYSQLI_ASSOC);

?>
<div class="dzxq">收藏详情</div>
<div class="layui-container">
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>昵称</th>
            <th>头像</th>
            <th>标题</th>
            <th>收藏时间</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($r1 as $k=>$v){
            ?>
            <tr>
                <td><?=$v['smallname']?></td>
                <td><img src="<?=$v['header']?>" alt="" width="60px" height="60px" style="border-radius: 50%"></td>
                <td><?=$r['title']?></td>
                <td><?=$v['collecttimes']?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<?php
require "./bottom.php"
?>


