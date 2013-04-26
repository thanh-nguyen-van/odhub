<? 
include('include/adminheader.php');
include('include/connect.php'); 
if(!isset($_REQUEST['clientid'])){
   
   $_REQUEST['clientid'] = ""; 
}
if(!isset($_REQUEST['susclientid'])){
   $_REQUEST['susclientid'] = "";            
}

 
$clientid=$_REQUEST['clientid'];
$susclientid=$_REQUEST['susclientid'];
if($clientid!="")
{
	$delete_query="UPDATE ".$table['clientdetail']." SET ClientStatus=4 WHERE ClientId=$clientid";
	$delete_result=mysql_query($delete_query);
	?>
 <meta http-equiv="REFRESH" content="0;url=ViewClientList.php"> 
    <?
}

if($susclientid!="")
{
	$suspend_query="UPDATE ".$table['clientdetail']." SET ClientStatus=2 WHERE ClientId=$susclientid";
	$suspend_result=mysql_query($suspend_query);
	?>
    <meta http-equiv="REFRESH" content="0;url=ViewClientList.php"> 
    <?
}


$user_query="SELECT * FROM ".$table['clientdetail']."  as C , ".$table['userstatus']." as U WHERE U.UserStatusValue=C.ClientStatus";
$user_result=mysql_query($user_query);
$i=1;
?>
<h2>List of Clients</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">

	<tr>
		<td width="12%" align="center" valign="middle" class="td-hd">No.</td>
		<td width="21%" align="left" valign="middle" class="td-hd">Client Name</td>
		<td width="23%" align="left" valign="middle" class="td-hd">Status</td>
		<td width="44%" align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?
while($rclient=mysql_fetch_array($user_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><?echo $i++;?>.</td>
		<td align="left" valign="middle"><?echo $rclient['ClientFirstname'].' '.$rclient['ClientLastname'];?></td>
		<td align="left" valign="middle"><?echo $rclient['UserStatusName'];?></td>
		<td align="left" valign="middle"><a href="ViewClientList.php?clientid=<?echo $rclient['ClientId'];?>" onclick="return confirm('Are you sure you wanna to remove it?')" class="edit">Delete</a> |
		<a href="ClientAccountEdit.php?clientid=<?echo $rclient['ClientId'];?>" class="edit">Edit</a> | <a href="ChangeClientPassword.php?clientid=<?echo $rclient['ClientId'];?>" class="edit">ChangePassword </a> | <a href="ClientTransactions.php?clientid=<? echo $rclient['ClientId'];?>" class="edit">Transactions</a> | <a href="ClientPMB.php?clientid=<? echo $rclient['ClientId'];?>" class="edit">PMB</a> | <a href="ViewClientList.php?susclientid=<?echo $rclient['ClientId'];?>" class="edit">Suspend</a></td>
	</tr>
	<?

}
?>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>