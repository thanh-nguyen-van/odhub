<?include('include/adminheader.php');
include('include/connect.php');
?>
<h2>Faq Entry</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<form action="AddFaqValidate.php" method="post">
		<tr>
			<td align="left" valign="middle" class="tdhead">Question:</td>
		  <td align="left" valign="middle"><input type="text" name="question" size="75px" value="<?echo $question;?>"  class="input12"></td>
			<td><?echo $question_label;?></td>
		</tr>
		<tr>
			<td align="left" valign="middle" class="tdhead">Answer:</td>
		  <td align="left" valign="middle"><textarea name="answer" rows="6" cols="45" class="input12" style="height:75px;"><?echo $ans;?></textarea></td>
			<td><?echo $answer_label;?></td>
	  </tr>
		<tr align="left" valign="middle">
			<td colspan="2" align="left" valign="middle" style="padding-left:90px;"><input type="submit" name="submit" value="Submit" class="buttn"></td>
	  </tr>
	</form>
</table>
</div>

<?include('include/adminfooter.php');?>