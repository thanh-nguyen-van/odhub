<?php
include('include/adminheader.php');
include('include/connect.php');

isset($_REQUEST['lawyerid'])	? $lawyerid		= $_REQUEST['lawyerid']		: $lawyerid	 = '';
isset($_REQUEST['lawyerid2'])	? $lawyerid2		= $_REQUEST['lawyerid2']		: $lawyerid2	 = '';
isset($_REQUEST['suslawyerid'])	? $suslawyerid	= $_REQUEST['suslawyerid']	: $suslawyerid = '';

if($lawyerid!="")
{
	$delete_query="UPDATE ".$table['professional_detail']." SET ProfessionalStatus=4 WHERE ProfessionalId=$lawyerid";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewLawyerList.php"><?
}
if($lawyerid2!="")
{
	$delete_query="UPDATE ".$table['professional_detail']." SET ProfessionalStatus=1 WHERE ProfessionalId=$lawyerid2";
	$delete_result=mysql_query($delete_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewLawyerList.php"><?
}

if($suslawyerid!="")
{
	$suspend_query="UPDATE ".$table['professional_detail']." SET ProfessionalStatus=2 WHERE ProfessionalId=$suslawyerid";
	$suspend_result=mysql_query($suspend_query);
	?><meta http-equiv="REFRESH" content="0;url=ViewProfessionalList.php"><?
}


$lawyer_query="SELECT * FROM ".$table['professional_detail']."  as L , ".$table['userstatus']." as U WHERE U.UserStatusValue=L.ProfessionalStatus";
$lawyer_result=mysql_query($lawyer_query);
$i=1;
?>
<h2>List of Professionals</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<tr>
	<td colspan="5"></td>
	</tr>
	<tr>
		<td width="9%" align="center" valign="middle" class="td-hd">No.</td>
		<td width="22%" align="left" valign="middle" class="td-hd">Professional Name</td>
		<td width="26%" align="left" valign="middle" class="td-hd">Status</td>
		<td width="43%" align="left" valign="middle" class="td-hd">Action</td>
	</tr>
<?php
while($rlawyer=mysql_fetch_array($lawyer_result))
{
	?>
	<tr>
		<td align="center" valign="middle"><?echo $i++;?>.</td>
		<td align="left" valign="middle"><?echo $rlawyer['ProfessionalFirstname'].' '.$rlawyer['ProfessionalLastname'];?></td>
		<td align="left" valign="middle"><?echo $rlawyer['UserStatusName'];?></td>
		<td align="left" valign="middle">
                        <?php if($rlawyer['ProfessionalStatus']==1){?><a href="ViewLawyerList.php?lawyerid=<?echo $rlawyer['ProfessionalId'];?>" onclick="return confirm('Are you sure you wanna to remove it?')" class="edit">Delete</a>
                        <?php }elseif($rlawyer['ProfessionalStatus']==4){?>
                        <a href="ViewLawyerList.php?lawyerid2=<?echo $rlawyer['ProfessionalId'];?>" onclick="return confirm('Are you sure you wanna to activate?')" class="edit">Activate</a>
                            <?php }?>
                        |
		<a href="EditLawyerList.php?lawyerid=<?echo $rlawyer['ProfessionalId'];?>" class="edit">Edit</a> | <a href="ChangeProfessionalPassword.php?lawyerid=<?echo $rlawyer['ProfessionalId'];?>" class="edit">ChangePassword </a> | <a href="ProfessionalTransactions.php?lawyerid=<? echo $rlawyer['ProfessionalId'];?>" class="edit">Transactions</a> | <a href="ProfessionalPMB.php?lawyerid=<? echo $rlawyer['ProfessionalId'];?>" class="edit">PMB</a> | <a href="ViewProfessionalList.php?suslawyerid=<?echo $rlawyer['ProfessionalId'];?>" class="edit">Suspend</a></td>
	</tr>
	<?

}
?>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>