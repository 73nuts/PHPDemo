<?php
include_once ("../public/conn.php");
include_once ("../public/echojson.php");
$sql = "select * from yun_pic order by id desc";
$cp_sql = "select * from yun_product order by ProductID desc";
$news_sql = "select * from yun_news order by clicked desc";
$result = mysqli_query($link, $sql);
$cp_result = mysqli_query($link, $cp_sql);
$news_result = mysqli_query($link, $news_sql);
// @jsonarr($result,"pic",$cp_result, "product",$news_result,"news");
json($result, "pic");

?>