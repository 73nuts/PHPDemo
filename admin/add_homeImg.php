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
<style type="text/css">
.clearFix:after {
	display: block;
	content: '';
	clear: both;
	zoom: 1;
}
</style>
<?php
include_once 'islogin.php';
?>
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
	<div class="panel admin-panel">
		<div class="panel-head">
			<strong><span class="icon-pencil-square-o"></span> 添加轮播图</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action=""
				enctype="multipart/form-data">
				<div class="form-group">
					<div class="label">
						<label>栏目名称：首页轮播图</label>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>栏目图片：</label>
					</div>
					<div class="field">
						<input type="file" name="myfile" value="" />
						<div
							style="height: 34px; line-height: 34px; display: inline-block; color: #999;">
							图片需小于2M</div>
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
<?php
include_once '../public/Upload.php';
include_once ("../public/conn.php");
if (isset($_POST['submit'])) {
    // 创建上传对象
    $up = new Upload([
        'path' => '../upload/'
    ]);
    // 执行上传方法
    $url = $up->uploadFile('myfile');
    $sql = "INSERT INTO yun_home (homeurl,homeClass) VALUES ('$url','01')";
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '<script type="text/javascript">alert("添加轮播图成功");window.open("home_img.php","right");</script>';
        exit();
    } else {
        echo '<script type="text/javascript">alert("添加轮播图失败！");</script>';
    }
}

?>
<script type="text/javascript">
	window.onload = function () {
		
		document.getElementById("btn_back").addEventListener('click',function () {
			window.open('home_img.php','right');
		});
	};


//alert(options.text());   //拿到选中项的文本
</script>
</body>
</html>