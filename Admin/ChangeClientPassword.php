<?include('include/adminheader.php');
include('include/connect.php');

$clientid=$_REQUEST['clientid'];

$client_query="SELECT * FROM ".$table['clientdetail']." WHERE ClientId=$clientid";
$client_result=mysql_query($client_query);
$rclient=mysql_fetch_array($client_result);
?>
<h2>Change Client Password</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<form action="ChangeClientPasswordValidate.php" method="post">
	<tr>
		<td align="left" valign="middle">Password</td>
		<td align="left" valign="middle"><input type="password" name="password" class="input12"></td>
		<td align="left" valign="middle"></td>
	</tr>
	<tr>
		<td align="left" valign="middle">Confirm Password</td>
		<td align="left" valign="middle"><input type="password" name="confirm"  class="input12"></td>
		<td align="left" valign="middle"></td>
	</tr>
	<tr>
		<input type="hidden" name="clientid" value="<?echo $clientid;?>">
		<td><input type="submit" name="submit" value="submit" class="buttn"></td>
	</tr>
	</form>

</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>