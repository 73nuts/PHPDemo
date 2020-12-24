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
include_once ("../public/conn.php");
$cid = $_GET['cid'];
if (@$_GET['cid'] == "") {
    echo '<script type="text/javascript">alert("未获取到columnid")</script>';
    die();
} else {
    $search_sql = "select * from yun_column where `ColumnID`=$cid";
    $search_rs = mysqli_query($link, $search_sql);
    while ($search_rows = mysqli_fetch_assoc($search_rs)) {
        $ColumnID = $search_rows['ColumnID'];
        $ColumnName = $search_rows['ColumnName'];
        $Cotype = $search_rows['Cotype'];
        $content = $search_rows['Content'];
        $oldurl = $search_rows['ColumnUrl'];
    }
}
?>
<body>
	<div class="panel admin-panel">
		<div class="panel-head">
			<strong><span class="icon-pencil-square-o"></span> 修改栏目</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action=""
				enctype="multipart/form-data">
				<div class="form-group">
					<div class="label">
						<label>栏目名称：</label>
					</div>
					<div class="field">
						<input type="text" class="input" name="ColumnName"
							value="<?=$ColumnName?>" />
						<div class="tips"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>栏目图片：</label>
					</div>
					<div class="field">
						<input readonly="readonly" type="text" class="input tips"
							style="width: 25%; float: left;" value="<?=$oldurl?>" />
						&nbsp;&nbsp; <input type="file" name="myfile" value="" />
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
							style="width: 800px; height: 400px;"><?=$content?></script>
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
    $url = $url ? $url : $oldurl;
    $ColumnName = $_POST['ColumnName'];
    $Cotype = $_POST['Cotype'];
    $Content = @$_POST['content'] ? $_POST['content'] : '';
    $update_sql = "update yun_column set Cotype='$Cotype',
				`ColumnName`='$ColumnName',`ColumnUrl`='$url',`Content`='$Content'
				where `ColumnID`=$ColumnID";
    $update_rs = mysqli_query($link, $update_sql);
    if ($update_rs) {
        mysqli_close($link);
        echo '<script type="text/javascript">alert("修改成功！");window.open("column.php","right");</script>';
    } else {
        echo '<script type="text/javascript">alert("修改失败！");history.back();</script>';
    }
}

?>
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
		if (<?=$Cotype?> != 1) {
			document.getElementById("dongtai").style = 'display:none';
			document.getElementById("Cotype").value = <?=$Cotype?>;
		}
		
		document.getElementById("btn_back").addEventListener('click',function () {
			window.open('column.php','right');
		});
		
	};


//alert(options.text());   //拿到选中项的文本
</script>

</body>
</html>