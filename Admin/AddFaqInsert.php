<?include('include/adminheader.php');
include('include/connect.php');

$insert_query="INSERT INTO ".$table['faq']." (FaqQuestion, FaqAnswer) VALUES ('$question', '$ans')";
$insert_result=mysql_query($insert_query);
?><table width="100%"><?
if($insert_result)
{
	?>
	<tr>
		<td>Question is added successfully.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Question is added successfully.</td>
	</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>