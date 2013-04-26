<?
include('include/connect.php');
$count=$_REQUEST['count'];

for($i=0;$i<$count;$i++)
{
	$commissionid[$i]=$_REQUEST['commissionid_'.$i];
	$commissionamt[$i]=$_REQUEST['commissionamt_'.$i];
	$update_query="UPDATE ".$table['commission']." SET CommissionAmount=$commissionamt[$i] WHERE CommissionId=$commissionid[$i]";
	$update_result=mysql_query($update_query);
	
}
if($update_result)
{
	$result=1;
	header("location:ViewCommissionDetail.php?msg=".$result);
}














?>