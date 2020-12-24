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
			<strong><span class="icon-pencil-square-o"></span> 添加栏目</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action=""
				enctype="multipart/form-data">
				<div class="form-group">
					<div class="label">
						<label>栏目名称：</label>
					</div>
					<div class="field">
						<input name="ColumnName" type="text" class="input w50" value=""
							data-validate="required:请输入栏目名称" />
						<!--<input type="text" class="input" name="ColumnName" value="" />-->
						<div class="tips"></div>
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
						<label>栏目类型：</label>
					</div>
					<div class="field" style="height: 34px; line-height: 34px;">
						<select id="Cotype" name="Cotype" style="width: 150px;"
							class="input w50">
							<option value="1">内容页</option>
							<option value="2">新闻列表页</option>
							<option value="3">产品类型页</option>
						</select>
					</div>
				</div>
				<div id="dongtai" class="form-group">
					<div class="label">
						<label>内容：</label>
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
						<div class="tips"></div>
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
	window.onload = function () {
		var options=$("#Cotype");  //获取选中的项
		options.change(function () {
		//	alert($('select option:selected').val());   //拿到选中项的值
			if ($('select option:selected').val() != 1) {
				document.getElementById("dongtai").style = 'display:none';
			} else{
				document.getElementById("dongtai").style = 'display:block';
			}
			
		});
		
		document.getElementById("btn_back").addEventListener('click',function () {
			window.open('column.php','right');
		});
	};


//alert(options.text());   //拿到选中项的文本
</script>
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
    $ColumnName = $_POST['ColumnName'];
    $Cotype = $_POST['Cotype'];
    $Content = @$_POST['content'] ? $_POST['content'] : '';
    $sql = "insert into yun_column(Cotype,ColumnName,ColumnUrl,Content,isUse) values(" . $Cotype . ",'" . $ColumnName . "','" . $url . "','" . $Content . "',1)";
    // var_dump($sql);
    // die;
    $result = mysqli_query($link, $sql);
    if ($result) {
        echo '<script type="text/javascript">alert("添加栏目成功");window.open("column.php","right");</script>';
        exit();
    } else {
        echo '<script type="text/javascript">alert("添加栏目失败！");</script>';
    }
}

?>


</body>
</html>