<?php
// include_once 'islogin.php';
include_once ("../public/conn.php");
@$isUse = $_GET['isUse'];
@$id = $_GET['id'];
$qy_sql = "update yun_column set isUse='1' where ColumnID=" . $id;
$ty_sql = "update yun_column set isUse='0' where ColumnID=" . $id;
if ($isUse == 1) {
    $result = mysqli_query($link, $qy_sql);
    if ($result) {
        echo '<script type="text/javascript">window.open("column.php","right");</script>';
        exit();
    } else {
        echo '<script type="text/javascript">alert("启用失败!");window.open("column.php","right");</script>';
        exit();
    }
}
if ($isUse == 0) {
    $result = mysqli_query($link, $ty_sql);
    if ($result) {
        echo '<script type="text/javascript">window.open("column.php","right");</script>';
        exit();
    } else {
        echo '<script type="text/javascript">alert("停用失败!");window.open("column.php","right");</script>';
        exit();
    }
}
?>
