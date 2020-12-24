<?php
include_once 'islogin.php';
require_once ("../public/conn.php");
if (! session_id())
    session_start();
@$id = $_GET['id'];
$chk_sql = "select AdminName from yun_admin where id=$id";
$chk_rs = mysqli_query($link, $chk_sql);
$chk_rows = mysqli_fetch_array($chk_rs);
if ($_SESSION['username'] == $chk_rows['AdminName']) {
    echo '<script type="text/javascript">alert("禁止删除当前用户！");history.back();</script>';
} else {
    $sql = "delete from yun_admin where id=$id";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '<script type="text/javascript">window.open("gl_user.php","right");</script>';
    } else {
        echo '<script type="text/javascript">alert("删除失败！");history.back();</script>';
    }
}
?>
	