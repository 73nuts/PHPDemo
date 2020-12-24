<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/lunbo.css" />
		<script src="../js/jQuery1.8.2.js" type="text/javascript"></script>

</head>
<body>
	<!--中间banner部分开始-->
<?php
include_once ("../public/conn.php");
$cp_sql = "select * from yun_product order by ProductID desc limit 0,3";
$news_sql = "select * from yun_news order by clicked desc limit 0,3";
$cp_result = mysqli_query($link, $cp_sql);
$news_result = mysqli_query($link, $news_sql);
$sql = "SELECT * FROM yun_home WHERE id='1' and homeClass='01'";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);
$url = "background-image:url(" . $rows['homeurl'] . ");";
?>

<link media="screen" href="../css/all.css" type="text/css"
		rel="stylesheet" />
	<script type="text/javascript" src="../js/all.js"></script>
	<div id="home_banner" class="mysection">
		<a onClick="pgvSendClick({hottag:'HRTENCENT.HOME.BANNER.BANNER69'});"
			href="" id="big_a">
			<div id="big_img" style="<?php $url;?> height:890px;"></div>
		</a>
  <?php
$chr_sql = "SELECT * FROM yun_home WHERE  homeClass='01'";
$chr_result = mysqli_query($link, $chr_sql);
?>
  <div class="relative">
			<div id="small_img">
				<div class="maxwidth">
					<div id="small_imgs"> 
        	<?php
        while ($chr_rows = mysqli_fetch_array($chr_result)) {
            ?>
        	
        	
          <a href="javascript:;" class="item">
							<div title="" class="img" b="<?php echo $chr_rows['homeurl'];?>"
								l="" theid="69">
								<img src="<?php echo $chr_rows['homeurl'];?>" alt="" />
							</div>
						</a> 
          
          <?php }?>
		  </div>
					<div class="clr"></div>
				</div>
			</div>
		</div>
	</div>
	<!--中间banner部分结束-->
	<div class="service">
		<div class="text">
			<p id="" class="title">产品展示</p>
			<p style="font-size: 17px; margin-top: 15px;">看看哦</p>
		</div>

		<ul id="Product">
			<?php
while ($arr = mysqli_fetch_array($cp_result)) {
    echo '<li id="pli"><a href="product.php?id=' . $arr['ProductID'] . '"><div class="tu"><img id="pimg" src="' . $arr['ProductUrl'] . '"/></div>
	     	<p>' . $arr['ProductName'] . '</p>
	     	</a>
			</li>';
}
?>
			</ul>

	</div>
	<!--content部分结束-->
	<div class="news">
		<p class="title" style="padding-top: 30px;">最新新闻</p>
		<p style="font-size: 17px; text-align: center;">聚焦最新的软件动态</p>
		<div class="piclist" style="margin-top: 50px;">
			<ul id="neews">
					<?php
    while ($arr = mysqli_fetch_array($news_result)) {
        echo '<a href="news.php?id=' . $arr['NewsID'] . '"><li id="nli"><div><img id="nimg" src="' . $arr['ImagesUrl'] . '"></div><p id="np">' . $arr['NewsTitle'] . '</p></li></a>';
    }
    ?>
					 
				</ul>
		</div>

	</div>
</body>
</home>
</html>