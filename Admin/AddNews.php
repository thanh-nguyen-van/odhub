<?include('include/adminheader.php');
include('include/connect.php');
?>
<h2>News Entry</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
	<form action="AddNewsValidate.php" method="post">
		<tr>
			<td width="23%" align="left" valign="middle" class="tdhead">Title:</td>
		  <td width="75%" align="left" valign="middle"><input type="text" name="title" size="75px" value="<?echo $title;?>" class="input12"></td>
			<td width="2%"><?echo $title_label;?></td>
		</tr>
		<tr>
			<td align="left" valign="middle" class="tdhead">Details:</td>
		  <td align="left" valign="middle"><textarea name="details" rows="6" cols="45" class="input12" style="height:110px;"><?echo $det;?></textarea></td>
			<td><?echo $det_label;?></td>
		</tr>
		<tr align="left" valign="middle">
			<td colspan="2" style="padding-left:210px;"><input type="submit" name="submit" value="Submit" class="buttn"></td>
		</tr>
	</form>
</table>
</div>

<?include('include/adminfooter.php');?>