<?php
include('include/adminheader.php');
include('include/connect.php');

//////// Update ///////////////
if($_POST['hid_name']=='hid_val')
{
	/// Validate fields //// 
	$validation_err_flag = 0;
	if($_POST['paypal_acount_email']=='')
	{
		$err_msg = "Please enter Paypal Account E-mail1";
		$validation_err_flag = 1;
	}
	if($_POST['paypal_acount']=='')
	{
		$err_msg .= "Please enter Paypal Account E-mail2";
		$validation_err_flag = 1;
	}
	if($_POST['paypal_acount_password']=='')
	{
		$err_msg .= "Please enter Paypal Account E-mail1";
		$validation_err_flag = 1;
	}
	
	if($_POST['default_commission_p_p']=='')
	{
		$err_msg .= "Please enter Default Commission";
		$validation_err_flag = 1;
	}
	if($_POST['client_site_commission']=='')
	{
		$err_msg .= "Please enter Client Site Commission";
		$validation_err_flag = 1;
	}
	if($_POST['prof_client_commission']=='')
	{
		$err_msg .= "Please enter Prof. Client Commission";
		$validation_err_flag = 1;
	}
	if($_POST['site_prof_client_commission']=='')
	{
		$err_msg .= "Please enter Site Professional Client Commission";
		$validation_err_flag = 1;
	}
	if($_POST['site_minmum_project_amount']=='')
	{
		$err_msg .= "Please enter minimum amount for project";
		$validation_err_flag = 1;
	}
	
	if($validation_err_flag==0)
	{
		$update_sql = "update odhub_payment_setting 
		set 
		paypal_acount_email = '".$_POST['paypal_acount_email']."',
		paypal_acount = '".$_POST['paypal_acount']."',
		paypal_acount_password = '".$_POST['paypal_acount_password']."',
		paypal_api_key = '".$_POST['paypal_api_key']."',
		default_commission_p_p = '".$_POST['default_commission_p_p']."',
		client_site_commission = '".$_POST['client_site_commission']."',
		site_prof_client_commission = '".$_POST['site_prof_client_commission']."',
		prof_client_commission = '".$_POST['prof_client_commission']."',
		minimum_project_amount = '".$_POST['site_minmum_project_amount']."',
		minimum_project_amount_hourly = '".$_POST['minimum_project_amount_hourly']."'
		";
		
		$update_qry = @mysql_query($update_sql);
		
	}
}
//////// Update ///////////////

$select_query="select * from  odhub_payment_setting";
$select_result=mysql_query($select_query);
//DebugBreak();
if(mysql_num_rows($select_result)>0)
{
	while($re=mysql_fetch_array($select_result))
	{
		if($re['ClientImage']!="")
		{
			$image=$re['ClientImage'];
		}
		else
		{
			$image="noimage.gif";
		}
		?>
		<form method="post" action="SitePaymentSetting.php">
			<h2>Site Payment Setting</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td width="10%" rowspan="10" valign="top"><img src="../Upload/<?php echo $image;?>"></td>
				</tr>
                <?php if($err_msg!=''){?>
                <tr>
					<td></td>&nbsp;<td colspan="2" style="color:#F00:"><?php echo $err_msg; ?></td>
				</tr>
                <?php }?>
				<tr>
					<td width="19%">Paypal Account E-mail 1</td>
					<td width="71%"><input type="text" name="paypal_acount_email" id="paypal_acount_email" value="<?php echo $re['paypal_acount_email'];?>"></td>
				</tr>
				<tr>
					<td>Paypal Accout E-mail 2</td>
					<td><input type="text" name="paypal_acount" value="<?php echo $re['paypal_acount'];?>"></td>
				</tr>
				<tr>
					<td>Paypal Account Password</td>
					<td><input type="text" name="paypal_acount_password" id="paypal_acount_password" value="<?php echo $re['paypal_acount_password'];?>"></td>
				</tr>
				<tr>
					<td>Paypal API Key</td>
					<td><input type="text" name="paypal_api_key" id="paypal_api_key" value="<?php echo $re['paypal_api_key'];?>"></td>
				</tr>
				<tr>
					<td>Default Commission</td>
					<td ><input type="text" name="default_commission_p_p" id="default_commission_p_p" value="<?php echo (isset($re['default_commission_p_p']) || $re['default_commission_p_p']!='0.00')?sprintf('%01.2f',$re['default_commission_p_p']):'25.00';?>"></td>
				</tr>
				<tr>
					<td>Client Site Commission</td>
					<td ><input type="text" name="client_site_commission" id="client_site_commission" value="<?php echo sprintf('%01.2f',$re['client_site_commission']);?>"></td>
				</tr>
				<tr>
					<td>Prof Client Commossion</td>
					<td ><input type="text" name="prof_client_commission" id="prof_client_commission" value="<?php echo sprintf('%01.2f',$re['prof_client_commission']);?>">
							
					
					</td>
				</tr>
				<?php
                         //   DebugBreak();
                ?>
				
				<tr>
					<td>Site Prof Client Commission</td>
					<td><input type="text" name="site_prof_client_commission" id="site_prof_client_commission" value="<?php echo $re['site_prof_client_commission'];?>"></td>
				</tr>
				<tr>
					<td>Minimum Amount for project</td>
					<td><input type="text" name="site_minmum_project_amount" id="site_minmum_project_amount" value="<?php echo $re['minimum_project_amount'];?>"></td>
				</tr>
				<tr>
					<td>Minimum Amount for project </td>
					<td><input type="text" name="minimum_project_amount_hourly" id="minimum_project_amount_hourly" value="<?php echo $re['minimum_project_amount_hourly'];?>"></td>
				</tr>
				<tr>
                <input type="hidden" name="hid_name" value="hid_val">
					<input type="hidden" name="clientid" value="<?php echo $clientid;?>">
					<td>&nbsp;</td><td><input type="submit" name="submit" value="Update" class="buttn"></td>
				</tr>
			</table>
            </div>
		</form>
		<?php 
	}
}
else
{
	?>
	<table>
		<tr>
			<td>Incorrect Data.</td>
		</tr>
	</table>
				
	<?php 
}
?>

<?php mysql_close($connect);?>
<?php include('include/adminfooter.php');?>