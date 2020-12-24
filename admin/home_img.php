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
$sql = "SELECT * FROM yun_home where homeClass='01' LIMIT 4";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
?>

<div class="panel admin-panel">
		<div class="panel-head">
			<strong class="icon-reorder"> 栏目列表</strong>
		</div>
  <?php
if ($num < 4) {
    echo '<div class="padding border-bottom">  
  	<a class="button border-yellow" href="add_homeImg.php" target="right"><span class="icon-plus-square-o"></span> 添加轮播图</a>
  	</div> ';
}
?>
  <table class="table table-hover text-center">
			<tr>
				<th width="5%">ID</th>
				<th>名称</th>
				<th>类型</th>
				<th width="250">操作</th>
			</tr>
    <?php
    $i = 1;
    while ($rows = mysqli_fetch_array($result)) {
        echo '<tr>
      <td>' . $rows['id'] . '</td>      
      <td>轮播图' . $i . '</td>  
      <td>首页轮播图</td>      
      <td>
      <div class="button-group">
      <a type="button" class="button border-main" href="edit_homeImg.php?id=' . $rows['id'] . '"><span class="icon-edit"></span>修改</a>
       <a class="button border-red" href="javascript:void(0)" onclick="return del(' . $rows['id'] . ')"><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr>';
        $i ++;
    }
    ?>
  </table>
	</div>
	<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		location.href = "del_homeImg?id="+id;
	}
}
</script>

</body>
</html>