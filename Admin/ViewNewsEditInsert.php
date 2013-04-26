<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE  ".$table['news']." SET NewsTitle='$title' , NewsDetail= '$det' WHERE NewsId=$newsid";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>News Edit</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>News is edited successfully.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>News is not edited successfully.</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>