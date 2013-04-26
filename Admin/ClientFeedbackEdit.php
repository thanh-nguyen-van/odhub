<?include('include/adminheader.php');
include('include/connect.php');
$feedbackid=$_REQUEST['feedbackid'];

$feedback_query="SELECT * FROM	 ".$table['feedback']." AS F, ".$table['case']."  AS C , ".$table['clientdetail']." as Ca WHERE F.FeedbackId=$feedbackid AND F.FeedBackCaseId=C.CaseId AND C.CaseClientId=Ca.ClientId";
$feedback_result=mysql_query($feedback_query);
?>
<h2>Edit Client Feedback</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
<?
if(mysql_num_rows($feedback_result)>0)
{
	$rfeed=mysql_fetch_array($feedback_result);
	?>
	<form action="ClientFeedbackEditValidate.php" method="post">
		<tr>
			<td class="tdhead">Casename</td>
			<td ><?echo $rfeed['CaseTitle'];?></td>
		</tr>
		<tr>
			<td class="tdhead">Clientname</td>
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
			<td><input type="submit" name="submit" value="Edit" class="buttn"></td>
		</tr>
	</form>
	<?
}
?>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>