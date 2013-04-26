<?
include('include/adminheader.php');
include('include/connect.php');

$update_query="update ".$table['professional_detail']." set LawyerFirstname='$lawyerfirstname' ,  LawyerLastname='$lawyerlastname', LawyerPassword='$lawyerpassword' , LawyerEmail='$lawyeremail' , LawyerAddress='$address' ,LawyerZipcode='$lawyerzipcode' ,LawyerState='$state', LawyerCountry='$country', LawyerExpertise='$lawarea', LawyerYear='$lawyeryear', LawyerUniversity='$lawyeruniversity',   	LawyerDegree='$degree', LawyerSpecialization='$lawyerspecialized', LawyerCharges='$lawyercharges',  LawyerAchievements='$achievements', LawyerDescription='$description', LawyerKeyword='$lawyerkeyword'  where  LawyerId=$lawyerid";
$update_result=mysql_query($update_query);
?>
<h2>Edit Lawyer Account</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
<?
if($update_result)
{
	?>
	
		<tr>
			<td>Profile successfully updated.</td>
		</tr>
	</table>
</div>
	<?
}
?>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>