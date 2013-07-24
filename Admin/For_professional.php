<? 

include('include/adminheader.php');
include('include/connect.php');


$professional_query="SELECT * FROM ".$table['for_professional']." ";
$for_professional_result=mysql_query($professional_query);
$i=1;
?>
<h2>For Professional Section</h2>
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
while($forprofessional=mysql_fetch_array($for_professional_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo substr($forprofessional['title'],0,75)."...";?></td>
        <td align="left" valign="middle"><? echo substr($forprofessional['content'],0,75)."..."?></td>
        
		
        
		<td align="left" valign="middle">
		<a href="EditForProfessional.php?id=<? echo $forprofessional['id'];?>" class="edit" style="margin-left: 10px;">Edit</a> 
		
	</tr>
	<?
}
?>


</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>