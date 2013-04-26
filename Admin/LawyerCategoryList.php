<?include('include/adminheader.php');
include('include/connect.php');
$categoryid=$_REQUEST['categoryid'];
if($categoryid!=0)
{
	$delete_query="delete from ".$table['lawyercategory']." where LawyerCategoryId=".$categoryid."";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=LawyerCategoryList.php"><?
}
$select_query="select * from ".$table['lawyercategory']."";
$select_result=mysql_query($select_query);
$i=1;
?>
<h2>List of Lawyer Category</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
		<tr>
			<td colspan="5"><a href="LawyerCategoryAddEdit.php" class="edit">Add Lawyer Category</a></td>
		</tr>
		<tr>
			<td width="11%" align="center" class="td-hd">No</td>
			<td width="65%" class="td-hd">Lawyer Category Name</td>
			<td width="24%" class="td-hd">Action</td>
		</tr>
			<?
			if(mysql_num_rows($select_result)>0) {
				while($re=mysql_fetch_array($select_result))
				{
					?>
					<tr>
						<td align="center"><?echo $i++;?>.</td>
						<td><?echo $re['LawyerCategoryName'];?></td>
						<td><a href="LawyerCategoryAddEdit.php?categoryid=<?echo $re['LawyerCategoryId'];?> " class="edit">Edit</a> | <a href="LawyerCategoryList.php?categoryid=<?echo $re['LawyerCategoryId'];?> " onclick="return confirm('Are you sure you  wanna to remove it?')" class="edit">Remove</td>
					</tr>
					<?
				}
			}
			else
			{
					?>
					<tr>
						<td colspan="3">There is no Lawyer Category.<a href="LawyerCategoryAddEdit.php" >Add Lawyer Category</a></td>
					</tr>
					<?
			}
			?>
	</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>