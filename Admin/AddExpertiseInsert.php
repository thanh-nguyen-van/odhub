<?
include('include/adminheader.php');
include('include/connect.php');

$insert_query="insert into ".$table['expertise']."(ExpertiseName,LawyerCategoryId) values('".$expertise."',".$lawyercategory.")";
$insert_result=mysql_query($insert_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Expertise Entry</h3></td>
</tr>
<?
if($insert_result)
{
	?>
	<tr>
		<td>Successfully added.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Successfully not added.</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>