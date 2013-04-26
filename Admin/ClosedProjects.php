<? include('include/adminheader.php');
include('include/connect.php');

$caseid=$_REQUEST['caseid'];
if($caseid!="")
{
	$delete_query="UPDATE ".$table['case']." SET CaseStatus=5 WHERE CaseId=$caseid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=PostedProjects.php"><?
}

$project_query="SELECT * FROM ".$table['case']." AS C, ".$table['clientdetail']." AS Cd, ".$table['casestatus']." AS Cs WHERE C.CaseClientId=Cd.ClientId And C.CaseStatus=Cs.StatusValue AND Cs.StatusValue=6 ORDER BY CaseTitle  ";
$project_result=mysql_query($project_query);
$i=1;
?>

<h2>Closed Projects</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<!--<tr>
		<td colspan="5"><h3>List of Projects</h3></td>
	</tr>-->
	<tr>
		<td width="5%" align="center" valign="middle" class="td-hd">No</td>
		<td width="16%" align="left" valign="middle" class="td-hd">Casename</td>
		<td width="17%" align="left" valign="middle" class="td-hd">Clientname</td>
        <td width="15%" align="left" valign="middle" class="td-hd">Lawyername</td>
		<td width="10%" align="center" valign="middle" class="td-hd">Bids</td>
		<td width="18%" align="left" valign="middle" class="td-hd">Expiry Date</td>
		<td width="9%" align="left" valign="middle" class="td-hd">Status</td>
		<td width="10%" align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
if(mysql_num_rows($project_result) > 0){

	while($rproject=mysql_fetch_array($project_result))
	{
		$str_lawyer = "SELECT LawyerUsername FROM ".$table['professional_detail']." WHERE LawyerId=(SELECT CaseAwardedLawyerId FROM ".$table['caseawarded']." WHERE CaseAwardedCaseId=".$rproject['CaseId'].")";
		$sel_lawyer = mysql_query($str_lawyer);
		if(mysql_num_rows($sel_lawyer) > 0){
			$arr_lawyer = mysql_fetch_array($sel_lawyer);	
		}else{
			$arr_lawyer['LawyerUsername'] = "N.A";	
		}
?>
	<tr>
		<td align="center" valign="middle"><?echo $i++;?>.</td>
		<td align="left" valign="middle"><a href="<?echo $siteURL;?>/CaseDetail.php?caseid=<?echo $rproject['CaseId'];?>" target="_blank" class="edit"><?echo $rproject['CaseTitle'];?></a></td>
		<td align="left" valign="middle"><?echo $rproject['ClientUsername'];?></td>
        <td align="left" valign="middle"><? echo $arr_lawyer['LawyerUsername'];?></td>
		<td align="center" valign="middle">
			<?
				$bid_query="SELECT * FROM ".$table['bid']." WHERE BidCaseId=".$rproject['CaseId']."";
				$bid_result=mysql_query($bid_query);
				$rbid=mysql_num_rows($bid_result);
				echo $rbid;
			?>
		</td>
		<td align="left" valign="middle"><?echo date("Y-m-d",strtotime($rproject['CaseBidClose']));?></td>
		<td align="left" valign="middle"><?echo $rproject['StatusName'];?></td>
		<td align="left" valign="middle"><!--<a href="CaseEdit.php?caseid=<? //echo $rproject['CaseId'];?>">Edit</a> | --><a href="ClosedProjects.php?caseid=<?echo $rproject['CaseId'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')" class="edit">Delete</a></td>
</tr>
<?
	}
}else{
?>
	<tr>
		<td colspan="8" align="left" valign="middle">&nbsp;<font color="#CC0000">No project is closed now.</font></td>
    </tr>
<?
}
?>
</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>