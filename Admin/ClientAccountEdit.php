<?include('include/adminheader.php');
include('include/connect.php');

$clientid=$_REQUEST['clientid'];
$select_query="select * from  ".$table['clientdetail']." where ClientId=$clientid";
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
		<form method="post" action="ClientAccountEditValidate.php">
			<h2>Edit Client Detail</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td rowspan="10" valign="top"><img src="../Upload/<?echo $image;?>"></td>
				</tr>
				<tr>
					<td>Firstname</td>
					<td><input type="text" name="clientfirstname" value="<?echo $re['ClientFirstname'];?>"></td>
				</tr>
				<tr>
					<td>Lastname</td>
					<td><input type="text" name="clientlastname" value="<?echo $re['ClientLastname'];?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="clientemail" value="<?echo $re['ClientEmail'];?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="clientaddress" value="<?echo $re['ClientAddress'];?>"></td>
				</tr>
				<tr>
					<td>Zipcode</td>
					<td><input type="text" name="clientzipcode" value="<?echo $re['ClientZipcode'];?>"></td>
				</tr>
				<tr>
					<td>State</td>
					<td>
						<select name="state">
							<option value="">--Select--</option>
							<?
								$state_query="SELECT * FROM ".$table['state']." ";
								$state_result=mysql_query($state_query);
								while($rs=mysql_fetch_array($state_result))
								{
									?>
										<option value="<?echo $rs['StateId'];?>"<?if($re['ClientState']==$rs['StateId']){echo "selected";}?>><?echo $rs['StateName'];?></option>
									<?
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>
							<select name="country">
								<option value="">--Select--</option>
								<option value="USA"<?if($re['ClientCountry']=="USA"){echo "selected";}?>>USA</option>
								<option value="Canada"<?if($re['ClientCountry']=="Canada"){echo "selected";}?>>Canada</option>
								
							</select>
					
					</td>
				</tr>
				<?php
                         //   DebugBreak();
                ?>
				<tr>
					<td>Description</td>
					<td><textarea name="clientdescription" rows="6" cols="45"><?echo $re['ClientDescription'];?></textarea></td>
				</tr>
				<tr>
					<input type="hidden" name="clientid" value="<?echo $clientid;?>">
					<td><input type="submit" name="submit" value="Update" class="buttn"></td>
				</tr>
			</table>
            </div>
		</form>
		<?
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
				
	<?
}
?>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>