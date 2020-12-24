<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>网站信息</title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<?php
// include_once 'islogin.php';
include_once ("../public/conn.php");
$sql = "select * from yun_column";
$result = mysqli_query($link, $sql);
?>
<div class="panel admin-panel">
		<div class="panel-head">
			<strong class="icon-reorder"> 栏目列表</strong>
		</div>
		<div class="padding border-bottom">
			<a class="button border-yellow" href="add_column.php" target="right"><span
				class="icon-plus-square-o"></span> 添加栏目</a>
		</div>
		<table class="table table-hover text-center">
			<tr>
				<th width="5%">ID</th>
				<th>栏目名称</th>
				<th>栏目类型</th>
				<th width="15%">启用状态</th>
				<th width="25%">操作</th>
			</tr>
   	<?php
    while ($rows = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $rows['ColumnID'] . '</td><td>' . $rows['ColumnName'] . '</td>';
        // 判断栏目类型
        $cotype = $rows['Cotype'];
        if ($cotype == 1)
            $type = '内容页';
        else if ($cotype == 2)
            $type = '新闻列表页';
        else
            $type = '产品类型页';
        echo '<td>' . $type . '</td>';
        if ($rows['isUse'] == 1) {
            echo '<td style="color: green;">启用</td><td><div class="button-group">';
        }
        if ($rows['isUse'] == 0) {
            echo '<td style="color: red;">停用</td><td><div class="button-group">';
        }
        echo '<a type="button" class="button border-main" href="chk_isUse.php?isUse=1&id=' . $rows['ColumnID'] . '"><span class="icon-edit"></span>启用</a>';
        echo '<a class="button border-red" class="button border-main" href="chk_isUse.php?isUse=0&id=' . $rows['ColumnID'] . '"><span class="icon-edit"></span>停用</a>';
        echo '<a type="button" class="button border-main" href="edit_column.php?cid=' . $rows['ColumnID'] . '"><span class="icon-edit"></span>修改</a>';
        echo '<a class="button border-red" href="javascript:void(0)" onclick="return del(' . $rows['ColumnID'] . ')"><span class="icon-trash-o"></span> 删除</a></div></td></tr>';
    }
    ?>


		</table>
	</div>
	<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		location.href = "del_column.php?id="+id;
	}
}
</script>

</body>
</html>