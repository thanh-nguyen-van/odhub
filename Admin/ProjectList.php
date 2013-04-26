<?include('include/adminheader.php');
include('include/connect.php');
include('../include/setting.php');

$caseid=$_REQUEST['caseid'];
if($caseid!="")
{
	$delete_query="UPDATE ".$table['case']." SET CaseStatus=5 WHERE CaseId=$caseid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ProjectList.php"><?
}

$project_query="SELECT * FROM ".$table['case']." AS C, ".$table['clientdetail']." AS Cd, ".$table['casestatus']." AS Cs WHERE C.CaseClientId=Cd.ClientId And C.CaseStatus=Cs.StatusValue ORDER BY CaseId  ";
$project_result=mysql_query($project_query);
$i=1;
?>
<table width="100%">
	<tr>
		<td colspan="5"><h3>List of Projects</h3></td>
	</tr>
	<tr>
		<td class="tdhead">No</td>
		<td class="tdhead">Casename</td>
		<td class="tdhead">Clientname</td>
		<td class="tdhead">Bids</td>
		<td class="tdhead">Expiry Date</td>
		<td class="tdhead">Status</td>
		<td class="tdhead">Action</td>
	</tr>
<?
while($rproject=mysql_fetch_array($project_result))
{
	?>
	<tr>
		<td><?echo $i++;?>.</td>
		<td><a href="<?echo $siteURL;?>/CaseDetail.php?caseid=<?echo $rproject['CaseId'];?>" target="_blank"><?echo $rproject['CaseTitle'];?></a></td>
		<td><?echo $rproject['ClientUsername'];?></td>
		<td>
			<?
				$bid_query="SELECT * FROM ".$table['bid']." WHERE BidCaseId=".$rproject['CaseId']."";
				$bid_result=mysql_query($bid_query);
				$rbid=mysql_num_rows($bid_result);
				echo $rbid;
			?>
		</td>
		<td><?echo date("Y-m-d",strtotime($rproject['CaseBidClose']));?></td>
		<td><?echo $rproject['StatusName'];?></td>
		<td><a href="CaseEdit.php?caseid=<?echo $rproject['CaseId'];?>">Edit</a> | <a href="ProjectList.php?caseid=<?echo $rproject['CaseId'];?>" onclick="return confirm('Are you sure you  wanna to remove  it?')">Delete</a></td>
</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>