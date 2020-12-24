<?php
include ("../public/func.php");
$AdminName = $_POST['AdminName'];
$AdminPwd = md5($_POST['AdminPwd']);
$Sex = $_POST['Sex'];
$RealityName = $_POST['RealityName'];
$AdminQQ = $_POST['AdminQQ'];
$chk_sql = 'select * from yun_admin where AdminName="' . $AdminName . '"';
$chk_result = lj($link, $chk_sql);
$chk_rows = rows($chk_result);
$chk_nums = nums($chk_result);

if ($chk_nums > 0) {
    json($chk_result, "用户名已存在");
    exit();
} else {
    $sql = "insert into yun_admin (AdminName,AdminPwd,Sex,RealityName,AdminQQ)
values ('$AdminName','$AdminPwd','$Sex','$RealityName','$AdminQQ') ";
    $result = lj($link, $sql);
    if ($result) {
        json($result, "添加用户成功");
        exit();
    } else {
        json($result, "添加用户失败,用户名可用");
        exit();
    }
}
?>
