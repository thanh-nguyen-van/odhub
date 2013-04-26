<?include('include/adminheader.php');
include('include/connect.php');

$insert_query="INSERT INTO ".$table['news']." (NewsTitle, NewsDetail) VALUES ('$title', '$det')";
$insert_result=mysql_query($insert_query);
?><table width="100%"><?
if($insert_result)
{
	?>
	<tr>
		<td>News is added successfully.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>News is not added successfully.</td>
	</tr>
	<?
}
?>
</table>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>