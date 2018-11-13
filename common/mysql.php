<?php
isset($_SESSION) || session_start();
$mysql=new mysqli("localhost","root","root","dada","3306");
$mysql->query("SET NAMES UTF8");