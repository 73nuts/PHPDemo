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
</head>
<?php
include_once 'islogin.php';
?>


<body>
	<div class="panel admin-panel">
		<div class="panel-head" id="add">
			<strong><span class="icon-pencil-square-o"></span>添加用户</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action="">
				<div class="form-group">
					<div class="label">
						<label>用户名：</label>
					</div>
					<div class="field">
						<input name="username" type="text" class="input w50" value=""
							data-validate="required:请输入用户名" />
						<div class="tips"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>密码：</label>
					</div>
					<div class="field">
						<input name="password" type="password" class="input w50" value=""
							data-validate="required:请输入密码" />
						<div class="tips"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>真实姓名：</label>
					</div>
					<div class="field">
						<input name="realname" type="text" class="input w50" value="" />
					</div>
				</div>
				<div class="form-group" style="line-height: 34px;">
					<div class="label">
						<label>性别：</label>
					</div>
					<div class="field">
						<input type="radio" name="sex" value="0" checked="checked" /><label
							for="sex">男</label> <input type="radio" name="sex" value="1" /><label
							for="sex">女</label>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label>QQ：</label>
					</div>
					<div class="field">
						<input name="qq" type="text" class="input w50" value="" />
					</div>
				</div>

				<div class="form-group">
					<div class="label">
						<label></label>
					</div>
					<div class="field">
						<button name="btn_add" class="button bg-main icon-check-square-o"
							type="submit">添加</button>
						<button id="btn_back" class="button bg-back" type="button"
							style="padding: 10px 38.5px;">返回</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
	document.getElementById("btn_back").addEventListener('click',function () {
		window.open('gl_user.php','right');
	});
</script>
	
<?php
include_once ("../public/conn.php");
if (isset($_POST['btn_add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $realname = $_POST['realname'];
    $sex = $_POST['sex'];
    $qq = $_POST['qq'];
    if ($realname == '')
        $realname = '未填';
    if ($qq == '')
        $qq = '未填';
    $query = "select * from yun_admin where AdminName='" . $username . "'";
    $result = mysqli_query($link, $query);
    $num = mysqli_num_rows($result);
    if ($num <= 0) {
        // "insert into yun_admin(AdminName,AdminPwd,RealityName,Sex,AdminQQ) values('admin',md5('123'),'超级管理员',0,'123456')"
        $query = "insert into yun_admin(AdminName,AdminPwd,RealityName,Sex,AdminQQ) values('" . $username . "',md5('" . $password . "'),'" . $realname . "','" . $sex . "','" . $qq . "')";
        // var_dump($query);
        $result = mysqli_query($link, $query);
        if ($result) {
            echo '<script type="text/javascript">alert("添加用户成功！");window.location.href = "gl_user.php"</script>';
            exit();
        } else {
            echo '<script type="text/javascript">alert("添加用户失败！");</script>';
        }
    } else {
        echo '<script type="text/javascript">alert("用户已存在，请修改！");</script>';
    }
}
?>
</body>
</html>