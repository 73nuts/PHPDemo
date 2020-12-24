<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>

<?php
	include_once 'islogin.php';
	include_once("../public/conn.php");
	include_once("../public/Page.php");
	$sql = "select count(*) as count from yun_guestbook";
	$result = mysqli_query($link, $sql);
	$pageRes = mysqli_fetch_assoc($result);
	$count = $pageRes['count'];
	$number = 6;
	$page = new Page($number, $count);
	$href = $page->allUrl();
	$sql = "select * from yun_guestbook order by id desc limit ".$page->limit();
	$result = mysqli_query($link, $sql);
?>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <!--<div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>-->
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>其他联系方式</th>
        <th width="35%">内容</th>
         <th width="120">留言时间</th>
        <th>操作</th>       
      </tr>
<?php
	date_default_timezone_set('PRC');
	while ($rows = mysqli_fetch_assoc($result)) {
		echo '<tr><td>'.$rows['Id'].'</td><td>'.$rows['Name'].'</td>';
		echo '<td>'.$rows['Phone'].'</td><td>'.$rows['Email'].'</td>';
		echo '<td>'.$rows['OtherContact'].'</td><td>'.$rows['Content'].'</td>';
		echo '<td>'.date("Y-m-d",$rows['time']).'</td>';
		echo '<td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del('.$rows['Id'].')"><span class="icon-trash-o"></span> 删除</a> </div></td>';
	}
?>

        
      <tr>
        <td colspan="8"><div class="pagelist">
        	<?php
    			echo '共有'.$count.'条留言&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    			echo '第'.$page->page.'页/共'.$page->totalPage.'页';
			?>
        	<a href="<?=$href['first']?>">首页</a>
        	<a href="<?=$href['prev']?>">上一页</a>
        	<a href="<?=$href['next']?>">下一页</a>
        	<a href="<?=$href['end']?>">尾页</a></div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		location.href = 'del_book.php?id='+id;
	}
}
</script>
</body></html>