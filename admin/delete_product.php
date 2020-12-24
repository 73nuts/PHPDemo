<?php
include_once 'islogin.php';
include_once ("../public/conn.php");
$id = $_GET['idstr'];
$cid = $_GET['cid'];
$arr_id = explode('`', $id);
$temp_id = implode(',', $arr_id);
$del_sql = "delete from yun_product where ProductID in($temp_id)";
$result = mysqli_query($link, $del_sql);
if ($result) {
    echo '<script type="text/javascript">alert("删除成功");window.location.href="product_list.php?id=' . $cid . '";</script>';
} else {
    echo '<script type="text/javascript">alert("删除失败");history.back();</script>';
}
?>