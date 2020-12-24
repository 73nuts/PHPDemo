<?php
include_once ("../public/conn.php");
/**
 * 获取新闻页、产品页
 *
 * 输出JSON
 */
$sql = "select * from yun_column where Cotype!=1";
$result = mysqli_query($link, $sql);
$json = [];
while ($rows = mysqli_fetch_assoc($result)) {
    $arr = [
        'Cotype' => $rows['Cotype'],
        'ColumnID' => $rows['ColumnID'],
        'ColumnName' => $rows['ColumnName']
    ];
    $json[] = $arr;
}
header('Content-Type:application/json'); // *重要!!!
echo json_encode((object) $json);