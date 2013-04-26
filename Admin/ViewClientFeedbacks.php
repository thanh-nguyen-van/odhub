<?include('include/adminheader.php');
include('include/connect.php');
$feedbackid=$_REQUEST['feedbackid'];
if($feedbackid!="")
{
	$delete_query="DELETE FROM ".$table['feedback']." WHERE FeedbackId=$feedbackid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewClientFeedbacks.php"><?
}

$feedback_query="SELECT * FROM ".$table['feedback']." AS F, ".$table['case']." AS C, ".$table['clientdetail']." AS Ca WHERE F.FeedbackSubmittedBy='C' AND F.FeedbackCaseId=C.CaseId AND C.CaseClientId=Ca.ClientId";
$feedback_result=mysql_query($feedback_query);
?>
<h2>News Edit</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td align="center" valign="middle" class="td-hd">No.</td>
		<td align="left" valign="middle" class="td-hd">Casename</td>
		<td align="left" valign="middle" class="td-hd">Clientname</td>
		<td align="left" valign="middle" class="td-hd">FeedbackMessage</td>
		<td align="left" valign="middle" class="td-hd">Feedback Rate</td>
		<td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
if(mysql_num_rows($feedback_result)>0)
{
	$i=1;
	while($rfeed=mysql_fetch_array($feedback_result))
	{
		?>
		<tr>
			<td align="center" valign="middle"><?echo $i++;?></td>
			<td align="left" valign="middle"><?echo $rfeed['CaseTitle'];?></td>
			<td align="left" valign="middle"><?echo $rfeed['ClientUsername'];?></td>
			<td align="left" valign="middle"><?echo $rfeed['FeedbackMessage'];?></td>
			<td align="left" valign="middle"><?echo $rfeed['FeedbackRate'];?></td>
			<td align="left" valign="middle"><a href="ClientFeedbackEdit.php?feedbackid=<?echo $rfeed['FeedbackId'];?>" class="edit">Edit</a> | <a href="ViewClientFeedbacks.php?feedbackid=<?echo $rfeed['FeedbackId'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>
	</tr>
		<?
	}
	
}
?>
</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>