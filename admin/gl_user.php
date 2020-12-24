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
	if(!session_id()) session_start();
//	var_dump($_SESSION['username']);
//	die;
	$sql = "select count(*) as count from yun_admin";
	$result = mysqli_query($link, $sql);
	$pageRes = mysqli_fetch_assoc($result);
	$count = $pageRes['count'];
	$number = 5;
	$page = new Page($number, $count);
	$href = $page->allUrl();
	$sql = "select id,AdminName,RealityName,Sex,AdminQQ from yun_admin limit ".$page->limit();
	$result = mysqli_query($link, $sql);
?>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button" class="button border-yellow" id="adduser"><span class="icon-plus-square-o"></span> 添加用户</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>用户名</th>       
        <th>真实姓名</th>
        <th>性别</th>
        <th>QQ</th>
        <th>操作</th> 
        <!--<th width="25%">内容</th>
         <th width="120">留言时间</th>-->
      </tr>
      <?php
      	while ($rows = mysqli_fetch_assoc($result)) {
			echo '<tr><td>'.$rows['id'].'</td><td>'.$rows['AdminName'].'</td>';
			if ($rows['Sex'] == 0){
				$sex = '男';
			} else {
				$sex = '女';
			}
			echo '<td>'.$rows['RealityName'].'</td><td>'.$sex.'</td><td>'.$rows['AdminQQ'].'</td>';
			if($_SESSION['username']==$rows['AdminName']){
				echo '<td><div class="button-group"> <a class="button border-red" href="pass.php" >修改密码</a> </div>&nbsp;&nbsp;&nbsp;';
			}else{
				echo '<td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return resetpwd('.$rows['id'].')">重置密码</a> </div>&nbsp;&nbsp;&nbsp;';
			}
			echo '<div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del('.$rows['id'].')"><span class="icon-trash-o"></span> 删除</a> </div></td></tr>';
		}
      ?>

        
      <tr>
        <td colspan="8">
        	<div class="pagelist">
        		<?php
        			echo '共有'.$count.'名用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        			echo '第'.$page->page.'页/共'.$page->totalPage.'页';
    			?>
        		<a href="<?=$href['first']?>">首页</a>
        		<a href="<?=$href['prev']?>">上一页</a>
        		<a href="<?=$href['next']?>">下一页</a>
        		<a href="<?=$href['end']?>">尾页</a>
        	</div>
        </td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
//		alert('id:' + id);
		location.href = "del_user.php?id=" + id;
	}
}
function changepwd(id){
//		alert('id:' + id);
		location.href = "pass.php?id=" + id;
}
function resetpwd(id){
	if(confirm("您确定要重置密码吗?")){
//		alert('id:' + id);
		location.href = "reset_pwd.php?id=" + id;
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})
//添加用户按钮
$("#adduser").click(function(){ 
  window.open('add_user.php','right');
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>