<?php
include('include/adminheader.php');
include('include/connect.php');

if ($_REQUEST['action']=='update') { 
    $admin_update_query    = "update ".$table['adminaccount']." set paypal_email='".$_POST['paypal_email']."',paypal_password='".$_POST['paypal_password']."',paypal_api_key='".$_POST['paypal_api_key']."' where AdminType='SUPER'";	
    $admin_result_exe   = @mysql_query($admin_update_query);
    
}

$admin_query    = "SELECT * FROM ".$table['adminaccount']."";	
$admin_result   = @mysql_query($admin_query);
$radmin         = @mysql_fetch_array($admin_result);
?>
<h2> Paypal Settings</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"></td>
	</tr>
        <form action="PaypalSetting.php?action=update" method="post" name="paypal_settings_form" id="paypal_settings_form">
		<tr align="left" valign="middle">
			<td width="25%" align="left" valign="middle">Username :</td>
			<td width="71%"><?echo $radmin['AdminUsername'];?></td>
		</tr>
		<tr>
			<td align="left" valign="middle">Paypal E-mail :</td>
                        <td align="left" valign="middle"><input type="text" name="paypal_email" id="paypal_email" value="<?php echo $radmin['paypal_email'];?>"  class="input12" ></td>
			<td width="4%"><?echo $password_label;?></td>
		</tr>
		<tr>
			<td align="left" valign="middle">Paypal Password :</td>
                        <td align="left" valign="middle"><input type="text" name="paypal_password" id="paypal_password"  class="input12" value="<?php echo  $radmin['paypal_password'];?>"></td>
			<td><?echo $confirm_label;?></td>
		</tr>
		<tr>
			<td align="left" valign="middle">Paypal API Key :</td>
                        <td align="left" valign="middle"><input type="text" name="paypal_api_key" id="paypal_api_key"  class="input12" value="<?php echo  $radmin['paypal_api_key'];?>"></td>
			<td><?echo $confirm_label;?></td>
		</tr>
		<tr>
			<td colspan="3" align="center" valign="middle" style="padding-right:380px;"><input type="submit" name="submit" value="Update" class="buttn"></td>
		</tr>
	</form>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>