<?php
include_once ("pheader.php");
//$host = "127.0.0.1";
 $host = "localhost";
$user = "root";
$password = "";
$dbname = "yiyun";
$link = "";
$mydbcharset = "utf8";
$link = mysqli_connect($host, $user, $password) or die("连接MySQL服务器失败" . mysql_error());
mysqli_select_db($link, $dbname) or die("连接MySQL数据库失败" . mysql_error());
mysqli_query($link, 'set names ' . $mydbcharset);
?>