<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品栏目</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
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
include_once ("../public/conn.php");
include 'header.php';
include_once ("../public/Page.php");
$ColumnID = $_GET['id'];
$sql = "select count(*) as count from yun_product where ColumnID='$ColumnID'";
$result = mysqli_query($link, $sql);
$pageRes = mysqli_fetch_assoc($result);
$count = $pageRes['count'];
$number = 8;
$page = new Page($number, $count);
$href = $page->allUrl();
$sql = "select * from yun_product where ColumnID='$ColumnID'  order by ProductID desc  limit " . $page->limit();
$result = mysqli_query($link, $sql);
$chr_sql = "SELECT * FROM yun_column WHERE ColumnID='$ColumnID'";
$chr_result = mysqli_query($link, $chr_sql);
$chr_rows = mysqli_fetch_array($chr_result);
$url = "background:url(" . $chr_rows['ColumnUrl'] . ") no-repeat center center;";
?>
<!--头部结束-->

	<div class="tem_banne relative">
		<ul class="slides" style="height: 380px;">
			<li style="<?php echo $url;?>height:380px;"></li>
		</ul>

	</div>
	</div>
	<div class="met_clear"></div>
	<div class="met_module3_list my_produc mysection">
		<h2>
			<strong><?php echo $chr_rows['ColumnName'];?></strong><a href="#all"
				id="all" target="_black"></a>
		</h2>
		<div class="my_produc_list">
			<div class="my_produc_list_s">
				<ul class="cl">
      	<?php
    while ($rows = mysqli_fetch_array($result)) {
        ?>
        <li class="cright"><a
						href="product.php?id=<?php echo $rows['ProductID'];?>" title=""
						target="_black">
							<div class="figure">
								<img src="<?php echo $rows['ProductUrl'];?>"
									style="height: 260px;" alt="图片关键词" />
							</div>
							<h3><?php echo $rows['ProductName'];?></h3>
					</a></li>
         
         <?php }?>
      </ul>
			</div>
		</div>
		<div class="met_clear"></div>
		<div class="met_pager"> 
  <?php
echo '共有' . $count . '条新闻&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '第' . $page->page . '页/共' . $page->totalPage . '页';
?>
        		<a href="<?=$href['first']?>" class="NextA">首页</a> <a
				href="<?=$href['prev']?>" class="NextA">上一页</a> <a
				href="<?=$href['next']?>" class="NextA">下一页</a> <a
				href="<?=$href['end']?>" class="NextA">尾页</a>
		</div>
	</div>
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
