<? include('include/adminheader.php');
include('include/connect.php');

$testimonials_id=$_REQUEST['testimonials_id'];
if($testimonials_id!="")
{
	$delete_query="DELETE FROM ".$table['testimonials']."  WHERE testimonials_id=$testimonials_id";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewTestimonials.php"><?
}

$testimonials_query="SELECT *,pd.`project_name`, pd.`project_id`, cd.`ClientFirstname`, cd.`ClientLastname`, cd.`ClientId` FROM site_commission sc
left join project_details pd on sc.project_id=pd.project_id
left join lm_clientdetail_tbl cd on sc.from_client_id=cd.ClientId";
$testimonials_result=mysql_query($testimonials_query);
$i=1;
?>
<h2>Site Commission List</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="td-bor td-bor12">
<tr>
	<td colspan="5"></td>
</tr>
<tr>
	<td width="10%" align="center" valign="middle" class="td-hd" style="text-indent:8px;">No.</td>
	<td width="28%" align="left" valign="middle" class="td-hd">Project</td>
    <td width="24%" align="left" valign="middle" class="td-hd">Client</td>
	<td width="11%" align="left" valign="middle" class="td-hd">Date</td>
	<td width="27%" align="left" valign="middle" class="td-hd">Amount( USD )</td>
</tr>
<!--<tr><td align="left" valign="middle" class="td-hd">Add</td></tr>-->
<?
while($testimonials=mysql_fetch_array($testimonials_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><? echo $i++; ?>.</td>
		<td align="left" valign="middle"><? echo $testimonials['project_name'];?></td>
        <td align="left" valign="middle"><? echo $testimonials['ClientFirstname']." ".$testimonials['ClientLastname'];?></td>
        
		<td align="left" valign="middle"><? echo (isset($testimonials['date']) && $testimonials['date'] != '0000-00-00 00:00:00')?date('M d, Y',strtotime($testimonials['date'])):"N/A";?></td>
        
		<td align="left" valign="middle">
       <!-- <a href="AddTestimonials.php" class="edit">Add</a> | -->
       <? echo sprintf("%01.2f",$testimonials['commission_amount']);?></td>

	</tr>
	<?
}
?>
<tr>
<td align="left" valign="middle">&nbsp;</td>
</tr>

</table>
</div>

<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>