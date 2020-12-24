<?php
include ("../public/func.php");
@$id = $_GET['id'];
@$user = $_GET['user'];
$list_admin = "select * from yun_admin where id = '$id'";
$result = lj($link, $list_admin);
$del_admin = "delete from yun_admin where id=" . $id;
if (rows($result)['AdminName'] == $user) {
    json("", "不能删除当前用户");
    exit();
} else {
    $result = mysqli_query($link, $del_admin);
    if ($result) {
        json("", "删除成功");
        exit();
    } else {
        json("", "删除失败");
        exit();
    }
}
?>