<? include('include/adminheader.php');
include('include/connect.php');

$caseid=$_REQUEST['caseid'];
if($caseid!="")
{
	$delete_query="UPDATE ".$table['case']." SET CaseStatus=5 WHERE CaseId=$caseid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=PostedProjects.php"><?
}

$project_query="SELECT * FROM ".$table['case']." AS C, ".$table['clientdetail']." AS Cd, ".$table['casestatus']." AS Cs WHERE C.CaseClientId=Cd.ClientId And C.CaseStatus=Cs.StatusValue AND (Cs.StatusValue=1 OR Cs.StatusValue=2) ORDER BY CaseTitle  ";
$project_result=mysql_query($project_query);
$i=1;
?>

<h2>Posted Projects</h2>

<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
	<tr>
	  <td align="left" valign="middle" class="td-hd">No</td>
	  <td align="left" valign="middle" class="td-hd">Casename</td>
	  <td align="left" valign="middle" class="td-hd">Clientname</td>
	  <td align="left" valign="middle" class="td-hd">Bids</td>
	  <td align="left" valign="middle" class="td-hd">Expiry Date</td>
	  <td align="left" valign="middle" class="td-hd">Status</td>
	  <td align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
while($rproject=mysql_fetch_array($project_result))
{
	?>
	<tr>
		<td align="left" valign="middle" class="td-bor1"><?echo $i++;?>.</td>
		<td align="left" valign="middle" class="td-bor1"><a href="<?echo $siteURL;?>/CaseDetail.php?caseid=<?echo $rproject['CaseId'];?>" target="_blank"><?echo $rproject['CaseTitle'];?></a></td>
		<td align="left" valign="middle" class="td-bor1"><?echo $rproject['ClientUsername'];?></td>
		<td align="left" valign="middle" class="td-bor1">
			<?
				$bid_query="SELECT * FROM ".$table['bid']." WHERE BidCaseId=".$rproject['CaseId']."";
				$bid_result=mysql_query($bid_query);
				$rbid=mysql_num_rows($bid_result);
				echo $rbid;
			?>
		</td>
		<td align="left" valign="middle" class="td-bor1"><?echo date("Y-m-d",strtotime($rproject['CaseBidClose']));?></td>
		<td align="left" valign="middle" class="td-bor1"><?echo $rproject['StatusName'];?></td>
		<td align="left" valign="middle" class="td-bor1"><a href="CaseEdit.php?caseid=<?echo $rproject['CaseId'];?>" class="edit">Edit</a> | <a href="PostedProjects.php?caseid=<?echo $rproject['CaseId'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')" class="edit">Delete</a></td>
</tr>
	<?
}
?>
</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>