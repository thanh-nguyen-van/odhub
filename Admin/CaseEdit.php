<?
include('include/adminheader.php');
include('include/connect.php');

$caseid=$_REQUEST['caseid'];
$caseedit_query="SELECT * FROM ".$table['case']." WHERE Caseid=$caseid ";
$caseedit_result=mysql_query($caseedit_query);
if(mysql_num_rows($caseedit_result)>0)
{
	while($rc=mysql_fetch_array($caseedit_result))
	{
		$description=ereg_replace("<p>","\r\n\r\n",($rc['CaseDescription']));
		$description=ereg_replace("<br/>","\r\n",$description);
		?>
		<form method="post" action="CaseEditValidate.php">
        <h2>Edit Case Details</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td>Title of Legal Issue :</td>
					<td><input type="text" name="title" value="<?echo $rc['CaseTitle'];?>" ></td>
					<td><?echo $title_label;?></td>
				</tr>
				<tr>
					<td rowspan="1" valign="top">Area of Law :</td>
					<td>
						<?
								$lawarea_query="SELECT * FROM ".$table['expertise']."";
								$lawarea_result=mysql_query($lawarea_query);
								?><table><?
								while($rl=mysql_fetch_array($lawarea_result))
								{
									$lawarea=explode(",",$rc['CaseAreaLaw']);
									?>
											<tr><td><input type="checkbox" name="arealaw[]" value="<?echo $rl['ExpertiseId'];?>" <?if($rc['CaseAreaLaw']!=""){foreach($lawarea as $value) {if($value==$rl['ExpertiseId']){echo "checked";}}}?>><?echo $rl['ExpertiseName']?></td></tr>
									<?
								}
								?></table><?
						?>
					</td>
				</tr>
				<!-- <tr>
					<td>City :</td>
					<td><input type="text" name="city" value="<?echo $rc['CaseCity'];?>"></td>
					<td><?echo $city_label;?></td>
				</tr>
				<tr>
					<td>State :</td>
					<td><input type="text" name="state" value="<?echo $rc['CaseState'];?>"></td>
					<td><?echo $state_label;?></td>
				</tr>
				<tr>
					<td>Zip :</td>
					<td><input type="text" name="zip" value="<?echo $rc['CaseZip'];?>"></td>
					<td><?echo $zip_label;?></td>
				</tr> -->
				<tr>
					<td>Description :</td>
					<td><textarea name="description" rows="5" cols="40"><?echo $description;?></textarea></td>
					<td><?echo $description_label;?></td>
				</tr>
				<tr>
					<td>Attachment:</td>
					<td><input type="file" name="attachment"></td>
					<td><?echo $file_label;?></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td ><font size="2">*jpeg, jpg, png, gif, ico, zip, pdf, rtf, doc</font> </td>
					<td>&nbsp;</td>
				</tr>
		
				<!-- <tr>
					<td>Case Type :</td>
					<td><input type="radio" name="casetype" value="1"<?if($rc['CaseType']=="1") {echo "checked";}?>>For all registered attorneys <input type="radio" name="casetype" value="2"<?if($rc['CaseType']=="2"){echo "checked";}?>>For only registered attorneys listed below (Private)</td>
				</tr>
				<tr>
					<td>Defined Private Users :</td>
					<td><TEXTAREA NAME="definedusers" ROWS="3" COLS="30"><?echo $rc['CasePrivateUser'];?></TEXTAREA></td>
					<td><?echo $definedusers_label;?></td>
				</tr> -->
				<tr>
					<td>Preferred Location</td>
                    <?php
                    $str_client = "SELECT ClientCountry FROM ".$table['clientdetail']." WHERE ClientId=".$rc['CaseClientId'];
					$sel_client = mysql_query($str_client);
					if(mysql_num_rows($sel_client) > 0){
						$arr_client = mysql_fetch_array($sel_client);	
					}else{
						$arr_client[''] = '';
					}
					?>
					<td>
						<select name="location">
							<option value="">--Select--</option>
							<?
								//$select_query="SELECT * FROM ".$table['state']."";
								$select_query="SELECT * FROM ".$table['country']." ";
								$select_result=mysql_query($select_query);
								while($rcountry=mysql_fetch_array($select_result))
								{
									?>
									<option value="<? echo $rcountry['CountryId'];?>"<? echo(($rcountry['CountryId']==$arr_client['ClientCountry']) ? 'selected=selected' : '');?>><?echo $rcountry['Country'];?></option>
									<?
								}
							?>
						</select>
					</td>
					<td>&nbsp;</td>
				</tr>				
				<tr>
					<td><font color="red">*</font>Case Budget</td>
					<td><input type="text" name="budget" value="<?echo $rc['CaseBudget'];?>"></td>
					<td><?echo $budget_label;?></td>
				</tr>
				<tr>
					<td><font color="red">*</font>Case Days</td>
					<td><input type="text" name="days" value="<?echo $rc['CaseDays'];?>"></td>
					<td><?echo $days_label;?></td>
				</tr>
				<tr>
					<td colspan="2"><b>(Optional)</b></td>
				</tr>
				<tr>
					<td >Featured</td>
					<td><input type="checkbox" name="featured" value="1"<?if($rc['CaseFeature']=="1"){echo "checked";}?>></td>
				</tr>
				<tr>
					<td>Non Public</td>
					<td><input type="checkbox" name="nonpublic" value="1"<?if($rc['CaseNonPublic']=="1"){echo "checked";}?>></td>
				</tr>
				<tr>
					<td>Full Time</td>
					<td><input type="checkbox" name="fulltime" value="1"<?if($rc['CaseFulltime']=="1"){echo "checked";}?>></td>
				</tr>
				<tr>
					<input type="hidden" name="caseid" value="<?echo $caseid;?>">
					<td style="padding:10px 0px;"><input type="submit" name="submit" value="UpdateCase" class="buttn"></td>
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
			<td>Invalid Case.</td>
		</tr>
	</table>
	<?
}
?>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>