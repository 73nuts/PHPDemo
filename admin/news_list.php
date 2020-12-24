<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<?php
include_once 'islogin.php';
$id = $_GET['id'];
include_once ("../public/conn.php");
include_once ("../public/Page.php");
$sql = "select count(*) as count from yun_news where ColumnID=" . $id;
$result = mysqli_query($link, $sql);
$pageRes = mysqli_fetch_assoc($result);
$count = $pageRes['count'];
$number = 5;
$page = new Page($number, $count);
$href = $page->allUrl();
$sql = "select * from yun_news where ColumnID=" . $id . " order by NewsID desc limit " . $page->limit();
$result = mysqli_query($link, $sql);
?>

<body>
	<form method="post" action="" id="listform">
		<div class="panel admin-panel">
  	<?php
// 根据id读取栏目名
$load_sql = 'SELECT ColumnName FROM yun_column WHERE ColumnID=' . $id;
$load_rs = mysqli_query($link, $load_sql);
$head = mysqli_fetch_assoc($load_rs)['ColumnName'];
?>
    <div class="panel-head">
				<strong class="icon-reorder"> <?=$head?></strong> <a href=""
					style="float: right; display: none;">添加字段</a>
			</div>
			<div class="padding border-bottom">
				<ul class="search" style="padding-left: 10px;">
					<li><a class="button border-main icon-plus-square-o"
						href="add_new.php?id=<?=$id; ?>"> 添加新闻</a></li>
				</ul>
			</div>
			<table class="table table-hover text-center">
				<tr>
					<th width="100" style="text-align: left; padding-left: 20px;">ID</th>
					<th width="35%">新闻标题</th>
					<th width="17%">更新时间</th>
					<th width="12%">发布人</th>
					<th width="8%">点击量</th>
					<th width="300">操作</th>
				</tr>
				<volist name="list" id="vo"> 
				<?php
    date_default_timezone_set('PRC');
    while ($rows = mysqli_fetch_assoc($result)) {
        echo '<tr><td style="text-align:left; padding-left:20px;"><input type="checkbox" name="newsid" value="' . $rows['NewsID'] . '" />' . $rows['NewsID'] . '</td>';
        echo '<td width="10%"><a href="edit_new.php?nid=' . $rows['NewsID'] . '&id=' . $id . '">' . $rows['NewsTitle'] . '</a></td><td>' . date("Y-m-d H:i:s", $rows['PublishTime']) . '</td>';
        echo '<td><font color="#00CC99">' . $rows['Penster'] . '</font></td>';
        echo '<td>' . $rows['clicked'] . '</td><td><div class="button-group"><a class="button border-main" href="edit_new.php?nid=' . $rows['NewsID'] . '&id=' . $id . '"><span class="icon-edit"></span> 修改</a>';
        echo '<a class="button border-red" href="javascript:void(0)" onclick="return del(' . $rows['NewsID'] . ')"><span class="icon-trash-o"></span> 删除</a> </div></td>';
    }
    ?>
   		

				<tr>
					<td style="text-align: left; padding: 19px 0; padding-left: 20px;"><input
						type="checkbox" id="checkall" /> 全选</td>
					<td colspan="7" style="text-align: left; padding-left: 20px;"><a
						href="javascript:void(0)" class="button border-red icon-trash-o"
						style="padding: 5px 15px;" onclick="DelSelect()"> 删除</a></td>
				</tr>
				<tr>
					<td colspan="8">
						<div class="pagelist">
        		<?php
        echo '共有' . $count . '条新闻&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '第' . $page->page . '页/共' . $page->totalPage . '页';
        ?>
        		<a href="<?=$href['first']?>">首页</a> <a
								href="<?=$href['prev']?>">上一页</a> <a href="<?=$href['next']?>">下一页</a>
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
		location.href = 'delete_News.php?idstr='+id+'&cid='+<?=$id?>;
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name=newsid]").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})
//获得选中文件的文件名
function getCheckboxItem()
{
	obj = document.getElementsByName("newsid");
    check_val = [];
    for(k in obj){
        if(obj[k].checked)
            check_val.push(obj[k].value);
    }
    var idstr = check_val.join('`');
    location.href = 'delete_News.php?idstr='+idstr+'&cid='+<?=$id?>;
}
//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name=newsid]").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		getCheckboxItem();
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}


</script>
</body>
</html>