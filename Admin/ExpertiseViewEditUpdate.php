<?
include('include/adminheader.php');
include('include/connect.php');

$insert_query="Update ".$table['expertise']." set ExpertiseName='".$expertise."', LawyerCategoryId=".$lawyercategory."  where ExpertiseId=".$expertiseid."" ;
$insert_result=mysql_query($insert_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Expertise</h3></td>
</tr>
<?
if($insert_result)
{
	?>
	<tr>
		<td>Expertise Successfully edited.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td> Expertise  editing unsuccessful.</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>