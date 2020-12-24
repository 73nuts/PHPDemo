<?php
include_once 'islogin.php';
require_once ("../public/conn.php");
@$id = $_GET['id'];
$sql = "delete from yun_home where id=$id";
$result = mysqli_query($link, $sql);
if ($result) {
    echo '<script type="text/javascript">alert("删除成功");window.open("home_img.php","right");</script>';
} else {
    echo '<script type="text/javascript">alert("删除失败！");history.back();</script>';
}
?>
	