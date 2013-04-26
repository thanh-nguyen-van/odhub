<?include('include/adminheader.php');
include('include/connect.php');

$insert_query="INSERT INTO ".$table['blogcategory']." (BlogCategory) VALUES ('$category')";
$insert_result=mysql_query($insert_query);
?><table width="100%"><?
if($insert_result)
{
	?>
	<tr>
		<td>Blog Category is added successfully.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Blog Category is not added.</td>
	</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>