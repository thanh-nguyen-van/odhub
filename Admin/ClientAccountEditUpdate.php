<?
include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE ".$table['clientdetail']."  SET ClientFirstname='$clientfirstname', ClientLastname='$clientlastname', ClientAddress='$clientaddress', ClientZipcode='$clientzipcode', ClientState='$state', ClientCountry='$country', ClientDescription='$description' where ClientId=$clientid";
$update_result=mysql_query($update_query);
?>
<h2>Edit Client Detail</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
<?
if($update_result)
{
	?>
	
		<tr>
			<td><p =class="para">ClientProfile get successfully updated.</p></td>
		</tr>
	</table>
    </div>
	<?
}
?>
<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>