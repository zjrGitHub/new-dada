<?php

$file = explode('.', $_FILES['myheader']['name']);
$ext = array_pop($file);
$filename = './upload/'.date('Y/m').'/' . uniqid('img_') . '.' . $ext;
$r = move_uploaded_file($_FILES['myheader']['tmp_name'], $filename);
echo json_encode(['path'=>$filename]);
