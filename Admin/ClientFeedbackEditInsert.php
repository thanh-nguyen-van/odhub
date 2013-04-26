<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE ".$table['feedback']." SET FeedbackRate=$rate , FeedbackMessage='$msg' WHERE FeedbackId=$feedbackid";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Client Feedback</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Feedback successfully edited.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Feedback is not successfully edited.</td>
	</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>