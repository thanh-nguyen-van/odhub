<? include('include/adminheader.php');
include('include/connect.php');

if(isset($_REQUEST['rem']) && ($_REQUEST['rem'] > 0)){
	$del_query = "DELETE FROM ".$table['blogcategory']." WHERE BlogCategoryId=".$_REQUEST['rem'];
	$del_result = mysql_query($del_query);
}

$str_blogcat = "SELECT * FROM ".$table['blogcategory']."";
$sel_blogcat = mysql_query($str_blogcat);

?>
	<?php
    if(isset($msg) && $msg!=''){
		echo $msg;
	}
	?>
<h2>News Edit</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"><h3>Blog Category Entry</h3></td>
	</tr>
	<form action="AddBlogCategoryValidate.php" method="post">
		<tr>
			<td align="left" valign="middle" class="tdhead">Category:</td>
		  <td align="left" valign="middle"><input type="text" name="blogcategory" size="75px" value="<?echo $category;?>" class="input12"></td>
			<td><?echo $blogcategory_label;?></td>
	  </tr>
		
		<tr align="left" valign="middle">
			<td colspan="2" align="left" valign="middle" style="padding-left:93px;"><input type="submit" name="submit" value="Submit" class="buttn"></td>
	  </tr>
	</form>
</table><br />

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"><h4>Blog Category List</h4></td>
	</tr>
    <?php
    if(mysql_num_rows($sel_blogcat) > 0){
		$i = 1;
		while($arr_blogcat = mysql_fetch_array($sel_blogcat)){
			
	?>
		<tr>
			<td><?php echo $i;?>&nbsp;&nbsp;</td>
			<td><?php echo $arr_blogcat['BlogCategory'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><a href="AddBlogCategory.php?rem=<?php echo $arr_blogcat['BlogCategoryId'];?>" class="edit">Delete</a></td>
		</tr>
    <?php
    		$i++;
		}
	}else{
	?>
    <tr>
		<td colspan="5">No blog category is available now.</td>
	</tr>
    <?php
	}
	?>
</table>
</div>



<?include('include/adminfooter.php');?>