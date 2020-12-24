<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<?php
include_once 'islogin.php';
$id = $_GET['id'];
?>

<body>
	<div class="panel admin-panel">
		<div class="panel-head">
			<strong><span class="icon-pencil-square-o"></span> 添加产品</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action=""
				enctype="multipart/form-data">
				<div class="form-group">
					<div class="label">
						<label>产品名称：</label>
					</div>
					<div class="field">
						<input name="ProductName" type="text" class="input" value=""
							data-validate="required:请输入产品名称" />
						<!--<input type="text" class="input" name="ProductName" value="" />-->
						<div class="tips"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>产品图片：</label>
					</div>
					<div class="field">
						<input type="file" name="picture" value="" />
						<div
							style="height: 34px; line-height: 34px; display: inline-block; color: #999;">
							图片需小于2M</div>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>详细信息：</label>
					</div>
					<div class="field">

						<!-- 加载编辑器的容器 -->
						<script id="container" name="content" type="text/plain"
							style="width: 800px; height: 400px;">
			</script>
						<!-- 实例化编辑器 -->
						<script type="text/javascript">
				var ue = UE.getEditor('container');
			</script>
						<!--<textarea name="content"></textarea>-->
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label></label>
					</div>
					<div class="field">
						<button name="submit" class="button bg-main icon-check-square-o"
							type="submit">提交</button>
						<button id="btn_back" class="button bg-back" type="button"
							style="padding: 10px 38.5px;">返回</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
	document.getElementById("btn_back").addEventListener('click',function () {
		window.open('product_list.php?id=<?=$id?>','right');
	});
</script>

<?php
include_once '../public/Upload.php';
include_once ("../public/conn.php");
if (isset($_POST['submit'])) {
    // 创建上传对象
    $up = new Upload([
        'path' => '../upload/product/'
    ]);
    // 执行上传方法
    $url = $up->uploadFile('picture');
    
    $ProductName = $_POST['ProductName'];
    $ProductInfo = @$_POST['content'] ? $_POST['content'] : '';
    $sql = "insert into yun_product(ColumnID,ProductName,ProductUrl,ProductInfo) 
		values(" . $id . ",'" . $ProductName . "','" . $url . "','" . $ProductInfo . "')";
    // var_dump($sql);
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '<script type="text/javascript">alert("添加产品成功");window.open("product_list.php?id=' . $id . '","right");</script>';
        exit();
    } else {
        echo '<script type="text/javascript">alert("添加产品失败！");</script>';
        exit();
    }
}
?>

</body>
</html>