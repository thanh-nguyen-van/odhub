<? include('include/adminheader.php');
include('include/connect.php');

$caseid=$_REQUEST['caseid'];
if($caseid!="")
{
	$delete_query="UPDATE ".$table['case']." SET CaseStatus=5 WHERE CaseId=$caseid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=PostedProjects.php"><?
}

$query="SELECT * FROM ".$table['adminaccount']." AS a WHERE AdminType='SUB' ORDER BY FirstName,LastName";
$result=mysql_query($query);
$i=1;
?>

<h2>Sub Admin List</h2>
<?php if(isset($_SESSION['msg'])) { ?>
<br /><h3 style="color:#F00;"><?=$_SESSION['msg']?></h3>
<?php unset($_SESSION['msg']); }?>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
	<tr>
	  <td align="left" valign="middle" class="td-hd">No</td>
	  <td align="left" valign="middle" class="td-hd">First Name</td>
	  <td align="left" valign="middle" class="td-hd">Last Name</td>
          <td align="left" valign="middle" class="td-hd">E-Mail</td>
	  <td align="left" valign="middle" class="td-hd">Status</td>
	  <td align="left" valign="middle" class="td-hd">Last Login</td>
	  <td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
while($row=mysql_fetch_array($result))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><?echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><?=$row['FirstName']?></td>
		<td align="left" valign="middle" class="td-bor1"><?=$row['LastName']?></td>
                <td align="left" valign="middle" class="td-bor1"><?=$row['AdminEmail']?></td>
                <td align="left" valign="middle" class="td-bor1"><?=  showStatus($row['Status'])?></td>
		<td align="left" valign="middle" class="td-bor1"><?=$row['LastLogin']?></td>
		<td align="left" valign="middle" class="td-bor1"><a href="SubAdminEdit.php?AdminId=<?=$row['AdminId'];?>&todo=edit" class="edit">Edit</a> | <a href="SubmitPages/SubAdminProcess.php?AdminId=<?=$row['AdminId'];?>&todo=delete" onclick="return confirm('Are you sure you  want to Delete')" class="edit">Delete</a></td>
        </tr>
	<?
}
?>
</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>