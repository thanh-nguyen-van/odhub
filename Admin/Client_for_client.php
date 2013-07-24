<? 

include('include/adminheader.php');
include('include/connect.php');

$home=$_REQUEST['home_id'];
if($home!="")
{
	$delete_query="DELETE FROM ".$table['home']."  WHERE Id=$home";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=Client_home.php"><?
}

$client_query="SELECT * FROM ".$table['for_client']." ";
$for_client_result=mysql_query($client_query);
$i=1;
?>
<h2>For Client Section</h2>
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

	<td align="left" valign="middle" class="td-hd">Action</td>
</tr>
<!--<tr><td align="left" valign="middle" class="td-hd">Add</td></tr>-->
<?
while($forclient=mysql_fetch_array($for_client_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo substr($forclient['title'],0,50)."...";?></td>
        <td align="left" valign="middle"><? echo substr($forclient['content'],0,75)."..."?></td>
        
		
        
		<td align="left" valign="middle">
		<a href="EditForClient.php?id=<? echo $forclient['id'];?>" class="edit" style="margin-left: 10px;">Edit</a> 
		
	</tr>
	<?
}
?>


</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>