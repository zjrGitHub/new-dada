<?php require "./common/mysql.php";

$sql = "SELECT * FROM share WHERE  uid = " . $_SESSION['uid'];
$result = $mysql->query($sql);
$message = $result->fetch_array(MYSQLI_ASSOC);
foreach ($message AS $key => $value) {
    $$key = $value;
}
//$sql='UPDATE users SET sid='.$sid.'WHERE uid'
?>
<?php require 'nav.php' ?>

<!--分享主体内容-->
<div class="layui-container">
    <div class="layui-row">
        <!--<div class="layui-col-md2 layui-col-lg-offset3">-->
        <div style="padding: 15px;">
            <span class="layui-breadcrumb" lay-separator="-">
               <a href="">我的哒哒分享</a>
               <a><cite>投稿专栏</cite></a>
            </span>
            <hr>
        </div>
    </div>
</div>

<div class="layui-container">
    <form class="layui-form" enctype="multipart/form-data">
        <div class="layui-row">
            <div class="layui-col-md8 layui-col-lg-offset2">
                <div class="layui-form-item icon">
                    <div class="layui-input-inline">
                        <label class="picture imglist" for="picture">
                            <img src="images/2.png" width="70" height="50" id="old">
                        </label>
                        <input type="file" name="mypicture" multiple
                               accept="image/gif, image/jpeg, image/png, image/svg" id="picture" class="mypicture"
                               hidden>

                        <!-- 默认值设置 -->

                    </div>
                    <p class="pic_submit">添加专栏图片</p>
                </div>
                <!--               显示多张图片-->
                <div class="layui-fluid">
                    <div class="layui-row">
                        <label class="layui_col-md12 uploadimg">

                        </label>
<!--                        <input type="hidden" name="picture" value="">-->
                        <input type="hidden" name="picture" value="<?= $head ?>">
                    </div>
                </div>

                <!--添加专栏标题-->
                <div class="layui-row">
                    <div class="layui-colla-title">
                        <input type="text" placeholder="输入标题（介意15字以内）" class="layui-colla-title" name="title" maxlength="10">
                    </div>
                </div>

                <!--专栏标签-->
                <div class="layui-row">
                    <div class="layui-form-item">
                        <label class="layui-form-label">专栏标签</label>
                        <div class="layui-input-block">
                            <input type="checkbox" name="tag[]" title="小清新" value="小清新">
                            <input type="checkbox" name="tag[]" title="轻熟风" value="轻熟风" checked>
                            <input type="checkbox" name="tag[]" title="职场风" value="职场风">
                            <input type="checkbox" name="tag[]" title="休闲风" value="休闲风">
                            <input type="checkbox" name="tag[]" title="森女风" value="森女风">
                            <input type="checkbox" name="tag[]" title="欧美风" value="欧美风">
                            <input type="checkbox" name="tag[]" title="机场风" value="机场风">
                        </div>
                    </div>
                </div>

                <!--添加专栏详情-->
                <div class="layui-row">
                    <div class="top_title">
                        <p>请输入专栏详情，保证在200-2000字以内</p>
                    </div>
                </div>
                <!--富文本编辑框-->
                <div class="layui-row">
                    <div id="editor">
                        <p></p>
                    </div>

                    <textarea name="detail" id="info" cols="30" rows="10" class="hide" hidden><?=$detail?></textarea>

                </div>

                <!--提交专栏按钮-->
                <div class="layui-row">
                    <div class="layui-col-md4 layui-col-lg-offset5">
                        <div class="layui-input-inline">
                            <button class="layui-btn sharebt" type="button">提交专栏</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="http://unpkg.com/wangeditor/release/wangEditor.min.js"></script>
<script src="./js/share.js"></script>
<script src="./js/editor.js"></script>
<?php require 'bottom.php'?>
