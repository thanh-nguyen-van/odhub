<? 
include('include/connect.php');

session_start();
error_reporting(false);
	$extraForEdit = '';
	
	$mode = ( isset( $_REQUEST['mode'] ) )?$_REQUEST['mode']:'';
	
	$msg  = ( isset( $_SESSION['msg'] ) )?$_SESSION['msg']:'';
	
	if($msg != '')
		$_SESSION['msg'] = '';
	
	if( $mode == 'edit' )																			///// For edit
	{
		$caseid=$_REQUEST['caseid'];
		
		$extraForEdit = " AND `pr_skill_id`=".$caseid;
	}
	
	elseif( $mode == 'edit_validate' )																//// For update
	{
		$skill_name = $_POST['skill_name'];
		$skill_id   = $_POST['caseid'];
		
		$set_for_correction = 'false';
		$_SESSION['msg']	= '';
		
		if( $skill_name == '' )
		{
			$set_for_correction = 'true';
			$_SESSION['msg']    = "<font color='red'>Skill name can not be left blank.</font>";
		}
		else
		{
			 $updateQuery = "UPDATE `project_skill` SET `skill_name` = '".stripslashes(mysql_real_escape_string($skill_name))."' WHERE 1 AND `pr_skill_id`='".$skill_id."'";
		
			mysql_query($updateQuery);
			
			$_SESSION['msg'] = "<font color='green'>Skill updated successfully.</font>";
		}
		
		if( $set_for_correction == "true" )
		{
			header("location:projectSkills.php?mode=edit&caseid=".$skill_id);
			exit();
		}
		else
		{
			header("location:projectSkills.php");
			exit();
		}
	
	}
	
	elseif( $mode == 'delete' )																	/// For delete
	{
		if(  isset($_REQUEST['caseid']) && $_REQUEST['caseid'] != '' )
		{
			$deleteQuery = "DELETE FROM `project_skill` WHERE `pr_skill_id`=".$_REQUEST['caseid'];
			
			mysql_query($deleteQuery);
			
			$_SESSION['msg'] = "<font color='green'>Skill deleted successfully.</font>";
			header("location:projectSkills.php");
			exit;
		}
		else{
		
			$_SESSION['msg'] = "<font color='red'>Skill can not be deleteed.</font>";
			header("location:projectSkills.php");
			exit;	
		}
	
	}
	elseif( $mode == 'insert')
	{
		$skill_name = $_POST['skill_name'];
		
		$set_for_correction = 'false';
		$_SESSION['msg']	= '';
		
		if( $skill_name == '' )
		{
			$set_for_correction = 'true';
			$_SESSION['msg']	= "<font color='red'>Skill name can not be left blank.</font>";
		}
		else
		{
			 $insertQuery = "INSERT INTO `project_skill` (`skill_name`) VALUES('".stripslashes(mysql_real_escape_string($skill_name))."')";
		
			mysql_query($insertQuery);
			
			$_SESSION['msg'] = "<font color='green'>Skill added successfully.</font>";
		}
		
		if( $set_for_correction == "true" )
		{
			header("location:projectSkills.php?mode=add");
			exit();
		}
		else
		{
			header("location:projectSkills.php");
			exit();
		}
		
	}
	
	$project_query = "SELECT * FROM `project_skill` WHERE 1".$extraForEdit;
	
	$project_result=mysql_query($project_query);
	
	include('include/adminheader.php');
	if($mode == 'edit')																// For Edit start
	{
		$rc = mysql_fetch_assoc($project_result);

?>

	<form method="post" action="projectSkills.php">
		<input type="hidden" name="mode" value="edit_validate" />
        <h2>Edit Project Skill</h2>
		<div class="wht-bg">
       		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td>Skill Name :</td>
					<td><input type="text" name="skill_name" value="<?php echo $rc['skill_name'];?>" ></td>
					<td><?=$msg?></td>
				</tr>
				<tr>
					<input type="hidden" name="caseid" value="<?=$rc['pr_skill_id']?>">
					<td style="padding:10px 0px;">
					   <input type="submit" name="submit" value="Update" class="buttn">&nbsp;&nbsp;&nbsp; <input type="button" name="cancel" value="Cancel" class="buttn" onclick="location.href='projectSkills.php';" />
					</td>
				</tr>
			</table>
            </div>
         </form>   
	
<?php	
	
}																		// For Edit end
elseif( $mode == 'add')													// For add start 
{
?>	
	<form method="post" action="projectSkills.php">
		<input type="hidden" name="mode" value="insert" />
        <h2>Edit Project Skill</h2>
		<div class="wht-bg">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td>Skill Name :</td>
					<td><input type="text" name="skill_name" value="" ></td>
					<td><?=$msg?></td>
				</tr>
				<tr>
					<td style="padding:10px 0px;">
					   <input type="submit" name="submit" value="Add" class="buttn">&nbsp;&nbsp;&nbsp; <input type="button" name="cancel" value="Cancel" class="buttn" onclick="location.href='projectSkills.php';" />
					</td>
				</tr>
			</table>
            </div>
         </form>
	
	
<?php 	
}																		// For end start																
else{ 																	// for listing  start

	$i=1;																

?>

<h2>Project Skill</h2>
<div style="text-align:right; margin-bottom:5px;"><input type="button" name="button" value=" Add " class="buttn" onclick="location.href='projectSkills.php?mode=add';" /></div>
<div class="wht-bg">
<?php if( $msg != ''){?>
<div style="font-size:13px; font-weight:600; background-color:#FFFFDD;">&nbsp;&nbsp;<?=$msg;?></div>
<?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
	<tr>
	  <td align="left" valign="middle" class="td-hd">No</td>
	  <td align="left" valign="middle" class="td-hd">Skill Name</td>
	  <td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
while($rproject=mysql_fetch_array($project_result))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><?echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><a href="<?echo $siteURL;?>/CaseDetail.php?caseid=<?echo $rproject['project_id'];?>" target="_blank"><?echo $rproject['skill_name'];?></a></td>
		<td align="left" valign="middle" class="td-bor1"><a href="projectSkills.php?mode=edit&caseid=<?echo $rproject['pr_skill_id'];?>" class="edit">Edit</a> | <a href="projectSkills.php?mode=delete&caseid=<?echo $rproject['pr_skill_id'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')" class="edit">Delete</a></td>
</tr>
	<?
}
?>
</table>
</div>


<?php } ?>														<!--// for listing  start-->

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>