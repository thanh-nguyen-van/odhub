<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE ".$table['clientdetail']." SET ClientPassword='$password' WHERE ClientId=$clientid";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Change Client Password</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Password is successfully updated.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Password is not successfully updated.</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>