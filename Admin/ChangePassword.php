<?include('include/adminheader.php');
include('include/connect.php');

$admin_query="SELECT * FROM	".$table['adminaccount']."";	
$admin_result=mysql_query($admin_query);
$radmin=mysql_fetch_array($admin_result);
?>
<h2>Change Your Password</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"></td>
	</tr>
	<form action="ChangePasswordValidate.php" method="post">
		<tr align="left" valign="middle">
			<td width="25%" align="left" valign="middle">Username :</td>
			<td width="71%"><input type="text" name="username" value="<?echo $radmin['AdminUsername'];?>" class="input12"></td>
		</tr>
		<tr>
			<td align="left" valign="middle">New Password :</td>
			<td align="left" valign="middle"><input type="password" name="password"  class="input12" ></td>
			<td width="4%"><?echo $password_label;?></td>
		</tr>
		<tr>
			<td align="left" valign="middle">Confirm Password :</td>
			<td align="left" valign="middle"><input type="password" name="confirm"  class="input12"></td>
			<td><?echo $confirm_label;?></td>
		</tr>
		<tr>
			<td colspan="3" align="center" valign="middle" style="padding-right:380px;"><input type="submit" name="submit" value="Change" class="buttn"></td>
		</tr>
	</form>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>