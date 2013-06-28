<? include('include/adminheader.php');
include('include/connect.php');

$testimonials_id=$_REQUEST['testimonials_id'];
if($testimonials_id!="")
{
	$delete_query="DELETE FROM ".$table['testimonials']."  WHERE testimonials_id=$testimonials_id";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewTestimonials.php"><?
}

$testimonials_query="SELECT * FROM ".$table['testimonials']." ";
$testimonials_result=mysql_query($testimonials_query);
$i=1;
?>
<h2>Testimonials List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="td-bor td-bor12">

<tr>
	<td colspan="5"> <font color="#FF0000"> <?php if((isset($_SESSION['T_msg']))) { echo $_SESSION['T_msg']; unset($_SESSION['T_msg']); } ?></font></td>
</tr>

<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td align="center" valign="middle" class="td-hd" style="text-indent:8px;">No.</td>
	<td align="left" valign="middle" class="td-hd">Title</td>
    <td align="left" valign="middle" class="td-hd">Content</td>
	<td align="left" valign="middle" class="td-hd">Images</td>
	<td align="left" valign="middle" class="td-hd">Action</td>
</tr>
<!--<tr><td align="left" valign="middle" class="td-hd">Add</td></tr>-->
<?
while($testimonials=mysql_fetch_array($testimonials_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo substr($testimonials['title'],0,75)."...";?></td>
        <td align="left" valign="middle"><? echo substr($testimonials['content'],0,100)."..."?></td>
        
		<td align="left" valign="middle">
        <img src="http://projects.arcinfotec.com/odhub/odhub/upload/testimonials/thumb/<? echo $testimonials['image_path'];?>"  />
        </td>
        
		<td align="left" valign="middle">
       <!-- <a href="AddTestimonials.php" class="edit">Add</a> | -->
		<a href="EditTestimonials.php?testimonials_id=<? echo $testimonials['testimonials_id'];?>" class="edit">Edit</a> |
		<a href="ViewTestimonials.php?testimonials_id=<? echo $testimonials['testimonials_id'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>

	</tr>
	<?
}
?>
<tr>
<td align="left" valign="middle"> <a href="AddTestimonials.php" class="edit">Add</a></td>
</tr>

</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>