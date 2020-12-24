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
		<?php
date_default_timezone_set('PRC');
include_once ("../public/conn.php");
?>
		<header data-waypointsok="" class="header mysection box_relative">
		<div class="tem_inner tem_head mynav mysection_s">
			<h1>
				<a class="logo_img" href="index.php" title="网络"> <img
					src="../images/logo2.png" alt="" title="" />
				</a>
			</h1>
			<nav>
				<ul>
					<li><a href="index.php" title="网站首页"> 网站首页 </a></li>
						<?php
    $sql = "SELECT * FROM yun_column where isUse=1 order by ColumnID asc";
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

						<li><a href="gbook.php" title="在线留言"> 在线留言 </a></li>
				</ul>
			</nav>
		</div>
	</header>