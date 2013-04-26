<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE ".$table['adminaccount']." SET AdminPassword='$password' WHERE AdminUsername='$username'";
$update_result=mysql_query($update_query);
i?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Change Your Password</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Password successfully updated.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Password is not updated.Try again!</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>