<?php

isset($_SESSION) || session_start();

//销毁session
session_destroy();

//跳转到登录页面 或者 首页
header('Location:./login.php');