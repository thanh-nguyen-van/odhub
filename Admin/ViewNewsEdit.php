<?include('include/adminheader.php');
include('include/connect.php');

$newsid=$_REQUEST['newsid'];
$news_query="SELECT * FROM ".$table['news']." WHERE NewsId=$newsid";
$news_result=mysql_query($news_query);
$rnews=mysql_fetch_array($news_result);
?>
<h2>News Edit</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<form action="ViewNewsEditValidate.php" method="post">
		<tr>
			<td class="tdhead">Title:</td>
			<td><input class="input12" type="text" name="title" size="75px" value="<?echo stripcslashes(ereg_replace("<br/>","\r\n",ereg_replace("<p>","\r\n\r\n",$rnews['NewsTitle'])));?>"></td>
			<td><?echo $title_label;?></td>
		</tr>
		<tr>
			<td class="tdhead">Details:</td>
			<td><textarea class="input12" style="height:90px;" name="details" rows="6" cols="45"><?echo stripcslashes(ereg_replace("<br/>","\r\n",ereg_replace("<p>","\r\n\r\n",$rnews['NewsDetail'])));?></textarea></td>
			<td><?echo $det_label;?></td>
		</tr>
		<tr>
			<input type="hidden" name="newsid" value="<?echo $rnews['NewsId'];?>">
			<td colspan="2" style="padding-left:75px;"><input type="submit" name="submit" value="Edit" class="buttn"></td>
		</tr>
	</form>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>