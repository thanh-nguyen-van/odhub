<?include('include/adminheader.php');
include('include/connect.php');

$newsid=$_REQUEST['newsid'];
if($newsid!="")
{
	$delete_query="DELETE  FROM ".$table['news']." WHERE NewsId=$newsid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewNews.php"><?
}
$faq_query="SELECT * FROM ".$table['news']." ";
$faq_result=mysql_query($faq_query);
$i=1;
?>
<h2>News List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td width="16%" align="center" valign="middle" class="td-hd">No.</td>
		<td width="71%" align="left" valign="middle" class="td-hd">News Title</td>
		<td width="13%" align="left" valign="middle" class="td-hd"">Action</td>
	</tr>
<?
while($rques=mysql_fetch_array($faq_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><?echo $i++;?>.</td>
		<td align="left" valign="middle"><?echo $rques['NewsTitle'];?></td>
		<td align="left" valign="middle"><a href="ViewNewsEdit.php?newsid=<?echo $rques['NewsId'];?>" class="edit">Edit</a> | <a href="ViewNews.php?newsid=<?echo $rques['NewsId'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>
	</tr>
	<?
}
?>
</table>
</div>
<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>
