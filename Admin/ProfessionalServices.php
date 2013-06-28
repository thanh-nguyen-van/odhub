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
		$serv_id=$_REQUEST['serv_id'];
		
		
		
		
		$extraForEdit = " AND `serv_id`=".$serv_id;
	}
	
	elseif( $mode == 'edit_validate' )																//// For update
	{
		$serv_name = $_POST['serv_name'];
		$servs_id   = $_POST['servid'];
		
		
	
		$set_for_correction = 'false';
		$_SESSION['msg']	= '';
		
		if( $serv_name == '' )
		{
			$set_for_correction = 'true';
			$_SESSION['msg']    = "<font color='red'>Service name can not be left blank.</font>";
		}
		else
		{
			 $updateQuery = "UPDATE `im_service_list` SET `service_name` = '".stripslashes(mysql_real_escape_string($serv_name))."' WHERE 1 AND `Id`='".$servs_id."'";
		
			mysql_query($updateQuery);
			
			$_SESSION['msg'] = "<font color='green'>Services updated successfully.</font>";
		}
		
		if( $set_for_correction == "true" )
		{
			header("location:ProfessionalServices.php?mode=edit&servid=".$serv_id);
			exit();
		}
		else
		{
			header("location:ProfessionalServices.php");
			exit();
		}
	
	}
	
	elseif( $mode == 'delete' )																	/// For delete
	{
		if(  isset($_REQUEST['serv_id']) && $_REQUEST['serv_id'] != '' )
		{
			$deleteQuery = "DELETE FROM `im_service_list` WHERE `Id`=".$_REQUEST['serv_id'];
			
			mysql_query($deleteQuery);
			
			$_SESSION['msg'] = "<font color='green'>Skill deleted successfully.</font>";
			header("location:ProfessionalServices.php");
			exit;
		}
		else{
		
			$_SESSION['msg'] = "<font color='red'>Services not be deleted.</font>";
			header("location:ProfessionalServices.php");
			exit;	
		}
	
	}
	elseif( $mode == 'insert')
	{
		$serv_name = $_POST['serv_name'];
		
		$set_for_correction = 'false';
		$_SESSION['msg']	= '';
		
		if( $serv_name == '' )
		{
			$set_for_correction = 'true';
			$_SESSION['msg']	= "<font color='red'>Services name can not be left blank.</font>";
		}
		else
		{
			 $insertQuery = "INSERT INTO `im_service_list` (`service_name`) VALUES('".stripslashes(mysql_real_escape_string($serv_name))."')";
		
			mysql_query($insertQuery);
			
			$_SESSION['msg'] = "<font color='green'>Services added successfully.</font>";
		}
		
		if( $set_for_correction == "true" )
		{
			header("location:ProfessionalServices.php?mode=add");
			exit();
		}
		else
		{
			header("location:ProfessionalServices.php");
			exit();
		}
		
	}
	
	$servc_query = "SELECT * FROM `im_service_list` WHERE 1".$extraForEdit;
	
	$servc_result=mysql_query($servc_query);
	
	include('include/adminheader.php');
	if($mode == 'edit')																// For Edit start
	{
	

?>

	<form method="post" action="ProfessionalServices.php" name="form1" id="form1">
		<input type="hidden" name="mode" value="edit_validate" />
        <h2>Professional Services</h2>
		<div class="wht-bg">
<?php if( $msg != ''){?>
<div style="font-size:13px; font-weight:600; background-color:#FFFFDD;">&nbsp;&nbsp;<?=$msg;?></div>
<?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
	<tr>
	  <td align="left" valign="middle" class="td-hd">No</td>
	  <td align="left" valign="middle" class="td-hd">Service Name</td>
	  <td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
    
    <?php
	
	
	
	
	
	$serv_qry = "Select * FROM `im_service_list` WHERE `Id`=".$_REQUEST['serv_id'];
	$serv_res=mysql_query($serv_qry);
	
	$i=1;
	while($service=mysql_fetch_array($serv_res))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><?echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><input type="text" name="serv_name" value="<?php echo $service['service_name'];?>" ><input type="hidden" name="servid" value="<?=$service['Id']?>"></td>
		<td align="left" valign="middle" class="td-bor1"><a href="" class="edit" onclick="document.forms['form1'].submit(); return false;">Update</a> | <a href="#" onclick="location.href='ProfessionalServices.php';" class="edit">Cancel</a></td>
</tr>
	<?
}
?>
<?php
	
	
	
	
	
	$service_qry = "Select * FROM `im_service_list` WHERE `Id`!=".$_REQUEST['serv_id'];
	$serv_res=mysql_query($service_qry);
	
	$i=2;
	while($services=mysql_fetch_array($serv_res))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><?echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><a href="<?echo $siteURL;?>/CaseDetail.php?serv_id=<? echo $services['Id'];?>" target="_blank"><? echo $services['service_name'];?></a></td>
		<td align="left" valign="middle" class="td-bor1"><a href="ProfessionalServices.php?mode=edit&serv_id=<?echo $rprojects['Id'];?>" class="edit">Edit</a> | <a href="ProfessionalServices.php?mode=delete&serv_id=<?echo $rprojects['Id'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')" class="edit">Delete</a></td>
</tr>
	<?
}
?>
</table>
</div>
         </form>   
	
<?php	
	
}																		// For Edit end
elseif( $mode == 'add')													// For add start 
{
?>	
	<form method="post" action="ProfessionalServices.php">
		<input type="hidden" name="mode" value="insert" />
        <h2>Add  Services</h2>
		<div class="wht-bg">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
				<tr>
					<td>Service  Name :</td>
					<td><input type="text" name="serv_name" value="" ></td>
					<td><?=$msg?></td>
				</tr>
				<tr>
					<td style="padding:10px 0px;">
					   <input type="submit" name="submit" value="Add" class="buttn">&nbsp;&nbsp;&nbsp; <input type="button" name="cancel" value="Cancel" class="buttn" onclick="location.href='ProfessionalServices.php';" />
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

<h2>Professional Services</h2>
<div style="text-align:right; margin-bottom:5px;"><input type="button" name="button" value="Add" class="buttn" onclick="location.href='ProfessionalServices.php?mode=add';" /></div>
<div class="wht-bg">
<?php if( $msg != ''){?>
<div style="font-size:13px; font-weight:600; background-color:#FFFFDD;">&nbsp;&nbsp;<?=$msg;?></div>
<?php } ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
	<tr>
	  <td align="left" valign="middle" class="td-hd">No</td>
	  <td align="left" valign="middle" class="td-hd">Service Name</td>
	  <td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
while($services=mysql_fetch_array($servc_result))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><? echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><? echo $services['service_name'];?></td>
		<td align="left" valign="middle" class="td-bor1"><a href="ProfessionalServices.php?mode=edit&serv_id=<?echo $services['Id'];?>" class="edit">Edit</a> | <a href="ProfessionalServices.php?mode=delete&serv_id=<?echo $services['Id'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')" class="edit">Delete</a></td>
</tr>
	<?
}
?>
</table>
</div>


<?php } ?>														<!--// for listing  start-->

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>