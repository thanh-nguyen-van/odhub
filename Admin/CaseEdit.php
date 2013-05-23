<?php
//session_start();

include('include/adminheader.php');
include('include/connect.php');

$error_msg  = '';
$error_flag = '';

if(isset($_SESSION['msg']) && is_array($_SESSION['msg']))
{
	
	if(isset($_SESSION['error']) && $_SESSION['error'])
	{	
		$error_msg  = $_SESSION['msg'];
		$error_flag = $_SESSION['error'];
		unset($_SESSION['msg'],$_SESSION['error']);
	}
}




$caseid=$_REQUEST['caseid'];
//$caseedit_query="SELECT * FROM ".$table['case']." WHERE Caseid=$caseid ";


$sql_project_details = "select * from `project_details` where `project_id`='".$caseid."'";

$caseedit_result=mysql_query($sql_project_details);
if(mysql_num_rows($caseedit_result)>0)
{
	
	while($rc=mysql_fetch_array($caseedit_result))
	{
		//$description=ereg_replace("<p>","\r\n\r\n",($rc['project_description']));
		//$description=ereg_replace("<br/>","\r\n",$description);
		$description=$rc['project_description'];
		?>
		<form method="post" action="updatecase.php">
        <h2>Edit Case Details</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td>Project Name :</td>
					<td><input type="text" name="title" value="<?php echo $rc['project_name'];?>" />
						<?php if($error_flag == 1 && isset($error_msg['title'])){?><label style="color:#F00;"><?=$error_msg['title']?></label><?php } ?>
                    </td>
					<td></td>
				</tr>
				<tr>
					<td rowspan="1" valign="top">Project Skill :</td>
					<td>
						<?
								$project_id = $rc['project_id'];
						
								$sql_project_skill = "select *,if((select count(*) from `project_skill_map` where `project_id`='".$project_id."' and 
`skill_id`=`project_skill`.`pr_skill_id`),'Yes','No') `skill_checked` from `project_skill`;";
								
								
								//$lawarea_query="SELECT * FROM ".$table['expertise']."";
								$project_skill_details=mysql_query($sql_project_skill);
								?><table><?

								while($rl=mysql_fetch_array($project_skill_details))
								{
									//$lawarea=explode(",",$rc['CaseAreaLaw']);
									?>
											<tr><td><input type="checkbox" name="skill[]" value="<?php echo $rl['pr_skill_id'];?>" <?php if($rl['skill_checked']=='Yes'){echo 'checked';}?> /><?php echo $rl['skill_name'];?></td></tr>
									<?
								}
								?></table><?
						?>
                        <?php if($error_flag == 1 && isset($error_msg['skill'])){ ?><label style="color:#F00;"><?=$error_msg['skill']?></label><?php } ?>
					</td>
				</tr>
				<tr>
					<td>Description :</td>
					<td>
                    	<textarea name="description" rows="5" cols="40"><?php echo $description; ?></textarea>
                    	 <?php if($error_flag == 1 && isset($error_msg['description'])){?><label style="color:#F00;"><?=$error_msg['description']?></label><?php } ?>
                    </td>
					<td></td>
				</tr>
				<tr>
					<td>Project Category:</td>
					<td>
                    	<select id="project_category" name="project_category">
                    
                    	<?php
							
							$project_category = $rc['project_category'];
						
							$sql_project_category = "select * from `project_category`";
							$rs_project_category = mysql_query($sql_project_category);
							
							while($rr_project_category = mysql_fetch_array($rs_project_category)){
								?>	
						<option value="<?php echo $rr_project_category['pr_cat_id'];?>" <?php if($project_category == $rr_project_category['pr_cat_id']){echo "selected";}?>><?php echo $rr_project_category['pr_cat_name']?></option>		
						<?php		
							}
						?>
                    	</select>
                        <?php if($error_flag == 1 && isset($error_msg['project_category'])){?><label style="color:#F00;"><?=$error_msg['project_category']?></label><?php } ?>
                    </td>

					<td></td>
				</tr>
		
			
				<tr>
					<td>Project State</td>
                    <?php
                    //$str_client = "SELECT ClientCountry FROM ".$table['clientdetail']." WHERE ClientId=".$rc['CaseClientId'];
					
					$sql_state = "select * from `lm_state_tbl`";
					
					
					$sel_client = mysql_query($sql_state);
					
					?>
					<td>
						<select name="location">
							<option value="">--Select--</option>
							<?
								//$select_query="SELECT * FROM ".$table['state']."";

								while($rstate=mysql_fetch_array($sel_client))
								{
									?>
									<option value="<? echo $rstate['StateId'];?>" <? echo(($rstate['StateId']==$rc['state']) ? 'selected=selected' : '');?>><? echo $rstate['StateName'];?></option>
									<?
								}
							?>
						</select>
                         <?php if($error_flag == 1 && isset($error_msg['location'])){?><label style="color:#F00;"><?=$error_msg['location']?></label><?php } ?>
					</td>
					<td>&nbsp;</td>
				</tr>				
				<tr>
					<td>W9 Status</td>
					<td>
                    	<select name="w9_status" id="w9_status">
                        	<option value="0" <?php if($rc['w9_required'] == 0 || $rc['w9_required'] == NULL){echo "selected";}?>>Not Required</option>    
                            <option value="1" <?php if($rc['w9_required'] == 1){echo "selected";}?>>Required</option>    
                        </select>
                        <?php if($error_flag == 1 && isset($error_msg['w9_status'])){?><label style="color:#F00;"><?=$error_msg['w9_status']?></label><?php } ?>
                    </td>
					<td></td>
				</tr>
				<tr>
					<td>Job Type</td>
					<td>
                    	<input type="text" name="job_type" value="<?php echo $rc['job_type'];?>" />
                        <?php if($error_flag == 1 && isset($error_msg['job_type'])){?><label style="color:#F00;"><?=$error_msg['job_type']?></label><?php } ?>
                    </td>
					<td></td>
				</tr>
				<tr>
					<td >Price</td>
					<td>
                    	<input type="text" name="price" value="<?php echo $rc['start_price']; ?>" />
                    	<?php if($error_flag == 1  && isset($error_msg['price'])){?><label style="color:#F00;"><?=$error_msg['price']?></label><?php } ?>
                    </td>
				</tr>
				<tr>
					<td>Post By</td>
					<td>
                    <?php
						$post_by = $rc['post_by'];
						$sql_post_by_details = "select * from `lm_clientdetail_tbl` where `clientId`='".$post_by."'";
						$rs_post_by_details = mysql_query($sql_post_by_details);
						
						$rr_post_by_details = mysql_fetch_array($rs_post_by_details);
						
						
						
						
					?>
                    <input type="text" name="clientuname" id="clientuname" readonly="readonly" value="<?php echo $rr_post_by_details['ClientUsername'];?>" />
                    
                    </td>
				</tr>
				<tr>
					<input type="hidden" name="caseid" value="<?php echo $rc['project_id'];?>" />
					<td style="padding:10px 0px;">
                    <input type="submit" name="submit" value="Update Project" class="buttn" />&nbsp;&nbsp;
                    <input type="button" name="cancel" value="Cancel" class="buttn" onclick="window.location.href='PostedProjects.php';" />
                    </td>
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

<?php mysql_close($connect);?>
<?php include('include/adminfooter.php');?>