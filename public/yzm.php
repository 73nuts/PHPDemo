<?php
if (! session_id())
    session_start();
$str = "qazwsxedcrfvtgbyhnujmkiolpQAZWSXEDCRFVTGBNHYUJMKIOLP123456789";
$num = "";
for ($i = 0; $i < 4; $i ++) {
    $num = $num . substr($str, rand(0, 63), 1);
}
$_SESSION['yzm'] = $num;
$im = imagecreate(100, 30);
$blue = imagecolorallocate($im, 0, 0, 255);
$white = imagecolorallocate($im, 255, 255, 255);
imagestring($im, 5, 30, 6, $num, $white);
header('content-type:image/gif');
imagegif($im);
?>