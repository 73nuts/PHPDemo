<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线留言</title>
<meta name="description"
	content="简洁大方的互联网公司企业白色HTML模板由ASPCMS模板仿站教程网站制作，大家可以免费下载使用，ASPCMS模板仿站教程网保证代码完全免费，使大家能够拥有一个喜欢的网络平台。" />
<meta name="keywords" content="互联网信息公司网站模板,简洁大方的企业HTML模板,企业白色HTML模板" />
<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="icon" href="../images/yiyun.jpg" type="image/x-icon" />
		<script src="../js/jQuery1.8.2.js" type="text/javascript"></script>
		<!--[if IE]><script src="../js/html5.js" type="text/javascript"></script><![endif]-->

</head>
<body>
	<!--头部开始-->
<?php
include 'header.php';
include_once ("../public/conn.php");
$che_sql = "SELECT * FROM yun_column where Cotype='1' LIMIT 0 ,5 ";
$che_result = mysqli_query($link, $che_sql);
?>
<!--头部结束-->
	<div class="tem_banner relative">
		<ul class="slides" style="height: 380px;">
			<li
				style="background: url(../images/about.jpg) no-repeat center center; height: 380px;"></li>
		</ul>
	</div>
	<section class="met_section  "> <aside class="margin"> <section
		class="met_aside">
	<h2>在线留言</h2>
	<div class="met_aside_list">
       	<?php
        while ($che_rows = mysqli_fetch_array($che_result)) {
            
            echo '<dl class="list-none navnow">
          					<dt><a href="about.php?id=' . $che_rows['ColumnID'] . '"  title="' . $che_rows['ColumnName'] . '" class="zm"><span>' . $che_rows['ColumnName'] . '</span></a></dt>
       					 </dl>';
        }
        ?> 
        <dl class="list-none navnow">
			<dt>
				<a href="gbook.php" title="在线留言" class="zm"><span>在线留言</span></a>
			</dt>
		</dl>
		<div class="met_clear"></div>
	</div>
	</section> </aside> <article>
	<div class="met_article">
		<div id="messagelist">
			<form enctype="multipart/form-data" method="post" class="ui-from"
				name="myform" action="">
				<div class="v52fmbx">
					<input type="hidden" name="lang" value="cn" />
					<h3 class="v52fmbx_hr">提交留言</h3>
					<dl>
						<dt class="ftype_select">姓名</dt>
						<dd class="ftype_input">
							<div class="fbox">
								<input name="username" type="text" placeholder="姓名"
									data-required=1 />
							</div>
							<span class="tips"></span>
						</dd>
					</dl>
					<dl>
						<dt class="ftype_select">电话</dt>
						<dd class="ftype_input">
							<div class="fbox">
								<input name="phone" type="text" placeholder="电话" />
							</div>
							<span class="tips"></span>
						</dd>
					</dl>
					<dl>
						<dt class="ftype_select">Email</dt>
						<dd class="ftype_input">
							<div class="fbox">
								<input name="email" type="text" placeholder="Email" />
							</div>
							<span class="tips"></span>
						</dd>
					</dl>
					<dl>
						<dt class="ftype_select">其他联系方式</dt>
						<dd class="ftype_input">
							<div class="fbox">
								<input name="contact" type="text" placeholder="其他联系方式" />
							</div>
							<span class="tips"></span>
						</dd>
					</dl>
					<dl>
						<dt class="ftype_select">留言内容</dt>
						<dd class="ftype_textarea">
							<div class="fbox">
								<textarea name="words" data-required=1 placeholder="留言内容"></textarea>
							</div>
							<span class="tips"></span>
						</dd>
					</dl>
					<dl class="noborder">
						<dt>&nbsp;</dt>
						<dd>
							<input type="submit" name="Submit" value="提交信息" id="btn_save"
								style="margin: 0 20px;" class="submit" />
						</dd>
					</dl>
				</div>
			</form>
		</div>
	</div>
	</article>
	<div class="met_clear"></div>
	</section>
	<div class="met_clear"></div>
<?php
date_default_timezone_set('PRC');
if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $time = time();
    $words = $_POST['words'];
    $sql = "insert into yun_guestbook(Name,Phone,Email,OtherContact,time,Content)
				values('$username','$phone','$email','$contact','$time','$words')";
    if ($username == '' || $phone == '' || $words == '') {
        echo '<script type="text/javascript">alert("姓名、电话和留言内容不能为空！");window.location.href="gbook.php";</script>';
    } else {
        $insert_rs = mysqli_query($link, $sql);
        if ($insert_rs) {
            echo '<script type="text/javascript">alert("留言成功！");window.location.href="gbook.php";</script>';
        } else {
            echo '<script type="text/javascript">alert("留言失败！");window.location.href="gbook.php";</script>';
        }
    }
}
?>

<!--底部开始-->
<?php
include 'footer.php';
?>
<!--底部结束-->
</body>
</html>
