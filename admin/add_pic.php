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
		<?php
include_once 'islogin.php';
?>
		<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/ueditor.all.min.js">
		</script>
<script type="text/javascript" charset="utf-8"
	src="ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
			window.onload = function () {
				document.getElementById("btn_back").addEventListener('click',function () {
					window.open('pic_list.php','right');
				});
			};
		</script>
</head>
<body>
	<div class="panel admin-panel">
		<div class="panel-head">
			<strong><span class="icon-pencil-square-o"></span>添加首页轮播图片</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action=""
				enctype="multipart/form-data">
				<div class="form-group">
					<div class="label">
						<label>上传图片：</label>
					</div>
					<div class="field">
						<input type="file" name="mypic" value="" />
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
    // var_dump($url);
    // echo $sql;
    // die;
    $ck_sql = "select * from yun_pic order by id desc";
    $ck_result = mysqli_query($link, $ck_sql);
    $ck_nows = mysqli_num_rows($ck_result);
    if ($ck_nows > 7) {
        echo '<script type="text/javascript">alert("图片已有八张,请删除一些图片！");</script>';
        exit();
    } else {
        $up = new Upload([
            'path' => '../upload/',
            'isRandName' => TRUE
        ]);
        // 执行上传方法
        $url = $up->uploadFile('mypic');
        $sql = "insert into yun_pic(url_pic) values('" . $url . "')";
        if ($url) {
            $result = mysqli_query($link, $sql);
            if ($result) {
                echo '<script type="text/javascript">window.open("pic_list.php","right");</script>';
                exit();
            }
        } else {
            echo '<script type="text/javascript">alert("请选择图片！");</script>';
        }
    }
}
?>
	</body>
</html>