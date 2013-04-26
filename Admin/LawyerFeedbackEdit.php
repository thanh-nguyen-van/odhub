<?include('include/adminheader.php');
include('include/connect.php');
$feedbackid=$_REQUEST['feedbackid'];

$feedback_query="SELECT * FROM	 ".$table['feedback']." AS F, ".$table['case']."  AS C , ".$table['professional_detail']." AS L WHERE F.FeedbackId=$feedbackid AND F.FeedBackCaseId=C.CaseId AND F.FeedbackLawyerId=L.LawyerId";
$feedback_result=mysql_query($feedback_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Lawyer Feedback</h3></td>
</tr>
<?
if(mysql_num_rows($feedback_result)>0)
{
	$rfeed=mysql_fetch_array($feedback_result);
	?>
	<form action="LawyerFeedbackEditValidate.php" method="post">
		<tr>
			<td class="tdhead">Casename</td>
			<td ><?echo $rfeed['CaseTitle'];?></td>
		</tr>
		<tr>
			<td class="tdhead">Lawyername</td>
			<td ><?echo $rfeed['ClientUsername'];?></td>
		</tr>
		<tr>
			<td class="tdhead">Rate</td>
			<td >
				<select name="rate">
					<option value="">--Select--</option>
					<?
						for($i=1;$i<=10; $i++)
						{
							?>
							<option value="<?echo $i;?>"<?if($rfeed['FeedbackRate']==$i){echo "selected";}?>><?echo $i;?></option>
							<?
						}
					?>
				</select>
			</td>
			<td><?echo $rate_label;?></td>
		</tr>
		<tr>
			<td class="tdhead">FeedbackMessage</td>
			<td ><textarea name="message" rows="6" cols="45" ><?echo ereg_replace("<br/>","\r\n",(ereg_replace("<p>",'\r\n\r\n',$rfeed['FeedbackMessage'])));?></textarea></td>
			<td><?echo $message_label;?></td>
		</tr>
		<tr>	
			<input type="hidden" name="feedbackid" value="<?echo $feedbackid;?>">
			<td><input type="submit" name="submit" value="Edit"></td>
		</tr>
	</form>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>