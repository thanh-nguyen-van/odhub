<?php
include('include/adminheader.php');
include('include/connect.php');
if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='viewcasedetails'))
{
	viewcasedetails();
}
else if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='close_case'))
{
	close_case();
}
else
{
	main();
}
?>
<?php
/**
/*  Function Main - STARTS
**/
function main()
{
	$CaseRequestSQL = "SELECT CC.*,C.CaseId,C.CaseTitle,C.CaseStatus,CD.ClientFirstname,CD.ClientLastname,CD.ClientUsername,
	CA.CaseAwardedLawyerId,L.LawyerFirstname,L.LawyerLastname,L.LawyerUsername,CS.StatusValue,CS.StatusName
	FROM ".$table['caseclosed']." AS CC, ".$table['case']." AS C, ".$table['clientdetail']." AS CD , ".$table['caseawarded']." AS CA,  ".$table['professional_detail']." AS L,".$table['casestatus']." AS CS
	WHERE CC.caseId=C.CaseId 
	AND C.CaseClientId=CD.ClientId
	AND C.CaseId = CA.CaseAwardedCaseId	
	AND L.LawyerId = CA.CaseAwardedLawyerId	
	AND C.CaseStatus = CS.StatusValue	
	";
$CaseRequestRS=mysql_query($CaseRequestSQL);
?>
<script language="javascript">
	function view(id)
	{
		frm = document.frm_opts;
		frm.id.value = id;
		frm.mode.value = 'viewcasedetails';
		frm.submit();
	}
</script>
<form name="frm_opts" id="frm_opts" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<input type="hidden" name="id" value="" />
<input type="hidden" name="mode" value="" />
</form>

<table width="100%" cellpadding="2" cellspacing="3" >
	<tr>
		<td align="center" valign="top"><font color="#FF0000"><b><?php if(isset($GLOBALS['err_msg'])) echo $GLOBALS['err_msg'];?></b></font></td>
	</tr>
</table>
<h2>Client Case Closed Request List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
		<td colspan="5"></td>
	</tr>
    
	<tr>
		<td align="center" valign="middle" class="td-hd">No.</td>
		<td align="left" valign="middle" class="td-hd">Casename</td>
		<td align="left" valign="middle" class="td-hd">Clientname</td>
		<td align="left" valign="middle" class="td-hd">Lawyername</td>
		<td align="left" valign="middle" class="td-hd">Closed Request Date</td>
        <td align="left" valign="middle" class="td-hd">Case Status</td>
		<td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
if(mysql_num_rows($CaseRequestRS)>0)
{
	$i=1;
	while($CaseRequestROW=mysql_fetch_array($CaseRequestRS))
	{
		?>
		<tr>
			<td align="center" valign="middle"><? echo $i++;?></td>
			<td align="left" valign="middle"><? echo $CaseRequestROW['CaseTitle'];?></td>
			<td align="left" valign="middle"><? echo $CaseRequestROW['ClientUsername'];?></td>
			<td align="left" valign="middle"><? echo $CaseRequestROW['LawyerUsername'];?></td>
			<td align="left" valign="middle"><? echo date("Y-m-d",strtotime($CaseRequestROW['ClosedRequestDate']));?></td>
            <td align="left" valign="middle"><? echo $CaseRequestROW['StatusName'];?></td>
			<td align="left" valign="middle"><a href="#" onClick="view('<?php echo $CaseRequestROW['id'];?>')">View Details</a></td>
            
	</tr>
		<?
	}
	
}
else{
?>
	<tr><td height="22" colspan="6" valign="top" align="center">No Record Found</td></tr>
<?php } ?>
</table>
</div>

<?php }
/**
/*  ENDS Of main function 
**/
?>
<?php
/**
/*  Function viewcasedetails - STARTS
**/
function viewcasedetails()
{
	
 	$CaseRequestSQL = "SELECT CC.*,C.CaseId,C.CaseTitle,C.CaseStatus,CD.ClientFirstname,CD.ClientLastname,CD.ClientUsername,
	CA.CaseAwardedLawyerId,L.LawyerFirstname,L.LawyerLastname,L.LawyerUsername,CS.StatusValue,CS.StatusName
	FROM ".$table['caseclosed']." AS CC, ".$table['case']." AS C, ".$table['clientdetail']." AS CD , ".$table['caseawarded']." AS CA,  ".$table['professional_detail']." AS L,".$table['casestatus']." AS CS
	WHERE CC.caseId=C.CaseId 
	AND C.CaseClientId=CD.ClientId
	AND C.CaseId = CA.CaseAwardedCaseId	
	AND L.LawyerId = CA.CaseAwardedLawyerId	
	AND C.CaseStatus = CS.StatusValue
	AND id = '".$_REQUEST['id']."'";
$CaseRequestRS=mysql_query($CaseRequestSQL);
$CaseRequestROW=mysql_fetch_array($CaseRequestRS);

?>
<script language="javascript">
function caseClosed()
{
	var status = window.confirm("Are you sure to closed this case?");
	if( status == true )
	{
		document.frmDetails.mode.value='close_case';
		document.frmDetails.submit();
	}
	else
	{
		return false;	
	}
}
</script>
<br />

<form name="frmDetails" id="frmDetails" method="post" >
<input type="hidden" name="mode" value="" />
<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#CCCCCC" align="center"><font color="#FFFFFF"><strong>Case Detais</strong></font></td>
  </tr>
</table>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" >&nbsp;</td>
  </tr>
  <tr>
    <td width="10" >&nbsp;</td>
    <td width="214">Case Title</td>
    <td width="10" >&nbsp;</td>
    <td ><?php echo stripslashes($CaseRequestROW['CaseTitle']);?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Client Username</td>
    <td>&nbsp;</td>
    <td><?php echo stripslashes($CaseRequestROW['ClientUsername']);?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Client Reason to close his case</td>
    <td>&nbsp;</td>
    <td><?php echo nl2br(stripslashes($CaseRequestROW['ClientReason']));?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Client Close Request Date</td>
    <td>&nbsp;</td>
    <td><?php echo date('F j, Y',strtotime($CaseRequestROW['ClosedRequestDate'])). ' at '.date("g:i a",strtotime($CaseRequestROW['ClosedRequestDate']));?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Lawyer Username</td>
    <td>&nbsp;</td>
    <td><?php echo stripslashes($CaseRequestROW['LawyerUsername']);?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <?php 
  if($CaseRequestROW['LayerApproval'] != ''){
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>Lawyer Wants to Close this case?</td>
    <td>&nbsp;</td>
    <td>
		<?php 
		if($CaseRequestROW['LayerApproval'] == 'Y')
			echo 'Yes';
		else if($CaseRequestROW['LayerApproval'] == 'N')
			echo 'No';
		?>
    </td>
  </tr>
  <?php } ?>
  <?php 
  if($CaseRequestROW['LawyerReason'] != ''){
  ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Lawyer Reason</td>
    <td>&nbsp;</td>
    <td><?php echo nl2br(stripslashes($CaseRequestROW['LawyerReason']));?></td>
  </tr>
  
 <?php } ?>   
 <?php 
  if($CaseRequestROW['LawyerResponseDate'] != '0000-00-00 00:00:00'){
  ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Lawyer Response Date</td>
    <td>&nbsp;</td>
    <td><?php echo date('F j, Y',strtotime($CaseRequestROW['LawyerResponseDate'])). ' at '.date("g:i a",strtotime($CaseRequestROW['LawyerResponseDate']));?></td>
  </tr>
   <?php } ?> 
    <?php 
  if($CaseRequestROW['AdminApproval'] != ''){
  ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Admin Approval</td>
    <td>&nbsp;</td>
    <td><?php 
		if($CaseRequestROW['AdminApproval'] == 'Y')
			echo 'Yes';
		else if($CaseRequestROW['AdminApproval'] == 'N')
			echo 'No';
		?></td>
  </tr>
  
 <?php } ?>   
   <?php 
  if($CaseRequestROW['CloseDate'] != '0000-00-00 00:00:00'){
  ?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Admin Response Date</td>
    <td>&nbsp;</td>
    <td><?php echo date('F j, Y',strtotime($CaseRequestROW['CloseDate'])). ' at '.date("g:i a",strtotime($CaseRequestROW['CloseDate']));?></td>
  </tr>
   <?php } ?> 
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <?php if($CaseRequestROW['StatusValue'] !=6){ ?>
  <tr>
    <td>&nbsp;</td>
    <td>Do you want to closed this Case?</td>
    <td>&nbsp;</td>
    <td><input type="radio" name="AdminApproval" value="Y" <?php if($CaseRequestROW['AdminApproval'] == 'Y'){?> checked="checked" <?php } ?> />Yes&nbsp;
    <input type="radio" name="AdminApproval" value="N" <?php if($CaseRequestROW['AdminApproval'] == 'N'){?> checked="checked" <?php } ?>/>No&nbsp;
    </td>
  </tr>
   <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>Case Status</td>
    <td>&nbsp;</td>
    <td><?php echo $CaseRequestROW['StatusName'];?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><input type="submit" value="Close Case" onclick="return caseClosed();" />&nbsp;<input type="button" value="Back" onclick="document.frmDetails.submit();" /></td>
  </tr>

 
</table>
</form>
<?php 
}
/**
/*  ENDS Of viewcasedetails function 
**/
?>
<?php
/**
/*  Close a case 
**/

function close_case()
{
	$id = $_REQUEST['id'];
	$sql = " SELECT * FROM ".$table['caseclosed']." WHERE id = '".$id."'";
	$row = mysql_query($sql);
	$rs = mysql_fetch_array($row);
	
	
	
	if($_REQUEST['AdminApproval'] == 'Y')
	{
		$updateSQL = "UPDATE ".$table['caseclosed']." SET AdminApproval = '".$_REQUEST['AdminApproval']."',CloseDate = NOW() WHERE id = '".$id."' ";
		mysql_query($updateSQL);
	
		$closeCaseSQL = "UPDATE ".$table['case']." SET CaseStatus = 6 WHERE CaseId = '".$rs['caseId']."' ";
		mysql_query($closeCaseSQL);
	
	}
	else
	{
		$updateSQL = "UPDATE ".$table['caseclosed']." SET AdminApproval = '".$_REQUEST['AdminApproval']."' WHERE id = '".$id."' ";
		mysql_query($updateSQL);
	}
	$GLOBALS['err_msg'] = 'Your response added successfully';

	main();
	exit();
	
}
?>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>