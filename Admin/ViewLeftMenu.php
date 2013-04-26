<? include('include/adminheader.php');
include('include/connect.php');

$StaticPageId=$_REQUEST['StaticPageId'];
if($StaticPageId!="")
{
	$delete_query="DELETE FROM ".$table['staticpage']."  WHERE StaticPageId=$StaticPageId";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewLeftMenu.php"><?
}

$leftmenu_query="SELECT * FROM ".$table['staticpage']." where `StaticPageType`='left_menu' order by `SortOrder` ";
$leftmenu_result=mysql_query($leftmenu_query);
$i=1;
?>
<h2>Left Menu List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="td-bor td-bor12">
<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td align="center" valign="middle" class="td-hd" style="text-indent:8px;">No.</td>
	<td align="left" valign="middle" class="td-hd">Page Title</td>
    <td align="left" valign="middle" class="td-hd">Page Content</td>
    <td align="left" valign="middle" class="td-hd">Status</td>
	<td align="left" valign="middle" class="td-hd">Action</td>
</tr>
<!--<tr><td align="left" valign="middle" class="td-hd">Add</td></tr>-->
<?
while($leftmenu=mysql_fetch_array($leftmenu_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo substr($leftmenu['StaticPageName'],0,75)."...";?></td>
        <td align="left" valign="middle"><? echo substr($leftmenu['StaticPageText'],0,100)."..."?></td>
        
        <td align="left" valign="middle"><? if($leftmenu['Status']=='Y') echo 'Active'; else echo 'Inactive';?></td>
        
		<td align="left" valign="middle">
       <!-- <a href="EditTestimonials.php" class="edit">Add</a> | -->
		<a href="EditLeftMenu.php?StaticPageId=<? echo $leftmenu['StaticPageId'];?>" class="edit">Edit</a> |
		<a href="ViewLeftMenu.php?StaticPageId=<? echo $leftmenu['StaticPageId'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>

	</tr>
	<?
}
?>
<tr>
<td align="left" valign="middle"> <a href="AddLeftMenu.php" class="edit">Add</a></td>
</tr>

</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>