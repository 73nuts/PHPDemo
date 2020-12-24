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
if (! session_id())
    session_start();
include_once 'islogin.php';
require_once ('../public/conn.php');
@$username = $_SESSION['username'];
$sql = "select * from yun_admin where AdminName='" . $username . "'";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);
$username = $rows['AdminName'];
$password = $rows['AdminPwd'];
?>
<body>
	<div class="panel admin-panel">
		<div class="panel-head">
			<strong><span class="icon-key"></span> 修改密码</strong>
		</div>
		<div class="body-content">
			<form method="post" class="form-x" action="">
				<div class="form-group">
					<div class="label">
						<label for="sitename">管理员帐号：</label>
					</div>
					<div class="field">
						<label style="line-height: 33px;">
           	<?=$username?>
          </label>
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label for="sitename">原始密码：</label>
					</div>
					<div class="field">
						<input type="password" class="input w50" id="mpass" name="mpass"
							size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label for="sitename">新密码：</label>
					</div>
					<div class="field">
						<input type="password" class="input w50" name="newpass" size="50"
							placeholder="请输入新密码"
							data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />
					</div>
				</div>
				<div class="form-group">
					<div class="label">
						<label for="sitename">确认新密码：</label>
					</div>
					<div class="field">
						<input type="password" class="input w50" name="renewpass"
							size="50" placeholder="请再次输入新密码"
							data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致" />
					</div>
				</div>

				<div class="form-group">
					<div class="label">
						<label></label>
					</div>
					<div class="field">
						<button name="Submit" class="button bg-main icon-check-square-o"
							type="submit">提交</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
if (isset($_POST['Submit'])) {
    $oldPassword = $_POST['mpass'];
    $password1 = $_POST['newpass'];
    $password2 = $_POST['renewpass'];
    if (md5($oldPassword) == $password) {
        if ($oldPassword == $password1) {
            echo '<script type="text/javascript">alert("亲，新密码与原密码一致，请检查。");window.history.back();</script>';
            exit();
        } else {
            $query = "update yun_admin set AdminPwd='" . md5($password1) . "' where AdminName='" . $username . "'";
            $result = mysqli_query($link, $query);
            if ($result) {
                echo '<script type="text/javascript">alert("修改成功！");window.open("logout.php","_top");</script>';
                exit();
            } else {
                echo '<script type="text/javascript">alert("修改失败！");window.history.back();</script>';
                exit();
            }
        }
    } else {
        echo '<script type="text/javascript">alert("输入的【原始密码】有误！");window.history.back();</script>';
        exit();
    }
}
?>

</body>
</html>