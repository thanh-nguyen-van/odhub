<?include('include/adminheader.php');
include('include/connect.php');
$expertiseid=$_REQUEST['expertiseid'];
if($expertiseid!=0)
{
	$delete_query="delete from ".$table['expertise']." where ExpertiseId=".$expertiseid."";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ExpertiseView.php"><?
}
$select_query="select * from ".$table['expertise']." E, ".$table['lawyercategory']." C where E.LawyerCategoryId = C.LawyerCategoryId order by LawyerCategoryName";
$select_result=mysql_query($select_query);
$i=1;
?>
<table width="100%">
		<tr>
			<td colspan="5"><h3>List of Expertise</h3></td>
		</tr>
		<tr>
			<td width="5%" class="tdhead">No</td>
			<td width="25%" class="tdhead">Category Name</td>
			<td width="25%" class="tdhead">Expertise Name</td>
			<td width="25%" class="tdhead">Action</td>
		</tr>
			<?
			while($re=mysql_fetch_array($select_result))
			{
				?>
				<tr>
					<td><?echo $i++;?>.</td>
					<td><?echo $re['LawyerCategoryName'];?></td>
					<td><?echo $re['ExpertiseName'];?></td>
					<td><a href="AddExpertise.php">Add</a> | <a href="ExpertiseViewEdit.php?expertiseid=<?echo $re['ExpertiseId'];?> " >Edit</a> | <a href="ExpertiseView.php?expertiseid=<?echo $re['ExpertiseId'];?> " onclick="return confirm('Are you sure you  wanna to remove it?')">Remove</td>
				</tr>
				<?
			}
			?>
	</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>