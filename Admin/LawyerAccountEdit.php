<?include('include/adminheader.php');
include('include/connect.php');

$lawyerid=$_REQUEST['lawyerid'];
$select_query="SELECT * FROM ".$table['professional_detail']." WHERE LawyerId=$lawyerid";
$select_result=mysql_query($select_query);
echo $err_msg;
?>
<h2>Edit Lawyer Account</h2>
<div class="wht-bg">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <form action="LawyerAccountEditValidate.php" method="post">
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
        <?
if(mysql_num_rows($select_result)>0)
{
	while($rl=mysql_fetch_array($select_result))
	{
		if($rl['LawyerImage']!="")
		{
			$image=$rl['LawyerImage'];
		}
		else
		{
			$image="noimage.gif";
		}
		?>
        <tr>
          <td rowspan="19" valign="top"><img src="../Upload/<?echo $image?>" /></td>
        </tr>
        <tr>
          <td>Firstname</td>
          <td><input type="text" name="lawyerfirstname" value="<?echo $rl['LawyerFirstname'];?>" /></td>
          <td><?echo $lawyerfirstname_label;?></td>
        </tr>
        <tr>
          <td>Lastname</td>
          <td><input type="text" name="lawyerlastname" value="<?echo $rl['LawyerLastname'];?>" /></td>
          <td><?echo $$lawyerlastname_label;?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="lawyeremail" value="<?echo $rl['LawyerEmail'];?>" /></td>
          <td><?echo $lawyeremail_label;?></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="lawyerpassword" value="<?echo $rl['LawyerPassword'];?>" /></td>
          <td><?echo $lawyerpassword_label;?></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="confirmpass" value="<?echo $rl['LawyerPassword'];?>" /></td>
          <td><?echo $confirmpass_label;?><?echo $reenter_label;?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><textarea name="lawyeraddress" rows="4" cols="45"><?	echo  ereg_replace("<br/>","\r\n",(ereg_replace("<p>","\r\n\r\n",$rl['LawyerAddress'])));	?>
      </textarea></td>
          <td><?echo $lawyeraddress_label;?></td>
        </tr>
        <tr>
          <td>Zipcode</td>
          <td><input type="text" name="lawyerzipcode" value="<?echo $rl['LawyerZipcode'];?>" /></td>
          <td><?echo $lawyerzipcode_label;?></td>
        </tr>
        <tr>
          <td>State</td>
          <td><select name="state">
            <option value="">--Select--</option>
            <?	
								$state_query="select * from ".$table['state']."";
								$state_result=mysql_query($state_query);
								while($rs=mysql_fetch_array($state_result))
								{
									?>
            <option value="<?echo $rs['StateId']?>"<?if($rl['LawyerState']==$rs['StateId']){echo "selected";}?>><?echo $rs['StateName'];?></option>
            <?
								}
							
						?>
          </select></td>
        </tr>
        <tr>
          <td>Country</td>
          <td><select name="country">
            <option value="">--Select--</option>
            <option value="USA"<?if($rl['LawyerCountry']=="USA"){echo "selected";}?>>USA</option>
            <option value="Canada"<?if($rl['LawyerCountry']=="Canada"){echo "selected";}?>>Canada</option>
          </select></td>
        </tr>
        <tr>
          <td valign="top">Area of Expertise</td>
          <td><?
							$select_query="select * from ".$table['expertise']."";
							$select_result=mysql_query($select_query);
							?>
            <table>
              <?
							while($re=mysql_fetch_array($select_result))
							{
								$i=1;
								if($rl['LawyerExpertise']!="")
								{
									$expertise=explode(',',$rl['LawyerExpertise']);
								}
								if($i==1)
								{
									
									?>
              <tr>
                <td><input type="checkbox" name="expertise[]" value="<?echo $re['ExpertiseId'];?>"<?if($expertise!=""){foreach($expertise as $value){if($value==$re['ExpertiseId']){echo "checked";}}}?> />
                  <?echo $re['ExpertiseName'];?></td>
                <?
									$i++;
								}
								elseif($i>1 && $i<=2)
								{
									?>
                <td><input type="checkbox" name="expertise[]" value="<?echo $re['ExpertiseId'];?>"<?if($expertise!=""){foreach($expertise as $value){if($value==$re['ExpertiseId']){echo "checked";}}}?> />
                  <?echo $re['ExpertiseName'];?></td>
                <?
										$i++;
								}
								elseif($i>2 && $i<=3)
								{
									?>
                <td><input type="checkbox" name="expertise[]" value="<?echo $re['ExpertiseId'];?>"<?if($expertise!=""){foreach($expertise as $value){if($value==$re['ExpertiseId']){echo "checked";}}}?> />
                  <?echo $re['ExpertiseName'];?></td>
                <?
										$i++;
								}
								else
								{
									?>
                <td><input type="checkbox" name="expertise[]" value="<?echo $re['ExpertiseId'];?>"<?if($expertise!=""){foreach($expertise as $value){if($value==$re['ExpertiseId']){echo "checked";}}}?> />
                  <?echo $re['ExpertiseName'];?></td>
              </tr>
              <?
										$i=0;
								}
										
							}
							?>
            </table>
            <?
						?></td>
        </tr>
        <tr>
          <td>Year(s) in Business</td>
          <td><input type="text" name="lawyeryear" value="<?echo $rl['LawyerYear'];?>" /></td>
          <td><?echo $lawyeryear_label;?></td>
        </tr>
        <tr>
          <td>What University/Institute had finished?</td>
          <td><input type="text" name="lawyeruniversity" value="<?echo $rl['LawyerUniversity'];?>" /></td>
          <td><?echo $lawyeruniversity_label;?></td>
        </tr>
        <tr>
          <td>Degree/Achievements</td>
          <td><textarea name="lawyerdegree" rows="4" cols="45"><?echo    stripcslashes(ereg_replace("<br/>","\r\n",(ereg_replace("<p>",'\r\n\r\n',$rl['LawyerDegree']))));?></textarea></td>
          <td><?echo $lawyerdegree_label;?></td>
        </tr>
        <tr>
          <td>Specialized in</td>
          <td><textarea name="lawyerspecialized" rows="6" cols="45 "?><?echo  stripcslashes(ereg_replace("<br/>","\r\n",(ereg_replace("<p>",'\r\n\r\n',$rl['LawyerSpecialization']))));?></textarea></td>
          <td><?echo $lawyerspecialized_label;?></td>
        </tr>
        <tr>
          <td>Charges per hour/work on %</td>
          <td><input type="text" name="lawyercharges" value="<?echo $rl['LawyerCharges'];?>" /></td>
          <td><?echo $lawyercharges_label;?></td>
        </tr>
        <tr>
          <td>Personal Achievements</td>
          <td><textarea name="lawyerachievements" rows="4" cols="45"><?echo  stripcslashes(ereg_replace("<br/>","\r\n",(ereg_replace("<p>",'\r\n\r\n',$rl['LawyerAchievements']))));?></textarea></td>
          <td><?echo $lawyerachievements_label;?></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea name="lawyerdescription" rows="6" cols="45" ><?echo $rl['LawyerDescription'];?></textarea></td>
          <td><?echo $lawyerdescription_label;?></td>
        </tr>
        <tr>
          <td>Keyword</td>
          <td><input type="text" name="lawyerkeyword" value="<?echo $rl['LawyerKeyword'];?>" /></td>
          <td><?echo $lawyerdescription_label;?></td>
        </tr>
        <tr>
          <input type="hidden" name="lawyerid" value="<?echo $lawyerid;?>" />
          <td><input type="submit" name="submit" value="Update" class="buttn" /></td>
        </tr>
        <?
	}
}
else
{
	?>
        <tr>
          <td>Incorrect Data.</td>
        </tr>
        <?
}
?>
      </table></td>
    </tr>
  </form>
  </table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>