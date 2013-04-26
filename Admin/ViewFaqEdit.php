<?include('include/adminheader.php');
include('include/connect.php');

$faqid=$_REQUEST['faqid'];
$faq_query="SELECT * FROM ".$table['faq']." WHERE FaqId=$faqid";
$faq_result=mysql_query($faq_query);
$rfaq=mysql_fetch_array($faq_result);
?>
<h2>Edit Faq</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
	<form action="ViewFaqEditValidate.php" method="post">
		<tr>
			<td class="tdhead">Question:</td>
			<td><input   class="input12" type="text" name="question" size="75px" value="<?echo stripcslashes(ereg_replace("<br/>","\r\n",ereg_replace("<p>","\r\n\r\n",$rfaq['FaqQuestion'])));?>"></td>
			<td><?echo $question_label;?></td>
		</tr>
		<tr>
			<td class="tdhead">Answer:</td>
			<td><textarea  class="input12" style="height:90px;" name="answer" rows="6" cols="45"><?echo stripcslashes(ereg_replace("<br/>","\r\n",ereg_replace("<p>","\r\n\r\n",$rfaq['FaqAnswer'])));?></textarea></td>
			<td><?echo $answer_label;?></td>
		</tr>
		<tr>
			<input type="hidden" name="faqid" value="<?echo $rfaq['FaqId'];?>">
			<td colspan="2"><input type="submit" name="submit" value="Edit" class="buttn"></td>
		</tr>
	</form>
</table>
</div>


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>