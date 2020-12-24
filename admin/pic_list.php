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
include_once 'islogin.php';
include_once ("../public/conn.php");
$sql = "select * from yun_pic";
// var_dump($sql);
$result = mysqli_query($link, $sql);
?>
<div class="panel admin-panel">
		<div class="panel-head">
			<strong class="icon-reorder"> 首页轮播图列表</strong>
		</div>
		<div class="padding border-bottom">
			<a class="button border-yellow" href="add_pic.php" target="right"><span
				class="icon-plus-square-o"></span> 添加首页轮播图</a>
		</div>
		<table class="table table-hover text-center">
			<tr>
				<th width="5%">ID</th>
				<th>轮播图地址</th>
				<th width="250">操作</th>
			</tr>
   	<?php
    while ($rows = mysqli_fetch_assoc($result)) {
        echo '<tr><td>' . $rows['id'] . '</td><td>' . $rows['url_pic'] . '</td>';
        // echo '<a type="button" class="button border-main" href="edit_pic.php?cid='.$rows['id'].'"><span class="icon-edit"></span>修改</a>';
        echo '<td><a class="button border-red" href="javascript:void(0)" onclick="return del(' . $rows['id'] . ')"><span class="icon-trash-o"></span> 删除</a></div></td></tr>';
    }
    ?>
  

		</table>
	</div>
	<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		location.href = "del_pic.php?id="+id;
	}
}
</script>

</body>
</html>