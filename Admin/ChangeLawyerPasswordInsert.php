<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE ".$table['professional_detail']." SET LawyerPassword='$password' WHERE LawyerId=$lawyerid";
$update_result=mysql_query($update_query);
?>
<h2>Change Lawyer Password</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
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
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>