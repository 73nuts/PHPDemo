<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>后台管理中心</title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
</head>

<?php
include_once 'islogin.php';
?>

<body style="background-color: #f2f9fd;">
	<div class="header bg-main">
		<div class="logo margin-big-left fadein-top">
			<h1>
				<img src="images/y.jpg" class="radius-circle rotate-hover"
					height="50" alt="" />后台管理中心
			</h1>
		</div>
		<div class="head-l">
			<a class="button button-little bg-green" href="../html/index.php"
				target="_blank"> <span class="icon-home"></span> 前台首页
			</a> &nbsp;&nbsp; <a href="pass.php"
				class="button button-little bg-blue" target="right"> <span
				class="icon-wrench"></span> 修改密码
			</a> &nbsp;&nbsp; <a class="button button-little bg-red"
				href="logout.php"> <span class="icon-power-off"></span> 退出登录
			</a>
		</div>
	</div>
	<div class="leftnav">
		<div class="leftnav-title">
			<strong><span class="icon-list"></span>菜单列表</strong>
		</div>
		<h2>
			<span class="icon-user"></span>基本设置
		</h2>
		<ul style="display: block">
			<li><a href="gl_user.php" target="right"><span
					class="icon-caret-right"></span>用户管理</a></li>
			<li><a href="pass.php" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
		</ul>
		<h2>
			<span class="icon-pencil-square-o"></span>栏目管理
		</h2>
		<ul>
			<li><a href="home_img.php" target="right"><span
					class="icon-caret-right"></span>轮播图管理</a></li>
			<li><a href="book.php" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
			<!--<li><a href="add_column.php" target="right"><span class="icon-caret-right"></span>添加栏目</a></li>-->
			<li><a href="column.php" target="right"><span
					class="icon-caret-right"></span>栏目管理</a></li>
    <?php
    include_once ("../public/conn.php");
    // 查出新闻页、产品页 显示在此处
    $sql = "select * from yun_column where Cotype!=1";
    $result = mysqli_query($link, $sql);
    while ($rows = mysqli_fetch_assoc($result)) {
        if ($rows['Cotype'] == 2) {
            echo '<li><a href="news_list.php?id=' . $rows['ColumnID'] . '" target="right"><span class="icon-caret-right"></span>' . $rows['ColumnName'] . '</a></li>';
        } else if ($rows['Cotype'] == 3) {
            echo '<li><a href="product_list.php?id=' . $rows['ColumnID'] . '" target="right"><span class="icon-caret-right"></span>' . $rows['ColumnName'] . '</a></li>';
        }
    }
    ?>
  </ul>
	</div>
	<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
window.onload = function () {
	showtime();
};

</script>
	<script src="js/show_time.js"></script>
	<ul class="bread">
		<li><b>欢迎您，
  <?php
if (! session_id())
    session_start();
echo $_SESSION['username'];
?></b></li>
		<li><b>当前时间：</b><span id="time" style="color: red;"></span>
	
	</ul>
	<div class="admin">
		<iframe scrolling="auto" rameborder="0" src="../images/admin.jpg"
			name="right" width="100%" height="100%"></iframe>
	</div>
</body>
</html>