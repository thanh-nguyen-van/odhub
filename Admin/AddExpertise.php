<?
include('include/adminheader.php');
include('include/connect.php');

$select_query="select * from ".$table['lawyercategory']."";
$select_result=mysql_query($select_query);

?>
<table width="100%">
	<tr>
		<td colspan="5"><h3>Expertise Entry</h3></td>
	</tr>
	<form action="AddExpertiseValidate.php" method="post">
		<tr>
			<td class="tdhead" width="10%">Expertise Category</td>
			<td width="10%">
            <select name="lawyercategory">
            	<option value="">Select</option>
            <?php
            if($select_result && mysql_num_rows($select_result)>0) {
				while($re=mysql_fetch_array($select_result)) {?>
            		<option value="<?php echo $re['LawyerCategoryId']; ?>"><?php echo $re['LawyerCategoryName']; ?></option>
            	<?php } } ?>
		</tr>
		<tr>
			<td class="tdhead" width="10%">Enter Expertise</td>
			<td width="10%"><input type="text" name="expertise">
			<input type="submit" name="submit" value="submit"></td>
		</tr>
		<tr>
			<td colspan="3"><?echo $expertise_label;?><?echo $err;?></td>
		</tr>
	</form>
</table>
<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>