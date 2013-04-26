<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE  ".$table['faq']." SET FaqQuestion='$question' , FaqAnswer= '$ans' WHERE FaqId=$faqid";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Faq</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Question is edited successfully.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Question is not edited successfully.</td>
	</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>