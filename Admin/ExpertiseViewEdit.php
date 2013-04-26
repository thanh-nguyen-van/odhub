<?
include('include/adminheader.php');
include('include/connect.php');
$expertiseid=$_REQUEST['expertiseid'];
$select_query="select * from ".$table['expertise']." where ExpertiseId=" .$expertiseid. "";
$select_result=mysql_query($select_query);

$select_exp_query="select * from ".$table['lawyercategory']."";
$select_exp_result=mysql_query($select_exp_query);

?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Expertise</h3></td>
</tr>
<?
if(mysql_num_rows($select_result)>0)
{
	while($re=mysql_fetch_array($select_result))
	{
		?>
		<form method="post" action="ExpertiseViewEditValidate.php">
                    <tr>
                        <td  width="20%">Expertise Category</td>
                        <td>
                        <select name="lawyercategory">
                            <option value="">Select</option>
                        <?php
                        if($select_exp_result && mysql_num_rows($select_exp_result)>0) {
                            while($re_exp=mysql_fetch_array($select_exp_result)) {?>
                                <option value="<?php echo $re_exp['LawyerCategoryId']; ?>" <?php if($re_exp['LawyerCategoryId']==$re['LawyerCategoryId']) echo "selected"; ?>><?php echo $re_exp['LawyerCategoryName']; ?></option>
                            <?php } } ?>
                    </tr>
					<tr>
						<td>Expertise Name</td>
							<input type="hidden" name="expertiseid" value="<?echo $re['ExpertiseId'];?>">
						<td><input type="text" name="expertise" value="<?echo $re['ExpertiseName'];?>"><input type="submit" name="submit" value="submit"><?echo $err;?><?echo $expertise_label;?></td>
						<td></td>
					</tr>
				</table>
			</form>
		<?
	}
}
?>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>