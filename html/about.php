<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们</title>
<meta name="description"
	content="简洁大方的互联网公司企业白色HTML模板由ASPCMS模板仿站教程网站制作，大家可以免费下载使用，ASPCMS模板仿站教程网保证代码完全免费，使大家能够拥有一个喜欢的网络平台。" />
<meta name="keywords" content="互联网信息公司网站模板,简洁大方的企业HTML模板,企业白色HTML模板" />
<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="icon" href="../images/yiyun.jpg" type="image/x-icon" />
		<script src="../js/jQuery1.8.2.js" type="text/javascript"></script>

</head>
<body>
	<!--头部开始-->
			<?php
include_once ("../public/conn.php");
include 'header.php';
$ColumnID = $_GET['id'];
$chr_sql = "SELECT * FROM yun_column WHERE ColumnID='$ColumnID'";
$chr_result = mysqli_query($link, $chr_sql);
$chr_rows = mysqli_fetch_array($chr_result);
$url = "background:url(" . $chr_rows['ColumnUrl'] . ") no-repeat center center;";
?>
<!--头部结束-->
	<!--banner部分-->

	<div class="tem_banner relative">
		<ul class="slides" style="height: 380px;">
			<li style="<?php echo $url;?> height:380px;"></li>
		</ul>
	</div>
	<!--banner部分结束-->
   <?php
$che_sql = "SELECT * FROM yun_column where Cotype='1' LIMIT 0 ,5 ";
$che_result = mysqli_query($link, $che_sql);
?>
<section class="met_section  "> <aside class="margin"> <section
		class="met_aside">
	<h2><?php echo $chr_rows['ColumnName'];?></h2>
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
		<section class="met_article_head">
		<h1><?php echo $chr_rows['ColumnName'];?></h1>
		<div class="met_position">
			<a href="index.php" title="首页">首页</a> &gt; <?php echo $chr_rows['ColumnName'];?> </div>
		</section>
		<div class="met_clear"></div>
		<div class="met_editor met_module1">
			<div>
         
         	<?php echo $chr_rows['Content'];?>
        </div>
			<div class="clear"></div>
		</div>
	</div>
	</article>
	<div class="met_clear"></div>
	</section>
	<div class="met_clear"></div>

	<!--底部开始-->
<?php
include 'footer.php';
?>
<!--底部结束-->
</body>
</html>
