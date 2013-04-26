<?
include('include/adminheader.php');
include('include/connect.php');

if($attachment!="")
{
	$new_attachment=rand(1,1000).$attachment;
	if(file_exists("../Attachments/".$new_attachment))
	{
		echo "file already exists";
	}
	else
	{
		move_uploaded_file($_FILES["attachment"]["tmp_name"],"../Attachments/".$new_attachment);
	}
	
}
$bidstart=date("Y-m-d H:i:s");
$bidclose=date("Y-m-d H:i:s",mktime(date('H'), date('i'), date('s'), date('m'), date('d')+$days, date('Y') ));

$update_query="UPDATE ".$table['case']." SET CaseTitle='$title', CaseAreaLaw='$lawarea', CaseDescription='$clientdescription', CaseFile='$attachment', CaseBudget=$budget, CaseDays=$days, CaseFeature='$feature' ,CaseNonPublic='$nonpublic' ,CaseFulltime='$fulltime' WHERE  CaseId=$caseid ";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Case Details</h3></td>
</tr>
<?
if($update_result)
{
	?>
	
		<tr>
			<td><p class="para">Your case successfully Updated.</p></td>
		</tr>
	</table>
	<?
}
?>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>