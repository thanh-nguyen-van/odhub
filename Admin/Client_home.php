<? include('include/adminheader.php');
include('include/connect.php');

$home=$_REQUEST['home_id'];
if($home!="")
{
	$delete_query="DELETE FROM ".$table['home']."  WHERE Id=$home";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=Client_home.php"><?
}

$home_query="SELECT * FROM ".$table['home']." ";
$home_result=mysql_query($home_query);
$i=1;
?>
<h2>Home Section</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="td-bor td-bor12">
<tr>
	<td colspan="5"><font color="#FF0000"><?php if((isset($_SESSION['H_msg']))) { echo $_SESSION['H_msg']; unset($_SESSION['H_msg']); } ?></font></td>
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
while($home=mysql_fetch_array($home_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo substr($home['title'],0,75)."...";?></td>
        <td align="left" valign="middle"><? echo substr($home['content'],0,100)."..."?></td>
        
		<td align="left" valign="middle">
        <img height="50" width="50" src="../upload/home/thumb/<? echo $home['image_path'];?>"  />
        </td>
        
		<td align="left" valign="middle">
       <!-- <a href="AddTestimonials.php" class="edit">Add</a> | -->
		<a href="EditHome.php?home_id=<? echo $home['Id'];?>" class="edit">Edit</a> |
		<a href="Client_home.php?home_id=<? echo $home['Id'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>

	</tr>
	<?
}
?>
<tr>
<td align="left" valign="middle"> <a href="AddClient_home.php" class="edit">Add</a></td>
</tr>

</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>