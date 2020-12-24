<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻中心</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="icon" href="../images/yiyun.jpg" type="image/x-icon" />
		<script src="../js/jQuery1.8.2.js" type="text/javascript"></script>

</head>
<body>
	<!--头部开始-->
		<?php
include 'header.php';
?>
<!--头部结束-->

	<!--banner开始-->

<?php
include_once ("../public/conn.php");
include 'header.php';
include_once ("../public/Page.php");
$ColumnID = $_GET['id'];
$sql = "select count(*) as count from yun_news where ColumnID='$ColumnID'";
$result = mysqli_query($link, $sql);
$pageRes = mysqli_fetch_assoc($result);
$count = $pageRes['count'];
$number = 5;
$page = new Page($number, $count);
$href = $page->allUrl();
$sql = "select * from yun_news where ColumnID='$ColumnID'  order by NewsID desc  limit " . $page->limit();
$result = mysqli_query($link, $sql);
$chr_sql = "SELECT * FROM yun_column WHERE ColumnID='$ColumnID'";
$chr_result = mysqli_query($link, $chr_sql);
$chr_rows = mysqli_fetch_array($chr_result);
$url = "background:url(" . $chr_rows['ColumnUrl'] . ") no-repeat center center;";
?>

<div class="tem_banner relative">
		<ul class="slides" style="height: 380px;">
			<li style="<?php echo $url;?> height:380px;"></li>
		</ul>
	</div>
	<section class="met_section mynews_aside  "> <aside> <!--banner结束--> <!--新闻列表-->

	<ul>
            	<?php
            $che_sql = "select * from yun_news where ColumnID='$ColumnID'  order by NewsID desc  limit 0,10";
            $che_result = mysqli_query($link, $che_sql);
            $i = 1;
            while ($che_rows = mysqli_fetch_array($che_result)) {
                echo '<li><a href="news.php?id=' . $che_rows['NewsID'] . '" target="_black">
            			<b>' . $i . '</b>' . $che_rows['NewsTitle'] . '</a></li>';
                $i ++;
            }
            ?>         
            </ul>
	</dd>
	</dl>

	</aside> <article>
	<div class="met_article">
		<section class="met_article_head">
		<h1><?php echo $chr_rows['ColumnName'];?></h1>
		<div class="met_position">
			<a href="index.php" title="首页">首页</a> &gt; <?php echo $chr_rows['ColumnName'];?></div>
		</section>
		<div class="met_clear"></div>
		<div class="met_module2_list ">
			<div class="">
				<div class="my_news">
					<ul>
            	
            <?php
            while ($rows = mysqli_fetch_array($result)) {
                ?>  
            	  <li>
							<h2>
								<a href="news.php?id=<?php echo $rows['NewsID']?>"
									title="<?php echo $rows['NewsTitle']?>" target="_black"><?php echo $rows['NewsTitle']?></a>
							</h2>
							<div class="article_info cl">
                	 <?php echo date('Y-m-d',$rows['PublishTime']);?>
                  <p>
									<a class="reader"
										href="news.php?id=<?php echo $rows['NewsID']?>"
										target="_black"> <b>看</b> <?php echo $rows['clicked'];?> </a>
								</p>
							</div>
							<div class="article">
								<div class="article_img">
									<a href="news.php?id=<?php echo $rows['NewsID']?>" title=""
										target="_black"><img src="<?php echo $rows['ImagesUrl']?>"
										alt=""></a>
								</div>
								<P><?php echo $rows['NewsBrief'];?></p>
							</div>
							<div class="readmore">
								<a href="news.php?id=<?php echo $rows['NewsID']?>"
									target="_black">阅读全文<b></b></a>
							</div>
						</li>
            	<?php }?>    
            </ul>
            
            
            <?php
            $num_sql = "SELECT * FROM yun_news WHERE ColumnID='$ColumnID'";
            $num_ruseult = mysqli_query($link, $num_sql);
            $num_rows = mysqli_num_rows($num_ruseult);
            $sum = $num_rows / 5;
            $total = intval($sum);
            if ($total == $sum) {
                $total = $total;
            } else {
                $total = $total + 1;
            }
            ?>          
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
	
	</article>
	<div class="met_clear"></div>
	</section>
	<div class="met_clear"></div>
	<!--新闻列表结束-->

	<!--底部开始-->
<?php
include 'footer.php';
?>
<!--底部结束-->
</body>
</html>
