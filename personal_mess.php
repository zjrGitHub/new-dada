<?php require "./common/mysql.php";

$sql = "SELECT * FROM users WHERE  uid = " . $_SESSION['uid'];
$result = $mysql->query($sql);
$message = $result->fetch_array(MYSQLI_ASSOC);
foreach ($message AS $key => $value) {
    $$key = $value;
}
?>
<?php require 'nav.php'?>

<div class="layui-container">
    <div style="margin-top: 50px;color:#00a0d8"><h1>小主的个人资料哦~</h1></div>
</div>
<div class="hello">

    <img src="images/nihao.gif" height="44" width="76">
</div>
<div class="layui-container per_form">

    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">头像</label>
            <div class="layui-input-inline">
                <label class="header" for="header">
                    <img src="<?= $header ? $header : './images/girl.png' ?>" alt="" width="60" height="60"
                         style="border-radius: 50%">
                </label>
                <input type="file" name="header" id="header" class="myheader" hidden>
                <input type="hidden" name="head" value="<?= $header ? $header : './images/girl.png' ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">* 昵称</label>
            <div class="layui-input-inline">
                <input type="text" name="smallname" class="layui-input " value="<?= $smallname ?>">
            </div>
            <div class="layui-form-mid layui-word-aux umind">*1-5个汉字</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">* 密码</label>
            <div class="layui-input-inline">
                <input type="password" name="passwd" required lay-verify="required" placeholder="请输入密码"
                       autocomplete="off" class="layui-input" value="<?= $passwd ?>">
            </div>
            <div class="layui-form-mid layui-word-aux pmind">*密码为6-12位</div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <input type="radio" name="gender" value="2" title="男" <?= $gender == 2 ? ' checked' : '' ?>>
                <input type="radio" name="gender" value="1" title="女" <?= $gender == 1 ? ' checked' : '' ?>>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <textarea name="description" placeholder="请输入自我描述..." class="layui-textarea  description"
                        ><?= $description ?></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal uploadmessage" type="button">保存修改</button>
                <!--                <button type="button" class="layui-btn layui-btn-primary">修改</button>-->
            </div>
        </div>
    </form>
</div>

<!--<div class="layui-carousel auto_play" id="test1">-->
<!--<div carousel-item>-->
<div class="center_img">
    <img src="images/lunbo2.jpg" style="width: 500px; height:300px">
</div>
<!--<div><img src="images/lunbo1.jpg" style="width: 500px; height:300px"></div>-->
<!--<div><img src="images/lunbo3.jpg" style="width: 500px; height:300px"></div>-->
<!--<div><img src="images/lunbo4.jpg" height="300" width="500"></div>-->
<!--<div><img src="images/lunbo5.jpg" height="300" width="500"></div>-->
<!--</div>-->
<!--</div>-->

<script src="./layui/layui.all.js"></script>
<script src="./js/messege.js"></script>

<script>
    //layui.use('carousel', function(){
    //var carousel = layui.carousel;
    ////建造实例
    //carousel.render({
    //elem: '#test1'
    //,width: '500px' //设置容器宽度
    //,arrow: 'always' //始终显示箭头
    ////,anim: 'updown' //切换动画方式
    //});
    //});
</script>
</body>
</html>