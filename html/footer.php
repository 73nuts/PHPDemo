<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<title>Document</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="icon" href="../images/yiyun.jpg" type="image/x-icon" />
</head>
<body>
	<div class="met_clear"></div>
	<footer class="tem_footer">
		<div class="my_inner">
			<div class="tem_footer_1 lf">
				<h1>联系我们</h1>
				<ul>
					<li>地址: 闽南理工学院14号楼629</li>
					<li>电话: 10086</li>
					<li >QQ: 2218572042@qq.com</li>
					<li>手机：1xxxxxxxxxx</li>
					<li>Email: 123213@qq.com 123123@qq.com</li>
				</ul>
			</div>

			<div class="tem_footer_2 lf">
				<div class="tem_footer_link">
					<h1>友情链接</h1>

					<div class="tem_img">
						<a href="https://www.1688.com/" title="阿里巴巴" target="_blank"><img
							src="../images/links.jpg" title="" alt=""></a> <a
							href="https://www.baidu.com/" title="百度" target="_blank"><img
							src="../images/bd_logo1.png" title="" alt=""></a> <a
							href="https://www.qq.com/" title="腾讯网" target="_blank"><img
							src="../images/qq_logo.png" title="" alt=""></a>
<!-- 		
					
					</div>



					<div class="tem_footer_3">

						<ul>
           <?php
        date_default_timezone_set('PRC');
        include_once ("../public/conn.php");
        $sql = "SELECT * FROM yun_column where isUse=1 LIMIT 4 ";
        $result = mysqli_query($link, $sql);
        while ($rows = mysqli_fetch_array($result)) {
            if ($rows['Cotype'] == 1) {
                echo '<li><a href="about.php?id=' . $rows['ColumnID'] . '" title="' . $rows['ColumnName'] . '">' . $rows['ColumnName'] . '</a></li>';
            }
            if ($rows['Cotype'] == 2) {
                echo '<li><a href="newslist.php?id=' . $rows['ColumnID'] . '" title="' . $rows['ColumnName'] . '">' . $rows['ColumnName'] . '</a></li>';
            }
            if ($rows['Cotype'] == 3) {
                echo '<li><a href="productlist.php?id=' . $rows['ColumnID'] . '" title="' . $rows['ColumnName'] . '">' . $rows['ColumnName'] . '</a></li>';
            }
        }
        ?>
           <li><a href="gbook.php" title="在线留言">在线留言</a></li>
							<li><a href="../admin/login.php" target="_blank">系统管理</a></li>
						</ul>
					</div>
				</div>
			</div>


			<div class="met_clear"></div>
	
	</footer>
	<!--底部结束-->