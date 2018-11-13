<?php
require './common/mysql.php';
//var_dump($_SESSION);
//exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>哒哒圈</title>

    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="./css/common_css.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/nav_top.css">

</head>
<body>

<div class="nav_block">
    <ul class="layui-nav nav">
        <li class="layui-nav-item nav-left logo"><img src="images/dada.png" height="43" width="127"/></li>
        <li class="layui-nav-item nav-left"><a href="index.php">首页</a></li>
        <li class="layui-nav-item nav-left"><a href="daquan.php">搭圈儿</a></li>
        <li class="layui-nav-item nav-left"><a href="./share.php">分享</a></li>
        <li class="layui-nav-item nav-input"><input type="text" placeholder="请输入搜索信息"></li>

        <li class="layui-nav-item nav-right">
            <a href="javascript:;">个人中心</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="./personal_mess.php">我滴信息</a></dd>
                <dd><a href="wodidaquaner.php">我滴搭圈儿</a></dd>
                <dd><a href="wodicollect.php">我滴收藏</a></dd>
            </dl>
        </li>
        <?php
        if(!$_SESSION['uid']){
            ?>
            <li class="layui-nav-item nav-right"><a href="./login.php">注册|登录</a></li>
        <?php
        }else{
        ?>
            <li class="layui-nav-item nav-right">
            <a href=""><img src="<?=$_SESSION['header']?$_SESSION['header']:"./images/girl.png" ?>" class="layui-nav-img"><?=$_SESSION['smallname']?></a>
            <dl class="layui-nav-child">
                <dd><a href="./logout.php">退了</a></dd>
            </dl>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
