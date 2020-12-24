<?php
// 数据库里存储的路径为，也就是admin外面的upload
$str = "../upload/up_5c14e9c2772a6.jpg";

// 前台需要处理如下：
$new = ltrim($str, '.');
$new = '.' . $new;
echo $new;

?>
<img src="<?=$new; ?>" alt="" />