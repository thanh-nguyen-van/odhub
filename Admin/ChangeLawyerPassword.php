<?include('include/adminheader.php');
include('include/connect.php');

$lawyerid=$_REQUEST['lawyerid'];

$lawyer_query="SELECT * FROM ".$table['professional_detail']." WHERE LawyerId=$lawyerid";
$lawyer_result=mysql_query($lawyer_query);
$rclient=mysql_fetch_array($lawyer_result);
?>
<h2>Change Lawyer Password</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">	
	<form action="ChangeLawyerPasswordValidate.php" method="post">
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" class="input12" ></td>
		<td><?echo $password_label;?></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
		<td><input type="password" name="confirm" class="input12"></td>
		<td><?echo $confirm_label;?><?echo $reenter_label;?></td>
	</tr>
	<tr>
		<input type="hidden" name="lawyerid" value="<?echo $lawyerid;?>">
		<td><input type="submit" name="submit" value="submit" class="buttn"></td>
	</tr>
	</form>

</table>
</div>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>