<?php
include_once 'islogin.php';
require_once ("../public/conn.php");
if (! session_id())
    session_start();
@$id = $_GET['id'];
$sql = "select * from yun_pic where id='$id'";
$del_sql = "delete from yun_pic where id='$id'";
$result = mysqli_query($link, $sql);
$dpic = mysqli_fetch_assoc($result);
if (file_exists($dpic['url_pic']))
    unlink($dpic['url_pic']);
$del_result = mysqli_query($link, $del_sql);
if ($result) {
    echo '<script type="text/javascript">alert("删除成功！");window.open("pic_list.php","right");</script>';
} else {
    echo '<script type="text/javascript">alert("删除失败！");history.back();</script>';
}
?>
