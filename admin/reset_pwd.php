<?php
include_once 'islogin.php';
require_once ("../public/conn.php");
if (! session_id())
    session_start();
$id = $_GET['id'];
$chk_sql = "select AdminName from yun_admin where id=$id";
$chk_rs = mysqli_query($link, $chk_sql);
$chk_rows = mysqli_fetch_array($chk_rs);
if ($_SESSION['username'] == $chk_rows['AdminName']) {
    echo '<script type="text/javascript">alert("禁止重置当前用户密码！");history.back();</script>';
} else {
    $sql = "update yun_admin set AdminPwd='" . md5('123456') . "' where id=$id";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '<script type="text/javascript">alert("重置密码成功！");history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("重置密码失败！");history.back();</script>';
    }
}
?>