<?php require 'nav.php'?>
<div id="back">
    <div class="layui-container">

        <div class="layui-row">
            <div class="layui-col-md1 layui-col-lg-offset5"><h1>登</h1></div>
            <div class="layui-col-md1"><h1>录</h1></div>
        </div>
        <hr>

        <div class="layui-row login_one">
            <!--用户名-->
            <div class="layui-col-md6 layui-col-lg-offset4">
                <form class="layui-form">

                    <div class="layui-form-item">
                        <label class="layui-form-label label_style">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" value="" placeholder="请输入用户名" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux umind">*必填</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label label_style">密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="passwd" value="" placeholder="请输入密码" autocomplete="off"
                                   class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux pmind">*密码为6-12位</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label label_style">记住密码</label>
                        <div class="layui-input-inline">
                            <input type="checkbox" name="switch" lay-skin="switch">
                        </div>
                        <div class="layui-form-mid layui-word-aux">*不是自己的电脑不要勾选</div>
                    </div>

                </form>

            </div>


            <!--登陆注册按钮-->
            <div class="layui-row">
                <div class="layui-col-md2 layui-col-lg-offset3">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn bt login_bt" type="button" name="login">登录</button>
                        </div>
                    </div>
                </div>

                <div class="layui-col-md3">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button type="button" class="layui-btn  bt layui-btn-primary register_bt" name="register">注册
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="./layui/layui.all.js"></script>
<script src="./js/login.js"></script>

<?php require 'bottom.php'?>