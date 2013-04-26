<?include('include/adminheader.php');
include('include/connect.php');

$faqid=$_REQUEST['faqid'];
if($faqid!="")
{
	$delete_query="DELETE  FROM ".$table['faq']." WHERE FaqId=$faqid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewFaq.php"><?
}
$faq_query="SELECT * FROM ".$table['faq']." ";
$faq_result=mysql_query($faq_query);
$i=1;
?>
<h2>List of Faq's</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td width="18%" align="center" class="td-hd">No.</td>
		<td width="49%" class="td-hd">Questions</td>
		<td width="33%" class="td-hd">Action</td>
	</tr>
<?
while($rques=mysql_fetch_array($faq_result))
{
	?>
	<tr>
		<td align="center"><?echo $i++;?>.</td>
		<td><?echo $rques['FaqQuestion'];?></td>
		<td><a href="ViewFaqEdit.php?faqid=<?echo $rques['FaqId'];?>" class="edit">Edit</a> | <a href="ViewFaq.php?faqid=<?echo $rques['FaqId'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>
	</tr>
	<?
}
?>
</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>
