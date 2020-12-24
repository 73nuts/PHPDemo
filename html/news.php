<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品内容</title>
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
$NeswID = $_GET['id'];
$dian_sql = "UPDATE yun_news SET Clicked=Clicked+1 WHERE NewsID='$NeswID'";
$dian_result = mysqli_query($link, $dian_sql);
$sql = "select * from yun_news where NewsID='$NeswID'";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);
$ColumnID = $rows['ColumnID'];
$chr_sql = "SELECT * FROM yun_column WHERE ColumnID='$ColumnID'";
$chr_result = mysqli_query($link, $chr_sql);
$chr_rows = mysqli_fetch_array($chr_result);
$url = "background:url(../system/" . $chr_rows['ColumnUrl'] . ") no-repeat center center;";
?>
<!--头部结束-->

	<div class="tem_banner relative">
		<ul class="slides" style="height: 380px;">
			<li style="<?php echo $url;?> height:380px;"></li>
		</ul>
	</div>
	<div class="met_section met_section_asidenone met_section_sehed">
		<div class="met_section_head">
			<a href="index.php" title="首页">首页</a> &gt; <a
				href="newslist.php?id=<?php echo $ColumnID;?>"><?php echo $chr_rows['ColumnName'];?></a> 
  	 > <?php echo $rows['NewsTitle'];?>
  	 </div>
		<div>
			<div class="met_article">
				<div class="met_clear"></div>
				<div id="showproduct">
					<div style="text-align: center;">
						<p style="font-size: 24px; font-weight: bold;"><?php echo $rows['NewsTitle'];?></p>
						<p>
							<span>作者：<?php echo $rows['Penster'];?></span> <span>发布时间：<?php echo date('Y-m-d',$rows['PublishTime']);?></span>
							<span>热度:<?php echo $rows['clicked'];?></span>
						</p>
						<p>
							<img src="<?php echo $rows['ImagesUrl']?>" alt=""
								style="height: 300px; width: 500px; max-width: 660px; margin: 20px;" />
						</p>
					</div>
					<div class="met_clear"></div>
					<ol class="met_nav">
						<li class="met_now"><a>详细信息</a></li>
					</ol>
					<div class="met_nav_contbox">
						<div class="met_editor ">
							<div>
              <?php echo $rows['Content'];?>
              <div id="metinfo_additional"></div>
							</div>
							<div class="met_clear"></div>
						</div>
					</div>
        <?php
        $seat_sql = "SELECT MAX(NewsID) maxID , MIN(NewsID) minID  from yun_news  WHERE ColumnID='$ColumnID'";
        $seat_result = mysqli_query($link, $seat_sql);
        $seat_rows = mysqli_fetch_array($seat_result);
        $maxID = $seat_rows['maxID'];
        $minID = $seat_rows['minID'];
        ?>       
        <div class="met_tools">
						<ul class="met_page">
          	<?php
        if ($maxID != $NeswID) {
            $Last_sql = "select MIN(NewsID) Last FROM yun_news where NewsID >'$NeswID' ORDER BY NewsID";
            $Last_result = mysqli_query($link, $Last_sql);
            $Last_rows = mysqli_fetch_array($Last_result);
            $top_sql = "select * from yun_news where NewsID =" . $Last_rows['Last'];
            $top_result = mysqli_query($link, $top_sql);
            $top_rows = mysqli_fetch_array($top_result);
            echo '<li class="met_page_preinfo"><span>上一条</span><a href="news.php?id=' . $Last_rows['Last'] . '" target="_self">' . $top_rows['NewsTitle'] . '</a></li>';
        }
        ?>
          		
          		<?php
            if ($minID != $NeswID) {
                $Next_sql = "select max(NewsID) Next FROM yun_news where NewsID <'$NeswID' ORDER BY NewsID";
                $Next_result = mysqli_query($link, $Next_sql);
                $Next_rows = mysqli_fetch_array($Next_result);
                $xia_sql = "select * from yun_news where NewsID =" . $Next_rows['Next'];
                $xia_result = mysqli_query($link, $xia_sql);
                $xia_rows = mysqli_fetch_array($xia_result);
                echo '<li class="met_page_next"><span>下一条</span><a href="news.php?id=' . $Next_rows['Next'] . '" target="_self">' . $xia_rows['NewsTitle'] . '</a></li>';
            }
            ?>           	
          </ul>
					</div>
				</div>
			</div>
		</div>
		<div class="met_clear"></div>
	</div>
	<div class="met_clear"></div>

	<!--底部开始-->
<?php
include 'footer.php';
?>
<!--底部结束-->
</body>
</html>
